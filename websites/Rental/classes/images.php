<?php
namespace classes;

class Images
{   
    private $furnitureTable;
    private $imagesTable;
    private $newsTable;
    
    public function __construct($furnitureTable, $imagesTable, $newsTable){

        $this->furnitureTable = $furnitureTable;
        $this->imagesTable = $imagesTable;
        $this->newsTable = $newsTable;

    }

    public function validateImages()
    {

        if(!empty($_FILES['files']['name'][0]))
        {
            $countfiles = count($_FILES['files']['name']);
            for($i=0; $i<$countfiles; $i++)
            {
                $filename = $_FILES['files']['name'][$i];
                $tmp = explode(".", $filename);
                $ext = end($tmp);            
                $valid_ext = array("png", "jpeg", "jpg");

                if(!in_array($ext,$valid_ext)) {
                        $errors = "This file extension is not allowed. Please either use PNG's JPEG's or JPG's";   
                        return $errors;         
                }  
            }
        }
    }

    
    
    //Upload Image function, compares the fill name to an array of allowed file extensions
    public function uploadImages ($tableColumn = null, $MaxTable)
    {
        if(!empty($_FILES['files']['name'][0]))
        {
            $countfiles = count($_FILES['files']['name']);
            for($i=0; $i<$countfiles; $i++)
            {
                $filename = $_FILES['files']['name'][$i];
                $tmp = explode(".", $filename);
                $ext = end($tmp);            
                $valid_ext = array("png", "jpeg", "jpg");

                if(in_array($ext,$valid_ext))
                {
                    move_uploaded_file($_FILES['files']['tmp_name'][$i], '../public/images/furniture/' . $filename);

                    $id = $this->$MaxTable->maxID();

                    $test2 = [
                    $tableColumn => $id,
                    'source' => $filename,
                    ];

                        if(strpos($_SERVER['REQUEST_URI'], 'edit-news'))
                        {
                            $test2 = [
                            'newsId' => $_GET['id'],
                            'source' => $filename,
                                ];
                            $this->imagesTable->insert($test2);
                        } 
                        else if(strpos($_SERVER['REQUEST_URI'], 'edit-furniture'))
                        {
                            $test2 = [
                                'productId' => $_GET['id'],
                                'source' => $filename,
                                ];
                            $this->imagesTable->insert($test2);
                            
                        } 
                        else {
                            $this->imagesTable->insert($test2);             

                        }
                    } 
                    else
                        {    
                             $errors = "This file extension is not allowed. Please either use PNG's JPEG's or JPG's";   
                             return $errors;
                            
                        }
                    }
            }
        } 
    

   






}