<?php
namespace Furniture\Entities;

class Room {
    public $landlordsTable;

    public function __construct(\classes\databaseFunctions $landlordsTable)
    {
        $this->landlordsTable= $landlordsTable;
    }




    public function getName($id) {        
        $test = $this->landlordsTable->find('landlord_id', $id);
        return $test[0]->first_name . " " . $test[0]->last_name;
    }


}