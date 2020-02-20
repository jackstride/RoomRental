<?php
namespace Furniture\Entities;

class Admin {

    const ADD = 1;
    const EDIT = 2;
    const DELETE = 4;
    const HIDE = 8;
    const VIEW_USERS = 16;
    const EDIT_USER_ACCESS = 32;


    public function hasPermission($permission) {

        //When the function is called it will check if the URL contains any of the following then returns the correct column in the database
        if(strpos($_SERVER['REQUEST_URI'], 'category') || strpos($_SERVER['REQUEST_URI'], 'categories' ))

        {  
            return $this->c_permissions & $permission;
        }

        else if(strpos($_SERVER['REQUEST_URI'], 'furniture'))
        {   
            return $this->f_permissions & $permission;
        }

        else if(strpos($_SERVER['REQUEST_URI'], 'news'))
        {  
            return $this->n_permissions & $permission;
        }

         else
         { 
            return $this->s_permissions & $permission;
        }

    }




}