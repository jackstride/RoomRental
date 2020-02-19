<?php

use classes\databaseFunctions;
use Furniture\Controllers\Admin;
use Classes\Authentication;


class FurnitureTest extends \PHPUnit\Framework\TestCase {

    private $controller;

    public function setUp(){

        $pdo = new \PDO('mysql:host=v.je;dbname=furniture', 'student', 'student');
        $categoryTable = new databaseFunctions($pdo,'furniture','id');
        $authentication = new authentication($categoryTable,'test','test','test');

        $this->controller = new Admin($authentication, $categoryTable,$categoryTable,$categoryTable,$categoryTable,$categoryTable,$categoryTable,[],[]);
        
     
    }


    public function testEmptyname() {

        $product = [
            'name' => '',
            'description' => 'This is going to be a long description',
            'price' => '999',
            'categoryId' => '2',
            'quality' => 'new',

        ];

        $errors = $this->controller->validateFurniture($product);

        $this->assertEquals(count($errors), 1);

    }

    public function testEmptyDescription() {

        $product = [
            'name' => 'Proudct',
            'description' => '',
            'price' => '999',
            'categoryId' => '2',
            'quality' => 'new',
        ];

        $errors = $this->controller->validateFurniture($product);

        $this->assertEquals(count($errors), 1);

    }

    public function testEmptyPrice() {

        $product = [
            'name' => 'product',
            'description' => 'This is going to be a long description',
            'price' => '',
            'categoryId' => '2',
            'quality' => 'new',

        ];

        $errors = $this->controller->validateFurniture($product);

        $this->assertEquals(count($errors), 1);

    }

    public function testEmptyCategoryId() {

        $product = [
            'name' => 'product',
            'description' => 'This is going to be a long description',
            'price' => '999',
            'categoryId' => '',
            'quality' => 'new',

        ];

        $errors = $this->controller->validateFurniture($product);

        $this->assertEquals(count($errors), 1);

    }


    public function testEmptyQuality() {

        $product = [
            'name' => 'product',
            'description' => 'This is going to be a long description',
            'price' => '999',
            'categoryId' => '2',
            'quality' => '',

        ];

        $errors = $this->controller->validateFurniture($product);

        $this->assertEquals(count($errors), 1);

    }

    public function testAllEmptyFields() {

        $product = [
            'name' => '',
            'description' => '',
            'price' => '',
            'categoryId' => '',
            'quality' => '',

        ];

        $errors = $this->controller->validateFurniture($product);

        $this->assertEquals(count($errors), 5);

    }

    public function testMostFilledIn() {

        $product = [
            'name' => '',
            'description' => '',
            'price' => '999',
            'categoryId' => '2',
            'quality' => 'new',

        ];

        $errors = $this->controller->validateFurniture($product);

        $this->assertEquals(count($errors), 2);

    }

    public function testAllFillIn() {

        $product = [
            'name' => 'Product',
            'description' => 'Description',
            'price' => '999',
            'categoryId' => '2',
            'quality' => 'new',

        ];

        $errors = $this->controller->validateFurniture($product);

        $this->assertEquals(count($errors), 0);

    }






}