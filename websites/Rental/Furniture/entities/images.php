<?php
namespace Furniture\Entities;

class Images {
    public $furnitureTable;
    

public function __construct(\classes\databaseFunctions $furnitureTable)
{
    $this->categoryTable = $categoryTable;
}

    public function getLastId()
    {
        return $this->furnitureTable->maxid();
}

}