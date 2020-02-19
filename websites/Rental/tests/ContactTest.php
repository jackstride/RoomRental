<?php

use furniture\controllers\page;


class ContactTest extends \PHPUnit\Framework\TestCase {

    private $controller;

    public function setUp(){

        $pdo = new \PDO('mysql:host=v.je;dbname=furniture', 'student', 'student');
        $enquiriesTable = new \classes\databaseFunctions($pdo,'enquiries','id');

        $this->controller = new \Furniture\Controllers\Page($enquiriesTable,$enquiriesTable,$enquiriesTable,[],[]);
        
        @session_start();
    }


    public function testCorectAll() {
        $contact = [
            'name' => "Jack",
            'email' => "jackstride@outlook.com",
            'message' => "Do you have these items in stock?",
        ];

        $errors = $this->controller->validateContact($contact);

        $this->assertEquals(count($errors), 0);
    }

    public function testEmptyName() {
        $contact = [
            'name' => "",
            'email' => "jackstride@outlook.com",
            'message' => "Do you have these items in stock?",
        ];

        $errors = $this->controller->validateContact($contact);

        $this->assertEquals(count($errors), 1);
    }

    public function testEmptyEmail() {
        $contact = [
            'name' => "Jack",
            'email' => "",
            'message' => "Do you have these items in stock?",
        ];

        $errors = $this->controller->validateContact($contact);

        $this->assertEquals(count($errors), 1);
    }

    public function testValidateEmail() {
        $contact = [
            'name' => "Jack",
            'email' => "Abc.example.com",
            'message' => "Do you have these items in stock?",
        ];

        $errors = $this->controller->validateContact($contact);

        $this->assertEquals(count($errors), 1);
    }

    public function testEmptyMessage() {
        $contact = [
            'name' => "Jack",
            'email' => "jackstride@outlook.com",
            'message' => "",
        ];

        $errors = $this->controller->validateContact($contact);

        $this->assertEquals(count($errors), 1);
    }




    

}