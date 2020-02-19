<?php

use Furniture\Controllers\Admin;
use Classes\Authentication;


class ContactResponseTest extends \PHPUnit\Framework\TestCase {

    private $controller;

    public function setUp(){

        $pdo = new \PDO('mysql:host=v.je;dbname=furniture', 'student', 'student');
        $enquiriesTable = new \classes\databaseFunctions($pdo,'enquiries','id');
        $authentication = new authentication($enquiriesTable,'test','test','test');

        $this->controller = new Admin($authentication,$enquiriesTable,$enquiriesTable,$enquiriesTable,$enquiriesTable,$enquiriesTable,$enquiriesTable,[],[]);
           
    }

    public function testValidResponse () {

        $contact = [
            'response_message' => "Thankyou for your feedback",
        ];

        $errors = $this->controller->validateResponse($contact);

        $this->assertEquals(count($errors), 0);

    }

    public function testEmptyMessage () {

        $contact = [
            'response_message' => "",
        ];

        $errors = $this->controller->validateResponse($contact);

        $this->assertEquals(count($errors), 1);

    }




    



    

}