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
    if(isset($_POST['delete'])) {

        $vars = [
            'id' => $_POST['id']
        ];
        $this->landlordsTable->delete($vars);
    }
    
    $landlords = $this->landlordsTable->findAll();

    return [
        "template" => 'admin/landlords.php',
        "title" => "landlords",
        'class' => "test",
        'heading' => "Landlords",
        'buttons' => [
            'enabled' => true,
            'addLink' => 'landlords/add',
        ],
        'variables' => [
            'landlords' => $landlords,
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
            ]
        ];
}

public function addHouse() {

    if(isset($_POST['submit'])){
        $this->housesTable->insert($_POST['house']);
    }

    return [
            'template' => 'admin/hmo/add-hmo.php',
            'title' => 'Houses',
            'heading' => "Add HMO",
            'variables' => [
            ]
        ];
}



// Rooms

public function showRooms() {

    $rooms = $this->roomsTable->findAll();

        return [
            'template' => 'admin/rooms/rooms.php',
            'title' => 'Rooms',
            'heading' => "Rooms",
            'buttons' => [
                'enabled' => true,
                'addLink' => 'rooms/add',
            ],
            'variables' => [
                'rooms' => $rooms,
            ]
        ];
}





// Tenants

public function showTenants() {

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
            ]
        ];
}





// Rentals

public function showRentals() {

    $rentals = $this->rentalsTable->findAll();

        return [
            'template' => 'admin/rentals/rentals.php',
            'title' => 'Houses',
            'heading' => "Houses of Multiple Occupancy",
            'buttons' => [
                'enabled' => true,
                'addLink' => 'rentals/add',
            ],
            'variables' => [
                'rentals' => $rentals,
            ]
        ];
}






}?>