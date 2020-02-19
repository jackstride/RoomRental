<?php


use Furniture\Controllers\Admin;
use Classes\authentication;


class CategoryTest extends \PHPUnit\Framework\TestCase {

    private $controller;

    public function setUp(){

        $pdo = new \PDO('mysql:host=v.je;dbname=furniture', 'student', 'student');
        $categoryTable = new \classes\databaseFunctions($pdo,'category','id');
        $authentication = new authentication($categoryTable,'test','test','test');

        $this->controller = new Admin($authentication, $categoryTable,$categoryTable,$categoryTable,$categoryTable,$categoryTable,$categoryTable,[],[]);
        
        @session_start();
    }


    public function testEmptyName() {
        $catName = [
            'name' => "",
        ];

        $errors = $this->controller->validateCategory($catName);

        $this->assertEquals(count($errors), 1);
    }

    public function testSymbolName() {
        $catName = [
            'name' => '""???@@@',
        ];

        $errors = $this->controller->validateCategory($catName);

        $this->assertEquals(count($errors), 1);

    }

    public function testCorrectName() {
        $catName = [
            'name' => 'Category',
        ];

        $errors = $this->controller->validateCategory($catName);

        $this->assertEquals(count($errors), 0);

    }

    public function testNameWithSpace() {

        $catName = [
            'name' => 'Category Test',
        ];

        $errors = $this->controller->validateCategory($catName);

        $this->assertEquals(count($errors), 0);

    }

    public function testCategoryNameSpaceOnly() {
        $catName = [
            'name' => " ",
        ];

        $errors = $this->controller->validateCategory($catName);

        $this->assertEquals(count($errors), 1);
    }

}