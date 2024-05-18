<?php

namespace App\Controllers;
include "../../vendor/autoload.php" ;
use App\Models\Marque;



class LogoutController extends BaseController{ 

    // the is for using the class 
    public static function CallModel($ClassName){
        if(is_null(BaseController::$model) or BaseController::$model !== $ClassName ){
            return 
            static::setModel(
                $ClassName
            ); 
            // this is for put class (Model Matreil for eexample) 
            //in the setModel() function and it can change
        }
    }
    // the is for using the class 

    public static function index(){
        static::view("../resources/views/Functions/logout.php"); 
    }


}


?>
