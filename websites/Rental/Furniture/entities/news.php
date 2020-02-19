<?php
namespace Furniture\Entities;

class News {
    public $imagesTable;
    

public function __construct(\classes\databaseFunctions $imagesTable) {
    $this->imagesTable = $imagesTable;
}


    public function getImages() {
        return $this->imagesTable->find('newsId', $this->id);
    }



}