<?php
namespace Furniture\Entities;

class Room {
    public $landlordsTable;
    public $rentalsTable;
    public $roomsTable;


    public function __construct(\classes\databaseFunctions $landlordsTable,\classes\databaseFunctions $rentalsTable, \classes\databaseFunctions $roomsTable)
    {
        $this->landlordsTable = $landlordsTable;
        $this->rentalsTable = $rentalsTable;
        $this->roomsTable = $roomsTable;
    }




    public function getName($id) {        
        $test = $this->landlordsTable->find('landlord_id', $id);
        return $test[0]->first_name . " " . $test[0]->last_name;
    }


    public function getRoomNumber($id){
        $roomId;
        $rentalId = $this->rentalsTable->find('tenant_id',$id);

        if(empty($rentalId)){
            $roomId = "Not Occupying Room";
        } else {
            $roomId = $rentalId[0]->room_id;
            $arr = $this->roomsTable->find('room_id',$roomId);
            $roomId = $arr[0]->room_id;
        }
        return $roomId;
    }








}