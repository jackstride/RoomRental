<?php


namespace Furniture\Controllers;

class Admin {
    
    private $authentication;
    private $landlordsTable;
    private $imagesTable;
    private $images;
    private $usersTable;
    private $get;
    private $post;
    
    //Defines which classes are needed.
    public function __construct(\classes\Authentication $authentication,$imagesTable, $images,$usersTable, $landlordsTable, array $get, array $post)
    {
        $this->authentication = $authentication;
        $this->landlordsTable = $landlordsTable;
        $this->imagesTable = $imagesTable;
        $this->images = $images;
        $this->usersTable = $usersTable;
        $this->get = $get;
        $this->post = $post;
    }
    public function login() {
    // Redirects the user if already logged in
    if(isset($_SESSION['username']))
    {
        header('Location: /admin');
    }

    else
    {
        return ['template' => 'admin/admin-login-template.php',
        'title' => 'Login',
        'class' => 'admin',
        'variables' => []
                ];  
    }
    }

    public function validateLogin($email,$password) {
        $errors = [];

        if (empty($email))
        {
            $errors[] = 'Email cannot be blank';
        }
        elseif(!count($this->usersTable->find('email', $email)) > 0 )
        {
            $errors[] = "This email does not exist with our records";
        }
        
        if(empty($password))
        {
            $errors[] = 'Password cannot be blank';
        }
        return $errors;
    }

    public function processLogin()
    {
        if($this->authentication->login($_POST['email'], $_POST['password']))
        {
            return ['template' => 'admin/admin-success.php',
                'title' => 'Logged in',
                'class' => 'admin',
                'variables' => [],
                ];
        }
         else
        {
            $errors = $this->validateLogin($_POST['email'],$_POST['password']);

            if(count($errors))
            {
                return ['template' => 'admin/admin-login-template.php',
                    'title' => 'Login',
                    'class' => 'admin',
                    'variables' => [
                        'errors' => $errors,
                    ]
                ];  
            }
        }
    }


    public function showHome()

    {
        

        return ['template' => 'admin/admin-success.php',
        'title' => 'Login',
        'class' => 'admin',
        'variables' => [
        ]
                ];  
    }

    


    

    public function logout()
    {
        //https://stackoverflow.com/questions/3512507/proper-way-to-logout-from-a-session-in-php getting issues when using unset session
        unset($_SESSION['username']);
        session_destroy();
        return [
            'template' => 'logout.php',
            'title' => 'You have been logged out',
            'variables' => [
            ]
        ];
    }




//Landlords


public function showLandlords () {
    $landlords = $this->landlordsTable->findAll();
    return [
        "template" => 'admin/landlords.php',
        "title" => "landlords",
        'class' => "test",
        'heading' => "Landlords",
        'buttons' => [
            'enabled' => true,
            'addLink' => '/test',
            'deleteLink' => '/test',
            'editLink' => '/test',
        ],
        'variables' => [
            'landlords' => $landlords,
        ],
    ];
}    
}




?>