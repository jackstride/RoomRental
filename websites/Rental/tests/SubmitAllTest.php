<?php

use classes\databaseFunctions;
use Furniture\Controllers\Employees;
use Furniture\Controllers\News;




class SubmitAllTest extends \PHPUnit\Framework\TestCase {

    private $controller;
    private $pdo;
    private $usersTable;
    private $newsTable;

    public function setUp(){

        $pdo = new \PDO('mysql:host=v.je;dbname=furniture', 'student', 'student');
        $usersTable = new \classes\databaseFunctions($pdo,'users','id');
        $categoryTable = new \classes\databaseFunctions($pdo,'category','id');
        $enquiriesTable = new \classes\databaseFunctions($pdo,'enquiries','id');
        $furnitureTable = new \classes\databaseFunctions($pdo,'furniture','id');
        $newsTable = new \classes\databaseFunctions($pdo,'news','id');
        $authentication = new \classes\authentication($usersTable,'test@test.co.uk','test');
        
        
        
        
        $this->usersTable = $usersTable;
        $this->categoryTable = $categoryTable;
        $this->enquiriesTable = $enquiriesTable;
        $this->furnitureTable = $furnitureTable;
        $this->newsTable = $newsTable;
        $this->authentication = $authentication;
        
        
        
    }

    // public function testRegisterSubmit() {

    //     $this->usersTable->query('DELETE FROM users WHERE email = "test111@test.co.uk"');

    //     $stmt = $this->usersTable->query('SELECT name,email,password FROM users WHERE email = "test111@test.co.uk"');

    //     $record = $stmt->fetch();

    //     $this->assertFalse($record);

    //     $testData = [
    //         'user' => [
    //             'name' => 'Billy',
    //             'email' => 'test111@test.co.uk',
    //             'password' => 'secret',
    //             ]
    //         ];

    //         $controller = new \Furniture\Controllers\Employees($this->usersTable,[],$testData);
            
    //         $controller->registerUser();

    //         $stmt = $this->usersTable->query('SELECT name,email,password FROM users WHERE email = "test111@test.co.uk"');

    //         $record = $stmt->fetch();

    //         $this->assertEquals($record->name, $testData['user']['name']);
    //         $this->assertEquals($record->email, $testData['user']['email']);
    //         //Will throw one error due to password being hashed. The password will not equal what is submitted
    //         $this->assertTrue($record->password, $testData['user']['password']);
    // }

    // public function testLoginSubmit() {
        
    //     $stmt = $this->usersTable->query('SELECT email,password FROM users WHERE email = "test@test.co.uk"');

    //     $record = $stmt->fetch();

    //     $this->assertFalse($record);

    //     $testData = [
    //         'user' => [
    //             'email' => 'test@test.co.uk',
    //             'password' => 'test',
    //             ]
    //         ];

    //         $controller = new \Furniture\Controllers\Admin($this->authentication ,$this->usersTable ,NULL ,NULL ,NULL ,NULL, [], $testData);
            
    //         $controller->login();

    //         $stmt = $this->usersTable->query('SELECT email,password FROM users WHERE email = "test@test.co.uk"');

    //         $record = $stmt->fetch();

    //         $this->assertEquals($record->email, $testData['user']['email']);
    //         $this->assertEquals(password_verify($testData['user']['password'],$record->password),$testData['user']['password']);
    //         $this->assertEquals($record->password,$testData['user']['password']);
    // }

    public function testCategorySubmit() {

        $this->categoryTable->query('DELETE FROM category WHERE name = "Test Insert"');

        $stmt = $this->usersTable->query('SELECT name FROM category WHERE name = "Test Insert"');

        $record = $stmt->fetch();

        $this->assertFalse($record);

        $testData = [
            'cat' => [
                'name' => 'Test Insert',
            ]
            ];

            $controller = new \Furniture\Controllers\Admin($this->authentication ,$this->categoryTable ,NULL,NULL ,NULL ,NULL ,NULL, [], $testData);
            
            $controller->addSubmit();

            $stmt = $this->usersTable->query('SELECT name FROM category WHERE name = "Test Insert"');

            $record = $stmt->fetch();

            $this->assertEquals($record->name, $testData['cat']['name']);
            
    }

    //Will throw one error as it tries to call a function
    public function testProductSubmit() {

        $this->furnitureTable->query('DELETE FROM furniture WHERE name = "Test Product"');

        $stmt = $this->furnitureTable->query('SELECT name,description,price,categoryId,hide,quality FROM furniture WHERE name = "Test Furniture"');

        $record = $stmt->fetch();

        $this->assertFalse($record);

        $testData = [
            'product' => [
                'name' => 'Test Product',
                'description' => 'Test description',
                'price' => '999.90',
                'categoryId' => '2',
                'hide' => 'show',
                'quality' => 'new',
            ],
            ];

            $controller = new \Furniture\Controllers\Admin($this->authentication ,NULL ,$this->furnitureTable,NULL ,NULL ,NULL ,NULL, [], $testData);
            
            $controller->subFurniture();

            $stmt = $this->furnitureTable->query('SELECT name,description,price,categoryId,hide,quality FROM furniture WHERE name = "Test Product"');

            $record = $stmt->fetch();
            
            $this->assertEquals($record->name, $testData['product']['name']);
            $this->assertEquals($record->description, $testData['product']['description']);
            $this->assertEquals($record->price, $testData['product']['price']);
            $this->assertEquals($record->categoryId, $testData['product']['categoryId']);
            $this->assertEquals($record->hide, $testData['product']['hide']);
            $this->assertEquals($record->quality, $testData['product']['quality']);

    }

    public function testNewsSubmit() {

        $this->newsTable->query('DELETE FROM news WHERE title = "Test News"');

        $stmt = $this->newsTable->query('SELECT title,description FROM news WHERE title = "Test News"');

        $record = $stmt->fetch();

        $this->assertFalse($record);

        $testData = [
            'news' => [
                'title' => 'Test News',
                'description' => 'Test description',
            ]
            ];

            $controller = new \Furniture\Controllers\News($this->authentication ,$this->newsTable ,NULL ,NULL ,NULL , [], $testData);
            
            $controller->newsSubmit();

            $stmt = $this->newsTable->query('SELECT title,description FROM news WHERE title = "Test News"');

            $record = $stmt->fetch();
            
            $this->assertEquals($record->title, $testData['news']['title']);
            $this->assertEquals($record->description, $testData['news']['description']);
           

    }

    public function testingEnquiriesSubmit() {

        $this->enquiriesTable->query('DELETE FROM enquiries WHERE message = "Test Message"');

        $stmt = $this->enquiriesTable->query('SELECT name,contact_number,email,message FROM enquiries WHERE message = "Test Message"');

        $record = $stmt->fetch();

        $this->assertFalse($record);

        $testData = [
            'contact' => [
                'name' => 'Test News',
                'contact_number' => '07710999999',
                'email' => 'test@test.co.uk',
                'message' => 'Test Message',
            ]
            ];

            $controller = new \Furniture\Controllers\Page(NULL,NULL,$this->enquiriesTable, [], $testData);
            
            $controller->contactSubmit();

            $stmt = $this->enquiriesTable->query('SELECT name,contact_number,email,message FROM enquiries WHERE message = "Test Message"');

            $record = $stmt->fetch();
            
            $this->assertEquals($record->name, $testData['contact']['name']);
            $this->assertEquals($record->contact_number, $testData['contact']['contact_number']);
            $this->assertEquals($record->email, $testData['contact']['email']);
            $this->assertEquals($record->message, $testData['contact']['message']);
           

    }

    

   
}






















?>