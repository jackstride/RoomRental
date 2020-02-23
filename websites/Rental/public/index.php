<?php

// Autoloads classes with namespaces, difines routes
require '../autoload.php';

$routes = new \Rental\Routes();

$entryPoint = new \classes\EntryPoint($routes);

$entryPoint->run();


?>
