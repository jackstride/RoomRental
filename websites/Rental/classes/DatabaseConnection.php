<?php
//Database connection with Error's turned on.
$server = 'v.je';
$username = 'v.je';
$pass = 'v.je';

try{
$schema = 'furniture';
$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $pass,[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch(PDOException $e) {
  echo "'Connection Failed'";
}
 ?>
