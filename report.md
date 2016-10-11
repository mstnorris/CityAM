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

### app/Console/Kernel.php

Registering the Artisan Command to run every minute

```php
protected function schedule(Schedule $schedule)
{
    $schedule->command('rss:parse')->everyMinute();
}
```

### app/Article.php

```php
// set the mass assignable fields
protected $fillable = ['title', 'link', 'description', 'published_at'];

// set the published_at attribute to be an instance of Carbon
protected $dates = ['published_at'];
```

### app/Http/Controllers/ArticleController.php

```php
public function index()
{
    $articles = Article::latest('published_at')->simplePaginate(5);

    return view('news')->with('articles', $articles);
}
```

### tests/ViewNewsArticlesTest.php

The tests are self explanatory, I'm using Model Factories to create dummy articles. The first test generates *one* article and checks that it is visible in the browser. The second test, checks to see that pagination works. The articles are displayed, five to a page, in reverse chronological order (latest first - by the `published_at` date).

```php
public function testCanViewNewsArticles()
{
    $firstArticle = factory(Article::class)->create([
        'link' => 'http://example.com/1',
        'title' => 'City A.M. First Article',
        'description' => 'This is the body of the first article.',
        'published_at' => Carbon::now()
    ]);

    $this->visit('/news')
        ->see('City A.M. First Article');
}

public function testPaginationOfNewsArticles()
{
    $firstArticle = factory(Article::class)->create([
        'link' => 'http://example.com/1',
        'title' => 'City A.M. First Article',
        'description' => 'This is the body of the first article.',
        'published_at' => Carbon::yesterday()->subDay()
    ]);

    $nextFourArticles = factory(Article::class, 4)->create([
        'published_at' => Carbon::yesterday()
    ]);

    $sixthArticle = factory(Article::class)->create([
        'link' => 'http://example.com/6',
        'title' => 'City A.M. Sixth Article',
        'description' => 'This is the body of the sixth article.',
        'published_at' => Carbon::now()
    ]);

    $this->visit('/news')
        ->see('City A.M. Sixth Article');
    $this->visit('/news?page=2')
        ->see('City A.M. First Article')
        ->dontSee('City A.M. Sixth Article');
}
```
