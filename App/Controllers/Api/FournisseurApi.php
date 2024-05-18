<?php

namespace App\Controllers\Api;
include "../../../vendor/autoload.php" ;
use App\Models\Fournisseurs;
use App\Controllers\BaseController;
use App\Models\MatreilCaracteristiques;
header('Content-Type: application/json');

class FournisseurApi extends BaseController{ 

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
        static::CallModel(new Fournisseurs());
        $Fournisseurs = static::getModel()->latest() ;


        $data = [
            'data' => $Fournisseurs
        ] ;
        echo json_encode($data);
    }

}

FournisseurApi::index();
