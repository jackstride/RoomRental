<?php

use classes\databaseFunctions;
use Classes\Authentication;
use Furniture\Controllers\News;


class NewsTest extends \PHPUnit\Framework\TestCase {

    private $controller;

    public function setUp(){

        $pdo = new \PDO('mysql:host=v.je;dbname=furniture', 'student', 'student');
        $newsTable = new databaseFunctions($pdo,'news','id');
        $authentication = new authentication($newsTable,'test','test','test');

        $this->controller = new News($authentication, $newsTable,$newsTable,$newsTable,$newsTable,[],[]);
        
     
    }

    public function testValidNews() {

        $news = [
            'title' => 'This is a news title',
            'description' => 'This is going to be a long description about the news that the company sends out',
            
        ];

        $errors = $this->controller->validateNews($news);

        $this->assertEquals(count($errors), 0);

    }

    public function testEmptyNews() {

        $news = [
            'title' => '',
            'description' => '',
            
        ];

        $errors = $this->controller->validateNews($news);

        $this->assertEquals(count($errors), 2);

    }

    public function testTitle() {

        $news = [
            'title' => 'This is a news title',
            'description' => '',
        ];

        $errors = $this->controller->validateNews($news);

        $this->assertEquals(count($errors), 1);

    }

    public function testDescription() {

        $news = [
            'title' => '',
            'description' => 'This is going to be a long description about the news that the company sends out',
            
        ];

        $errors = $this->controller->validateNews($news);

        $this->assertEquals(count($errors), 1);

    }






}