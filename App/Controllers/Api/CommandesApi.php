<?php
namespace App\Controllers\Api;
include "../../../vendor/autoload.php" ;


use App\Models\commandes;
use App\Controllers\BaseController;

header('Content-Type: application/json');

class CommandesApi extends BaseController{ 

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
        static::CallModel(new commandes());
        $data = static::getModel()->latest();
        echo json_encode($data);
    }

}

CommandesApi::index();