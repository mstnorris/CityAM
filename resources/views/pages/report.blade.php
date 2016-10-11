@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="display-4">Report</h1>

                <p class="lead">
                    I believe I've detailed all the important files that I've created/edited. As per my comments in the
                    instructions, I'm sure I've missed out a couple or two. The tests were not exhaustive, nor are all
                    the things that I could write about in this report. It meets the requirements and I hope this is
                    satisfactory.
                </p>

                <h2>app/Console/Commands/ParseXMLFeed.php</h2>

                <pre>
                    <code>
protected $signature = 'rss:parse {feed=http://www.cityam.com/feeds/sections/news.xml}';
                    </code>
                </pre>

                <p class="lead">The command is invoked via a scheduled cron job (default every minute) or manually. It
                    makes a **GET** request to the (optional) supplied City A.M. RSS Feed URL (a sensible default of
                    http://www.cityam.com/feeds/sections/news.xml is used if no URL is passed in).</p>

                <p class="lead">I'm using the <a href="https://github.com/willvincent/feeds">Feeds package from Will
                        Vincent</a> to parse the RSS Feed</p>

                <pre>
                    <code>
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
                    </code>
                </pre>

                <h2>app/Console/Kernel.php</h2>

                <p class="lead">Registering the Artisan Command to run every minute</p>

                <pre>
                    <code>
protected function schedule(Schedule $schedule)
{
    $schedule->command('rss:parse')->everyMinute();
}
                    </code>
                </pre>

                <h2>app/Article.php</h2>

                <pre>
                    <code>
// set the mass assignable fields
protected $fillable = ['title', 'link', 'description', 'published_at'];

// set the published_at attribute to be an instance of Carbon
protected $dates = ['published_at'];
                    </code>
                </pre>

                <h2>app/Http/Controllers/ArticleController.php</h2>

                <pre>
                    <code>
public function index()
{
    $articles = Article::latest('published_at')->simplePaginate(5);

    return view('news')->with('articles', $articles);
}
                    </code>
                </pre>

                <h2>tests/ViewNewsArticlesTest.php</h2>

                <p class="lead">The tests are self explanatory, I'm using Model Factories to create dummy articles. The
                    first test generates *one* article and checks that it is visible in the browser. The second test,
                    checks to see that pagination works. The articles are displayed, five to a page, in reverse
                    chronological order (latest first - by the `published_at` date).</p>

                <pre>
                    <code>
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
                    </code>
                </pre>

                <h2>resources/views/news.blade.php</h2>

                <p class="lead">I haven't included the view here as blade attempts to render the documentation as actual markup. Please open the file if you wish.</p>



    </div>
    </div>
    </div>

@endsection