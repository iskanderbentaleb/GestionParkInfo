<?php
namespace App\Controllers\Api;
include "../../../vendor/autoload.php" ;

use App\Models\Decharge;
use App\Models\utilisateurs;
use App\Models\MatreilADecharge;
use App\Controllers\BaseController;
use App\Models\MatreilCaracteristiques;

header('Content-Type: application/json');

class UtilisateurApi extends BaseController{ 

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

        static::CallModel(new utilisateurs());
        $user = static::getModel()->latest(); 

        static::CallModel(new Decharge());
        $Decharges = static::getModel()->latest(); 

        // var_dump($Decharges);
        
        static::CallModel(new MatreilADecharge());
        $MatreilADecharge = static::getModel()->latest(); 

        static::CallModel(new MatreilCaracteristiques());
        $caracteristique = static::getModel()->latest() ;

        $data = [
            'data' => $user  ,
            'Decharges' => $Decharges ,
            'MatreilADecharge' => $MatreilADecharge , 
            'caracteristique' => $caracteristique 
        ];


        echo json_encode($data);

    }

}

UtilisateurApi::index();
