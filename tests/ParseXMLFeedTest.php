<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParseXMLFeedTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testItErrorsIfIncorrectURLIsPassed()
    {
        $this->artisan('rss:parse', ['feed' => 'not_found']);
    }

    public function testItSucceedsIfCorrectOrNoURLIsPassed()
    {
        $this->artisan('rss:parse');
    }
}
