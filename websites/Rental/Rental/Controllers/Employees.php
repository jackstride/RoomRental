<?php
namespace Rental\Controllers;

class Employees {
    
    private $usersTable;
    private $get;
    private $post;

    public function __construct($usersTable, array $get, array $post)
    {
        $this->usersTable = $usersTable;
        $this->get = $get;
        $this->post = $post;
    }

    public function addEmployee()
    {
        return [
        'template' => 'admin/add-employee-template.php',
        'title' => 'Register Account',
        'class' => 'admin',
        'variables' => []
                ];  
    }

    

    public function validateUser($user) {

        $errors = [];

        if(empty($user['name']))
        {
            $errors[] = 'Name cannot be blank';
        }
        if (empty($user['email']))
        {
            $errors[] = 'Email cannot be blank';
        }
        else if (!filter_var($user['email'],FILTER_VALIDATE_EMAIL))
        {
            $errors[] = 'This is not a valid email address';
        }
        if(count($this->usersTable->find('email', $user['email'])) > 0 )
        {
            $errors[] = "Email already registered";
        }
        
        if(empty($user['password']))
        {
            $errors[] = 'Password cannot be blank';
        }

        return $errors;


    }


    public function registerUser()
    {
            $errors = $this->validateUser($this->post['user']);
            
            if(count($errors)){
                return [
                    'template' => 'admin/add-employee-template.php',
                    'title' => 'Register Account',
                    'class' => 'admin',
                    'variables' => [
                        'errors' => $errors,
                    ],
                            ];
            }
            else
            {
                $this->post['user']['password'] = password_hash($this->post['user']['password'], PASSWORD_DEFAULT);
                $this->usersTable->insert($this->post['user']);
                header('Location: /admin/list');
            }
        }








        public function editemployee()
        {
            $users = $this->usersTable->find('id', $_GET['id']);

            $errors = [];

            if(isset($_POST['submit']))
            {   

            //Just want to validate the email // from PHP manual
            if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
            {
                $errors[] = 'Invalid email address';
            }
            if(count($errors))
            {
                return [
                    'template' => 'admin/edit-users.php',
                    'title' => 'Edit users',
                    'class' => 'admin',
                    'variables' => [
                        'users' => $users,
                        'errors' => $errors,
                    ]
                    ];
            }
            else 
            {
                //Hashes new passoword
                $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $values = [
                    'id' => $_GET['id'],
                    'email' => $_POST['email'],
                    'name' => $_POST['name'],
                    'password' => $pass,
                ];
                
                

                // If password value is black then remove from array otherwise it will rehash the password that's already hashed.
                if(empty($_POST['password'])){
                    unset($values['password']);
                }


                $this->usersTable->update($values);
                header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
            }
        }
         else
        {

        return [
            'template' => 'admin/edit-users.php',
            'title' => 'Edit users',
            'class' => 'admin',
            'variables' => [
                'users' => $users,
            ]
            ];
        }
    }
        

    // User role methods provided by Tom Butler & Kevin Yank from the book PHP & MYSQL: Novice to Ninja however with adjustments made to suit this assigment
    public function list ()
    {
        if(isset($_POST['delete']))
        {
            $vars = [
                'id' => $_POST['id'],
            ];

            $this->usersTable->delete($vars);

            header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
        }

        else

        {

        $users = $this->usersTable->findAll();
        
        return [
            'template' => 'admin/employee-list-template.php',
            'title' => 'List permissions',
            'class' => 'admin',
            'variables' => [
                'users' => $users,
            ]
            ]; 
        }
    }

    // User role methods provided by Tom Butler & Kevin Yank from the book PHP & MYSQL: Novice to Ninja however with adjustments made to suit this assigment
    public function permissions ()
    {
        $users = $this->usersTable->find('id',$_GET['id']);
        $reflected = new \ReflectionClass('\Rental\Entities\Admin');
        $constants = $reflected->getConstants();

                return [
                    'template' => 'admin/permissions.php',
                    'title' => 'Edit Permissions',
                    'class' => 'admin',
                    'variables' => [
                        'users' => $users,
                        'permissions' => $constants,
                    ]
                    ];
    }

    //Work of jammy art
    public function savePermissions()
    {
        if(isset($_POST['submit']))
        {
            if($_GET['table'] == 'furniture')
            {
                $column = 'f_permissions';
            }
            else if($_GET['table'] == 'category')
            {
                $column = 'c_permissions';
            }
            else if($_GET['table'] == 'news')
            {
                $column = 'n_permissions';
            }
            else
            {
                $column = 's_permissions';
            }
        
        //// Permissions provided by Tom Butler & Kevin Yank from the book PHP & MYSQL: Novice to Ninja however with adjustments made to suit this assigment
        $user = [
            'id' => $_GET['id'],
            $column => array_sum($_POST['permissions'] ?? []),
        ];

        $this->usersTable->update($user);

        header("Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");

        }
        //Changes the URL and sets the get table variable to a column to a type or permission
        else
        {
            if(isset($_POST['change']))
            {
                header("Location: permissions?id=" . $_GET['id'] . "&table=" . $_POST['table']);
                $this->permissions();
            }
        }
    }

    
    }
?>