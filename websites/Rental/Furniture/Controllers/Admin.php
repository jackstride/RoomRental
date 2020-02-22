<?php


namespace Furniture\Controllers;

class Admin {
    
    private $authentication;
    private $landlordsTable;
    private $housesTable;
    private $roomsTable;
    private $tenantsTable;
    private $rentalsTable;
    private $imagesTable;
    private $images;
    private $usersTable;
    private $get;
    private $post;
    
    //Defines which classes are needed.
    public function __construct(\classes\Authentication $authentication,$imagesTable,$images,$usersTable,$landlordsTable,$housesTable,$roomsTable,$tenantsTable,$rentalsTable, array $get, array $post)
    {
        $this->authentication = $authentication;
        $this->imagesTable = $imagesTable;
        $this->images = $images;
        $this->usersTable = $usersTable;
        $this->get = $get;
        $this->post = $post;
        $this->landlordsTable = $landlordsTable;
        $this->housesTable = $housesTable;
        $this->roomsTable = $roomsTable;
        $this->tenantsTable = $tenantsTable;
        $this->rentalsTable = $rentalsTable;
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
    $bool = false;
    $vars= [];

    if(isset($_POST['delete'])) {

        $bool = true;

        $vars = $_POST['id'];    
    }

    if(isset($_POST['p_delete']))
        {
            $vars = [
                "id" => $_POST['id'],
            ];
            $this->landlordsTable->delete($vars);
        }
    
    $landlords = $this->landlordsTable->findAll();

    return [
        "template" => 'admin/landlords/landlords.php',
        "title" => "landlords",
        'class' => "test",
        'heading' => "Landlords",
        'buttons' => [
            'enabled' => true,
            'addLink' => 'landlords/add',
        ],
        'variables' => [
            'landlords' => $landlords,
            'prompt' => $bool,
            'val' => $vars,
        ],
    ];

}

public function addLandlord () {
    if(isset($_POST['submit'])) {
        $vars = $_POST['landlord'];
        $this->landlordsTable->insert($vars);
    }
        return [
            'template' => 'admin/landlords/add-landlord.php',
            'title' => 'You have been logged out',
            'heading' => "Add a new landlord",
            'variables' => [
            ]
        ];
}



// Houses of multiple
public function showHouses() {
    $bool = false;
    $vars= [];

    if(isset($_POST['delete'])) {

        $bool = true;

        $vars = $_POST['id'];    
    }

    if(isset($_POST['p_delete']))
        {
            $vars = [
                "id" => $_POST['id'],
            ];
            $this->housesTable->delete($vars);
        }


    $houses = $this->housesTable->findAll();    
        return [
            'template' => 'admin/hmo/hmo.php',
            'title' => 'Houses',
            'heading' => "Houses of Multiple Occupancy",
            'buttons' => [
                'enabled' => true,
                'addLink' => 'houses/add',
            ],
            'variables' => [
                'houses' => $houses,
                'prompt' => $bool,
                'val' => $vars,
            ]
        ];
}

public function addHouse() {

    $landlord = $this->landlordsTable->findAll();

    if(isset($_POST['submit'])){

        $this->housesTable->insert($_POST['house']);

        $defualtRoomValues = [
            'house_id' => $this->housesTable->maxId()
        ];

        $roomAmount = $_POST['house']['number_of_rooms'];

        $i = 0;

        for($i; $i < $roomAmount; $i++){

            $this->roomsTable->insert($defualtRoomValues);

        }
        
    }

    return [
            'template' => 'admin/hmo/add-hmo.php',
            'title' => 'Houses',
            'heading' => "Add HMO",
            'variables' => [
                'landlords' => $landlord
            ]
        ];
}



// Rooms

public function showRooms() {

    $bool = false;
    $vars= [];

    if(isset($_POST['delete'])) {

        $bool = true;

        $vars = $_POST['id'];    
    }

    if(isset($_POST['p_delete']))
        {
            $vars = [
                "id" => $_POST['id'],
            ];
            $this->roomsTable->delete($vars);
        }

    $rooms = $this->roomsTable->findAll();

        return [
            'template' => 'admin/rooms/room.php',
            'title' => 'Rooms',
            'heading' => "Rooms",
            'buttons' => [
                'enabled' => true,
                'addLink' => 'rooms/add',
            ],
            'variables' => [
                'rooms' => $rooms,
                'prompt' => $bool,
                'val' => $vars,
            ],
        ];
}


public function addRoom() {

    $houses = $this->housesTable->findAll();
    $tenants = $this->tenantsTable->findAll();
    
    if(isset($_POST['submit'])){
        $this->roomsTable->insert($_POST['room']);
    }

        return [
            'template' => 'admin/rooms/add-room.php',
            'title' => 'Rooms',
            'heading' => "Add Room",
            'variables' => [
                'houses' => $houses,
                'tenants' => $tenants,
            ]
        ];
}





// Tenants

public function showTenants() {

    $bool = false;
    $vars= [];

    if(isset($_POST['delete'])) {

        $bool = true;

        $vars = $_POST['id'];    
    }

    if(isset($_POST['p_delete']))
        {
            $vars = [
                "id" => $_POST['id'],
            ];
            $this->tenantsTable->delete($vars);
        }

    $tenants = $this->tenantsTable->findAll();

        return [
            'template' => 'admin/tenants/tenants.php',
            'title' => 'Tenants',
            'heading' => "Tenants",
            'buttons' => [
                'enabled' => true,
                'addLink' => 'tenants/add',
            ],
            'variables' => [
                'tenants' => $tenants,
                'prompt' => $bool,
                'val' => $vars,
            ]
        ];
}

public function addTenants() {

    $rooms = $this->roomsTable->findAll();
    
    if(isset($_POST['submit'])){
        $this->tenantsTable->insert($_POST['tenant']);
    }

    return [
        'template' => 'admin/tenants/add-tenants.php',
        'title' => 'Tenants',
        'heading' => "Add Tenants",
        'variables' => [
            'rooms' => $rooms,
        ]
    ];
}



// Rentals

public function showRentals() {

    $bool = false;
    $vars= [];
    $tenant = "";
    $room_id;

    if(isset($_POST['delete'])) {

        $bool = true;

        $vars = $_POST['id'];    

        $tenant = $_POST['tenant_id'];

    }

    if(isset($_POST['p_delete']))
        {
            $vars = [
                "id" => $_POST['id'],
            ];

            $fields = [
                'is_renting' => 0,
            ];

            $fields2 = [
                'is_occupied' => 0
            ];

            $value = $this->rentalsTable->find('rental_id', $vars['id']);
            $value = $value[0]->room_id;            



            $this->rentalsTable->delete($vars);
            $this->tenantsTable->update($_POST['tenant_id'],$fields);
            $this->roomsTable->update($value,$fields2);
            
        }



        $rentals = $this->rentalsTable->generateTenants();


        return [
            'template' => 'admin/rentals/rentals.php',
            'title' => 'Rentals',
            'heading' => "Rentals",
            'buttons' => [
                'enabled' => true,
                'addLink' => 'rentals/add',
            ],
            'variables' => [
                'rentals' => $rentals,
                'prompt' => $bool,
                'val' => $vars,
                'tenant' => $tenant
            ]
        ];
    }




    public function addRental() {

        if(isset($_POST['submit'])){

            $id = $_POST['rental']['tenant_id'];

            $fields = [
                'is_renting' => 1,
            ];

            $occupied = [
                'is_occupied' => 1,
            ];

            $this->tenantsTable->update($id,$fields);
            $this->rentalsTable->insert($_POST['rental']);
            $this->roomsTable->update($_POST['rental']['room_id'],$occupied);
            
        }


        $rooms = $this->roomsTable->find('is_occupied',0);
        $tenants = $this->tenantsTable->find('is_renting',0);
        $rentals = $this->rentalsTable->findAll();
    
            return [
                'template' => 'admin/rentals/add-rental.php',
                'title' => 'Add Rental',
                'heading' => "Add rental",
                'variables' => [
                    'rooms' => $rooms,
                    'tenants' => $tenants,
                    'rentals' => $rentals,
                ]
            ];
        }
        










}?>