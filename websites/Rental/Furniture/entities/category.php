<?php
namespace Furniture\Entities;

class Category {
    public $furnitureTable;
    public $id;
    public $name;
    public $description;
    public $price;
    public $categoryId;
    public $hide;
    public $quality;
    

    public function __construct(\classes\databaseFunctions $furnitureTable)
    {
        $this->furnitureTable = $furnitureTable;
    }

    public function getCatgeoryName()
    {
        return $this->furnitureTable->find('id', $this->categoryId)[0];
    }

    public function getFurn()
    {
        return $this->furniture = $this->furnitureTable->find('categoryId', $this->id);

    }

}