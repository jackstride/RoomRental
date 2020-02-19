<?php

require_once "classes/databaseFunctions.php";
use Furniture\Controllers\Employees;


class RegisterUserTest extends \PHPUnit\Framework\TestCase {

    private $controller;

    public function setUp(){

        $pdo = new \PDO('mysql:host=v.je;dbname=furniture', 'student', 'student');
        $usersTable = new \classes\databaseFunctions($pdo,'users','id');

        $this->controller = new Employees($usersTable,[],[]);

        
    }

    //Leave others blank
    
    public function testValidName () {
        
        $invalidEmail = [
            'name' => 'Jack',
            'email' => '',
            'password' => '',
        ];

        $errors = $this->controller->validateUser($invalidEmail);

        $this->assertEquals(count($errors), 2);

    }
    
    public function testValidEmail() {
        $invalidEmail = [
            'name' => '',
            'email' => 'testjack@outlook.com',
            'password' => '',
        ];

        $errors = $this->controller->validateUser($invalidEmail);

        $this->assertEquals(count($errors), 2);

    }
    
    public function testValidPassword(){
        $invalidEmail = [
            'name' => '',
            'email' => '',
            'password' => 'secret',
        ];

        $errors = $this->controller->validateUser($invalidEmail);

        $this->assertEquals(count($errors), 2);

    }

    //Filling in other fields
    
    public function testBlankEmail() {
        $invalidEmail = [
            'name' => 'Jack',
            'email' => '',
            'password' => 'secret',
        ];

        $errors = $this->controller->validateUser($invalidEmail);

        $this->assertEquals(count($errors), 1);

    }

    public function testBlankPassword() {
        $invalidEmail = [
            'name' => 'Jack',
            'email' => 'jackstride@outlook.com',
            'password' => '',
        ];

        $errors = $this->controller->validateUser($invalidEmail);

        $this->assertEquals(count($errors), 1);

    }

   // Leaving two of the form fields blank as seen above

    public function testAllValid() {
        $invalidEmail = [
            'name' => 'Jack',
            'email' => 'jackstride@outlook.com',
            'password' => 'secret',
        ];

        $errors = $this->controller->validateUser($invalidEmail);

        $this->assertEquals(count($errors), 0);

    }

    //Fail
    public function testExisitingEmail() {
        $invalidEmail = [
            'name' => 'Jack',
            'email' => 'test@test.co.uk',
            'password' => 'secret',
        ];

        $errors = $this->controller->validateUser($invalidEmail);

        $this->assertEquals(count($errors), 1);
    }

    //Fail
    public function testInvalidEmail() {

        $invalidEmail = [
            'name' => 'Jack',
            'email' => 'Abc.example.com',
            'password' => 'secret',
        ];

        $errors = $this->controller->validateUser($invalidEmail);

        $this->assertEquals(count($errors), 1);

    }
}






















?>