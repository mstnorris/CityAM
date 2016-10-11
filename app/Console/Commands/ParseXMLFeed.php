<?php

namespace App\Console\Commands;

use App\Article;
use Carbon\Carbon;
use Exception;
use Feeds;
use Illuminate\Console\Command;

class ParseXMLFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rss:parse {feed=http://www.cityam.com/feeds/sections/news.xml}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reads the specified City A.M. RSS feed and stores the data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $feedURL = $this->argument('feed');

        $feed = Feeds::make($feedURL);

        $this->line('Processing URL: ' . $feedURL);

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


    }
}