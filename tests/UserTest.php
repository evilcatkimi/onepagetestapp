<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    public function testWithValidInput(){
        $absolutePath = public_path() .'/img/scuti_logo.png';
        $this->visit('/')
            ->click('btn-add')
            ->see('frmMember')
            ->type('Test Name', 'name')
            ->type('23','age')
            ->type('Viet Nam','address')
            ->attach($absolutePath, 'image')
            ->click('btn-luu')
            ->seePageIs('/');
    }

    public function testWithInvalidName(){
        $absolutePath = public_path() .'/img/scuti_logo.png';
        $this->visit('/')
            ->click('btn-add')
            ->see('frmMember')
            ->type('', 'name')
            ->type('23','age')
            ->type('Viet Nam','address')
            ->attach($absolutePath, 'image')
 //         ->click('btn-luu') Can't click button because AngularJS blocked button
            ->see('Please enter your name');//AngularJS
    }


    public function testWithInvalidAddress(){
        $absolutePath = public_path() .'/img/scuti_logo.png';
        $this->visit('/')
            ->click('btn-add')
            ->see('frmMember')
            ->type('Test Name', 'name')
            ->type('23','age')
            ->type('','address')
            ->attach($absolutePath, 'image')
            //->click('btn-luu') Can't click button because AngularJS blocked button
            ->see('Please enter your Address');//AngularJS checked
    }

    public function testWithOutImage(){
        $this->visit('/')
            ->click('btn-add')
            ->see('frmMember')
            ->type('Test Name', 'name')
            ->type('23','age')
            ->type('Viet Nam','address')
            ->click('btn-luu')
            ->seePageIs('/');
    }
}
