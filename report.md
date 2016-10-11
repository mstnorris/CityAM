# City A.M. Developer Technical Test

## Contents

1. [City A.M. Repository](https://github.com/mstnorris/CityAM)
2. [readme](readme.md)
3. [Installation](installation.md)
4. [Instructions](instructions.md)
5. [Report](report.md)

## Report

### app/Console/Commands/ParseXMLFeed.php

```
protected $signature = 'rss:parse {feed=http://www.cityam.com/feeds/sections/news.xml}';
```

The command is invoked via a scheduled cron job (default every minute) or manually. It makes a **GET** request to the (optional) supplied City A.M. RSS Feed URL (a sensible default of http://www.cityam.com/feeds/sections/news.xml is used if no URL is passed in).

I'm using the [Feeds package from Will Vincent](https://github.com/willvincent/feeds) to parse the RSS Feed

```php
// get the supplied feed URL or use the default
$feedURL = $this->argument('feed');

// use the Feeds (https://github.com/willvincent/feeds) package to parse the RSS 
$feed = Feeds::make($feedURL);

// A little output for when running the command manually
$this->line('Processing URL: ' . $feedURL);

// create a collection of the returned items, and for each item,
// if it doesn't already exist in the database, create one.
collect($feed->get_items())->map(function ($item, $key) {
    return [
        'link' => $item->get_permalink(),
        'title' => $item->get_title(),
        'description' => $item->get_description(),
        'published_at' => Carbon::parse($item->get_date())->toDateTimeString()
    ];
})->each(function ($item, $key) {
    $article = Article::whereLink($item['link'])->first();

    if (!$article) {
        Article::create($item);
    }
});
```