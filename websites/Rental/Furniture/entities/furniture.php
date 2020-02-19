<?php
namespace Furniture\Entities;

class Furniture {
    public $categoryTable;
    public $id;
    public $name;
    public $imagesTable;
    public $productId;
    public $source;
    

    public function __construct(\classes\databaseFunctions $categoryTable,\classes\databaseFunctions $imagesTable)
    {
        $this->categoryTable = $categoryTable;
        $this->imagesTable = $imagesTable;
    }

    public function getCatgeoryName()
    {
        return $this->categoryTable->find('id', $this->categoryId)[0];
    }

    public function getImages()
    {
            return $this->imagesTable->find('productId', $this->id);    
    }

}