<?php

namespace App\routes;


class Route {
    public static function resource($controllerMapping) {
        
        if(isset($_GET["page"]) && isset($controllerMapping[$_GET["page"]])){
            $controllerClass = $controllerMapping[$_GET["page"]];
            if(class_exists($controllerClass)) {
                $controller = new $controllerClass();
                if(isset($_GET["action"]) && method_exists($controller, $_GET["action"])) {
                    $action = $_GET["action"];
                    $controller->$action();
                    return;
                }else{
                // Redirect to login page or handle unauthorized access 404 page
                header('location:404.php');
                }
            }
        }else{
            header('location:404.php');
        }
        
    } 
}

