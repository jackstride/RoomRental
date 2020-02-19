<?php
namespace classes;




class EntryPoint {    
    private $routes;
    public function __construct($routes){
        $this->routes = $routes;
    }

    public function run() {
    $route = strtolower(ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/'));
    $routes = $this->routes->getRoutes();
    $method = $_SERVER['REQUEST_METHOD'];

    // If Statments provided by Tom Butler & Kevin Yank from the book PHP & MYSQL: Novice to Ninja
    //Checks preformed to see if user is logged in and has authentication
    if (isset($routes[$route]['login']) && !$this->routes->getAuthentication()->isLoggedIn())
    {
       header('location: error');
   }
   // Checks to see if permission has been set and if the user has permission
   else if (isset($routes[$route]['permissions']) && !$this->routes->checkPermission($routes[$route]['permissions'])) 
    {
       header('location: error');
       exit();
   }


    $controller = $routes[$route][$method]['controller'];
    $functionName = $routes[$route][$method]['function'];
    $page = $controller->$functionName();
    
    //Below sets the class name to either a $page variable, if one's not set then 'home' is chosen 
    $class = $page['class'] ?? 'home';
    $heading = $page['heading'];
    $buttons = $page['buttons'];
    
    $output = $this->loadTemplate('../templates/' . $page['template'], $page['variables']);
    
    $title = $page['title'];
    require '../templates/layout.html.php';
}

//Load template funciton defined by controller
function loadTemplate($fileName, $templateVars) {
    extract($templateVars);
    ob_start();
    require $fileName;
    $content = ob_get_clean();
    return $content;
    }


}