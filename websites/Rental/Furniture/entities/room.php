<?php
namespace Furniture\Entities;

class Room {
    public $landlordsTable;

    public function __construct(\classes\databaseFunctions $landlordsTable)
    {
        $this->landlordsTable= $landlordsTable;
    }




    public function getName($id) {
        echo $id;
        $test = $this->landlordsTable->find('landlord_id', $id)[0];
        var_dump($test);
    }


}