<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    public function testBasicExample()
    {
        $this->visit('/')->type('Nguyen Hoang Anh', 'name')
            ->type('23','age')
            ->type('Viet Nam','address');
    }
}
