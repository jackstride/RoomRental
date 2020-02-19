<?php
namespace classes;

class Authentication
{
    private $users;
    private $usernameColumn;
    private $passwordColumn;

    public function __construct(databaseFunctions $users, string $usernameColumn, string $passwordColumn)
    {
        //Running session_start() will cause conflicts when running tests // Comment out when running tests.
        session_start();
        $this->users = $users;
        $this->usernameColumn = $usernameColumn;
        $this->passwordColumn = $passwordColumn;
    }
    //Function for user logging in
    public function login($username, $password)
    {
        $user = $this->users->find($this->usernameColumn,strtolower($username));

        if (!empty($user) && password_verify($password, $user{0}->{$this->passwordColumn})) 
        {
            
            session_regenerate_id();
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $user{0}->{$this->passwordColumn};
            return true;
        } 
        else 
        {
            return false;
        }
    }

    // Checks whether the user is logged in
    public function isLoggedIn()
    {
        if (empty($_SESSION['username'])) {
            header('Location: error');
        }
        $user = $this->users->find($this->usernameColumn, strtolower($_SESSION['username']));
        if (!empty($user) && $user[0]->{$this->passwordColumn} === $_SESSION['password']) {
            return true;
            header('Location: admin');
        }
        return false;
    }

    // Will return the user row inside database.
    public function getUser() {
        if($this->isLoggedIn()){
            return $this->users->find($this->usernameColumn, strtolower($_SESSION['username']))[0];
        }
        else {
            return false;
        }
    }






}