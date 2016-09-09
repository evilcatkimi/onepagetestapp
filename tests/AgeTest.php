<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    public function testWithInvalidAgeGreaterThan100 (){
        $absolutePath = public_path() .'/img/scuti_logo.png';
        $this->visit('/')
            ->click('btn-add')
            ->see('frmMember')
            ->type('Test Name', 'name')
            ->type('101','age')
            ->type('Ha Noi','address')
            ->attach($absolutePath, 'image')
            //->click('btn-luu') Can't click button because AngularJS blocked button
            ->see('Your age is > 100!');//AngularJS checked
    }


    public function testWithInvalidAgeLessThan0 (){
        $absolutePath = public_path() .'/img/scuti_logo.png';
        $this->visit('/')
            ->click('btn-add')
            ->see('frmMember')
            ->type('Test Name', 'name')
            ->type('-1','age')
            ->type('Ha Noi','address')
            ->attach($absolutePath, 'image')
            //->click('btn-luu') Can't click button because AngularJS blocked button
            ->see('Your age is < 0 Really ?');//AngularJS checked
    }

    public function testWithAgeEqual0(){
        $this->visit('/')
            ->click('btn-add')
            ->see('frmMember')
            ->type('Test Name', 'name')
            ->type('0','age')
            ->type('Viet Nam','address')
            ->click('btn-luu')
            ->seePageIs('/');
    }

    public function testWithAgeEqual100(){
        $this->visit('/')
            ->click('btn-add')
            ->see('frmMember')
            ->type('Test Name', 'name')
            ->type('100','age')
            ->type('Viet Nam','address')
            ->click('btn-luu')
            ->seePageIs('/');
    }

}