<?php

namespace App\Controllers\Api;
include "../../../vendor/autoload.php" ;

use App\Models\Matreil;
use App\Models\Reforme;
use App\Models\Decharge;
use App\Models\Inventaire;
use App\Models\MatreilADecharge;
use App\Models\MatreilAInventaire;
use App\Controllers\BaseController;
use App\Models\MatreilCaracteristiques;
header('Content-Type: application/json');

class ReformeApi extends BaseController{ 

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

        static::CallModel(new Reforme());
        $Reforme = static::getModel()->latest() ;

        static::CallModel(new Matreil());
        $Matreil = static::getModel()->latest() ;

        static::CallModel(new MatreilCaracteristiques());
        $caracteristique = static::getModel()->latest() ;

        $data = [
            'data' => $Reforme  , 
            'Matreil' => $Matreil ,
            'caracteristique' => $caracteristique
        ];


        echo json_encode($data);
    }

}

ReformeApi::index();
