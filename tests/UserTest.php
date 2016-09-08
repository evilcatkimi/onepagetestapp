<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    public function testBasicExample()
    {
        $absolutePath = public_path() .'/img/scuti_logo.png';
        $this->visit('/public/')
            ->click('btn-add')
            ->see('frmMember')
            ->type('Nguyen Hoang Anh', 'name')
            ->type('23','age')
            ->type('Viet Nam','address')
            ->attach($absolutePath, 'image')
            ->click('btn-luu')
            ->seePageIs('/');
    }
}
