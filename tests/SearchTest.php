<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SearchTest extends TestCase
{
    public function testSearchExample()
    {
        $this->visit('/')
            ->see('Search everything')
            ->type('Viet','search');
    }
}