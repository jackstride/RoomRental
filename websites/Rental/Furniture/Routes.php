<?php
namespace Furniture;

use Furniture\Conrollers\pageController;

class Routes implements \classes\Routes {

    
    private $landlordsTable;
    private $housesTable;
    private $roomsTable;
    private $tenantsTable;
    private $rentalsTable;
    private $usersTable;    
    private $imagesTable;
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
        $this->rentalsTable = new \classes\databaseFunctions($pdo, 'rentals', 'rental_id');
        $this->tenantsTable = new \classes\databaseFunctions($pdo, 'tenants', 'tenant_id','\Furniture\Entities\Room',[&$this->landlordsTable,&$this->rentalsTable,&$this->roomsTable]);
        $this->roomsTable = new \classes\databaseFunctions($pdo, 'rooms', 'room_id','\Furniture\Entities\Room',[&$this->landlordsTable,&$this->rentalsTable,&$this->roomsTable]);
        $this->housesTable = new \classes\databaseFunctions($pdo, 'houses', 'house_id','\Furniture\Entities\Room',[&$this->landlordsTable,&$this->rentalsTable,&$this->roomsTable]);
        $this->landlordsTable = new \classes\databaseFunctions($pdo, 'landlords', 'landlord_id');
        // $this->images = new \classes\Images($this->imagesTable);
        
        $this->authentication = new \classes\Authentication($this->usersTable, 'email', 'password');

    }
    public function getRoutes(): array
    {
        //Define controllers
        $employeeController = new \Furniture\Controllers\employees($this->usersTable, $_GET, $_POST);
        $adminController = new \Furniture\Controllers\admin($this->authentication,$this->imagesTable, $this->images,$this->usersTable, $this->landlordsTable, $this->housesTable, $this->roomsTable, $this->tenantsTable, $this->rentalsTable, $_GET, $_POST); 
        $editController = new \Furniture\Controllers\edit($this->authentication,$this->imagesTable, $this->images,$this->usersTable, $this->landlordsTable, $this->housesTable, $this->roomsTable, $this->tenantsTable, $this->rentalsTable, $_GET, $_POST); 
    
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
                    "POST" => [
                        'controller' => $adminController,
                        "function" => 'showLandlords'
                    ],
                    'login' => true,
                    ],

                
                // Add landlord
                'admin/landlords/add' => [
                    "GET" => [
                        'controller' => $adminController,
                        "function" => 'addLandLord'
                    ],
                    'POST' => [
                        'controller' => $adminController,
                        'function' => 'addLandlord'
                    ],
                ],


                // Edit Landlord 


                'admin/landlords/edit' => [
                    "GET" => [
                        'controller' => $editController,
                        "function" => 'editLandlord'
                    ],
                    'POST' => [
                        'controller' => $editController,
                        'function' => 'editLandlord'
                    ],
                ],


                // Houses

                'admin/houses' => [
                    "GET" => [
                        'controller' => $adminController,
                        "function" => 'showHouses'
                    ],
                    'POST' => [
                        'controller' => $adminController,
                        'function' => 'showHouses'
                    ],
                ],

                'admin/houses/add' => [
                    "GET" => [
                        'controller' => $adminController,
                        "function" => 'addHouse'
                    ],
                    'POST' => [
                        'controller' => $adminController,
                        'function' => 'addHouse'
                    ],
                ],


                'admin/houses/edit' => [
                    "GET" => [
                        'controller' => $editController,
                        "function" => 'editHouse'
                    ],
                    'POST' => [
                        'controller' => $editController,
                        'function' => 'editHouse'
                    ],
                ],


                //Rooms 

                'admin/rooms' => [
                    "GET" => [
                        'controller' => $adminController,
                        "function" => 'showRooms'
                    ],
                    'POST' => [
                        'controller' => $adminController,
                        'function' => 'showRooms'
                    ],
                ],

                'admin/rooms/add' => [
                    "GET" => [
                        'controller' => $adminController,
                        "function" => 'addRoom'
                    ],
                    'POST' => [
                        'controller' => $adminController,
                        'function' => 'addRoom'
                    ],
                ],

                'admin/room/edit' => [
                    "GET" => [
                        'controller' => $editController,
                        "function" => 'editRoom'
                    ],
                    'POST' => [
                        'controller' => $editController,
                        'function' => 'editRoom'
                    ],
                ],


                // Tenants

                'admin/tenants' => [
                    "GET" => [
                        'controller' => $adminController,
                        "function" => 'showTenants'
                    ],
                    'POST' => [
                        'controller' => $adminController,
                        'function' => 'showTenants'
                    ],
                ],

                'admin/tenants/add' => [
                    "GET" => [
                        'controller' => $adminController,
                        "function" => 'addTenants'
                    ],
                    'POST' => [
                        'controller' => $adminController,
                        'function' => 'addTenants'
                    ],
                ],

                'admin/tenants/edit' => [
                    "GET" => [
                        'controller' => $editController,
                        "function" => 'editTenant'
                    ],
                    'POST' => [
                        'controller' => $editController,
                        'function' => 'editTenant'
                    ],
                ],

                // Rentals

                'admin/rentals' => [
                    "GET" => [
                        'controller' => $adminController,
                        "function" => 'showRentals'
                    ],
                    'POST' => [
                        'controller' => $adminController,
                        'function' => 'showRentals'
                    ],
                ],

                'admin/rentals/add' => [
                    "GET" => [
                        'controller' => $adminController,
                        "function" => 'addRental'
                    ],
                    'POST' => [
                        'controller' => $adminController,
                        'function' => 'addRental'
                    ],
                ],


                'admin/rentals/edit' => [
                    "GET" => [
                        'controller' => $editController,
                        "function" => 'editRental'
                    ],
                    'POST' => [
                        'controller' => $editController,
                        'function' => 'editRental'
                    ],
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