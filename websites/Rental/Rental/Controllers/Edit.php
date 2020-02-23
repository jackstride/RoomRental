<?php


namespace Rental\Controllers;

class Edit {
    
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


    //Landlord
    public function editLandlord () {
        if(isset($_POST['Submit'])) {
            $this->landlordsTable->update($_POST['id'],$_POST['landlord']);
            header('Location: /admin/landlords');
        }
        else {

            $id= $_GET['id'];

            $landlords = $this->landlordsTable->find('landlord_id', $id);

            return [
                'template' => 'admin/landlords/edit-landlord.php',
                'title' => 'Edit',
                'heading' => "Edit Landlord",
                'variables' => [
                    'landlords' => $landlords,
                    'id' => $id
                ]
            ];
        }    
    }

    //House
    public function editHouse () {
        if(isset($_POST['Submit'])) {
            $this->housesTable->update($_POST['id'],$_POST['house']);
            header('Location: /admin/houses');
        }

        else {
            $id= $_GET['id'];

            $houses = $this->housesTable->find('house_id', $id);
            $landlords = $this->landlordsTable->findAll();

            return [
                'template' => 'admin/hmo/edit-house.php',
                'title' => 'Edit House',
                'heading' => "Edit House",
                'variables' => [
                    'houses' => $houses,
                    'landlords' => $landlords,
                    'id' => $id
                ]
            ];
        }    
    }




    //Room
    public function editRoom () {
        if(isset($_POST['Submit'])) {
            $this->roomsTable->update($_POST['id'],$_POST['room']);
            header('Location: /admin/rooms');
            // var_dump($_POST['room']);
        }
        else {

            $id= $_GET['id'];

            $rooms = $this->roomsTable->find('room_id', $id);
            $houses = $this->housesTable->findAll();

            return [
                'template' => 'admin/rooms/edit-room.php',
                'title' => 'Edit',
                'heading' => "Edit Room",
                'variables' => [
                    'rooms' => $rooms,
                    'houses' => $houses,
                    'id' => $id
                ]
            ];
        }    
    }



    //Tenant
    public function editTenant () {
        if(isset($_POST['Submit'])) {
            $this->tenantsTable->update($_POST['id'],$_POST['tenant']);
            header('Location: /admin/tenants');
        }
        else {

            $id= $_GET['id'];

            $tenants = $this->tenantsTable->find('tenant_id', $id);

            return [
                'template' => 'admin/tenants/edit-tenant.php',
                'title' => 'Edit',
                'heading' => "Edit Landlord",
                'variables' => [
                    'tenants' => $tenants,
                    'id' => $id
                ]
            ];
        }    
    }

    //Rental
    public function editRental () {



        if(isset($_POST['Submit'])) {

        // Set tenant
        $old = $this->rentalsTable->find('rental_id', $_POST['id']);

        $oldTenant = $old[0]->tenant_id;
        $oldRoom = $old[0]->room_id;
        $newTenant = $_POST['rental']['tenant_id'];
        $newRoom = $_POST['rental']['room_id'];


        if($oldTenant != $newTenant) {
            $this->setRenting($oldTenant,0);
            $this->setRenting($newTenant,1);
        }

        if($oldRoom != $newRoom) {
            $this->setRoomOcc($oldRoom,0);
            $this->setRoomOcc($newRoom,1);
        }


            $this->rentalsTable->update($_POST['id'],$_POST['rental']);

            header('Location: /admin/rentals');
        }

        else {

            $id= $_GET['id'];
            $rentals = $this->rentalsTable->find('rental_id', $id);
            $tenants = $this->tenantsTable->findAll();
            $rooms = $this->roomsTable->findAll();

            return [
                'template' => 'admin/rentals/edit-rental.php',
                'title' => 'Edit',
                'heading' => "Edit Rental",
                'variables' => [
                    'rentals' => $rentals,
                    'tenants' => $tenants,
                    'rooms' => $rooms,
                    'id' => $id
                ]
            ];
        }    
    }


    public function setRenting($id,$val) {
        $fields = [
            'is_renting' => $val,
        ];
        $this->tenantsTable->update($id,$fields);
    }
    
    public function setRoomOcc($value,$val) {
        $fields = [
            'is_occupied' => $val,
        ];
    
        $this->roomsTable->update($value,$fields);
    }




}







// Helper functions

