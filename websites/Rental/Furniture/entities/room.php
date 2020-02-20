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
        $test =  $this->landlordsTable->find('name', $id);
        var_dump($test);
    }


}