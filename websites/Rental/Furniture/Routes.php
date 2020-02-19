<?php
namespace Furniture;

use Furniture\Conrollers\pageController;

class Routes implements \classes\Routes {

    
    private $landlordsTable;
    private $usersTable;
    private $newsTable;
    private $imagesTable;
    private $enquiriesTable;
    private $authentication;
    private $images;

    public function __construct()
    {    
        require '../classes/DatabaseConnection.php';

        
        // Code provided by Tom Butler & Kevin Yank from the book PHP & MYSQL: Novice to Ninja however with adjustments made to suit this assigment
        //References Page 544
        
        // $this->furnitureTable = new \classes\databaseFunctions($pdo, 'furniture', 'id','\Furniture\Entities\Furniture',[&$this->categoryTable,&$this->imagesTable]);
        $this->usersTable = new \classes\databaseFunctions($pdo, 'users', 'id','\Furniture\Entities\Admin');  
        $this->imagesTable = new \classes\databaseFunctions($pdo, 'images', 'id');
        $this->rentalsTable = new \classes\databaseFunctions($pdo, 'rentalts', 'rental_id');
        $this->tenantsTable = new \classes\databaseFunctions($pdo, 'tenants', 'tenant_id');
        $this->roomsTable = new \classes\databaseFunctions($pdo, 'room', 'room_id');
        $this->housesTable = new \classes\databaseFunctions($pdo, 'houses', 'house_id');
        $this->landlordsTable = new \classes\databaseFunctions($pdo, 'landlords', 'landlord_id');

        // $this->images = new \classes\Images($this->imagesTable);
        
        $this->authentication = new \classes\Authentication($this->usersTable, 'email', 'password');

    }
    public function getRoutes(): array
    {
        //Define controllers
        $employeeController = new \Furniture\Controllers\employees($this->usersTable, $_GET, $_POST);
        $adminController = new \Furniture\Controllers\admin($this->authentication,$this->imagesTable, $this->images,$this->usersTable, $this->landlordsTable, $_GET, $_POST); 
    
        $routes = [
            '' => [
                'GET' => [
                'controller' => $adminController,
                'function' => 'login',
                ],
                'POST' => [
                    'controller' => $adminController,
                    'function' => 'processLogin',
                ],
            ],

            'admin' => [
                "GET" => [
                    'controller' => $adminController,
                    "function" => 'showHome'
                ],
                'login' => true,
                ],


                // Landlords


                'admin/landlords' => [
                    "GET" => [
                        'controller' => $adminController,
                        "function" => 'showLandlords'
                    ],
                    'login' => true,
                    ],
                
      


                //Users

                'admin/edit-users' => [
                    'GET' => [
                        'controller' => $employeeController,
                        'function' => 'editemployee'
                    ],
                    'POST' => [
                        'controller' => $employeeController,
                        'function' => 'editemployee'
                    ],
                    'login' => true,
                ],

                

                'admin/addemployee' => [
                    'GET' => [
                        'controller' => $employeeController,
                        'function' => 'addEmployee'
                    ],
                    'POST' => [
                        'controller' => $employeeController,
                        'function' => 'registerUser',
                    ],
                    'login' => true,
                    'permissions' => \Furniture\Entities\Admin::ADD,
                ],

                // Permissions
                'admin/permissions' => [
                    'GET' => [
                        'controller' => $employeeController,
                        'function' => 'permissions',
                    ],

                    'POST' => [
                    'controller' => $employeeController,
                    'function' => 'savePermissions',
                    ],

                    'login' => true,
                    'permissions' => \Furniture\Entities\Admin::EDIT_USER_ACCESS,
                    ],

                'admin/list' => [
                    'GET' => [
                        'controller' => $employeeController,
                        'function' => 'list',
                    ],

                    'POST' => [
                        'controller' => $employeeController,
                        'function' => 'list',
                    ],
                    'login' => true,
                    'permissions' => \Furniture\Entities\Admin::EDIT_USER_ACCESS,
                        ],



                // Logout

                'logout' => [
                    'GET' => [
                        'controller' => $adminController,
                        'function' => 'logout',
                    ],
                    'login' => true,
                    ],

                ];


    return $routes;
    
}

// Used to access methods inside of class
public function getAuthentication(): \classes\Authentication
{
    return $this->authentication;
}

//Checks to see whether a user has permission
public function checkPermission ($permission): bool
{
    $user = $this->authentication->getUser();

    if($user && $user->hasPermission($permission))
    {
        return true;
    } else
    {
        return false;
    }
}

}