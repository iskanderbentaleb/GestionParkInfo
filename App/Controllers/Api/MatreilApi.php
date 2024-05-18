<?php


namespace App\Controllers\Api;
include "../../../vendor/autoload.php" ;
use App\Models\Matreil;
use App\Models\Reforme;
use App\Models\Decharge;
use App\Models\Reparation;
use App\Models\PieceReparation;
use App\Models\MatreilADecharge;
use App\Controllers\BaseController;
use App\Models\MatreilCaracteristiques;
header('Content-Type: application/json');

class MatreilApi extends BaseController{ 

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


        static::CallModel(new Matreil());
        $matreil = static::getModel()->latest() ;


        static::CallModel(new MatreilCaracteristiques());
        $caracteristique = static::getModel()->latest() ;


        static::CallModel(new Reforme());
        $reforms = static::getModel()->latest() ;


        static::CallModel(new Reparation());
        $Reparations = static::getModel()->latest("DESC") ;

        static::CallModel(new MatreilADecharge());
        $Decharges = static::getModel()->latest() ;

        static::CallModel(new PieceReparation());
        $PieceReparation = static::getModel()->latest() ;


        $data = [
            'data' => $matreil ,
            'caracteristiques' => $caracteristique,
            'reforms' => $reforms ,
            'Reparations' => $Reparations ,
            'Decharges' => $Decharges ,
            'PeaceReparation' => $PieceReparation 
        ] ;


        echo json_encode($data);
    }

}

MatreilApi::index();
