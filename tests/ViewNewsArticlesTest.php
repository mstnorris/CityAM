<?php

use App\Article;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewNewsArticlesTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
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
}
