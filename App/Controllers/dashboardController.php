<?php


namespace App\Controllers;
include "../../vendor/autoload.php" ;
use App\Models\Marque;
use App\Models\Facture;
use App\Models\dashboard;



class dashboardController extends BaseController{ 

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


        static::CallModel(new dashboard());
        $MatreilCount = static::getModel()->MatreilCount();
        $CommandeCount = static::getModel()->CommandeCount();
        $FournisseurCount = static::getModel()->FournisseurCount();
        $BonLivraisonCount = static::getModel()->BonLivraisonCount();
        $UtilisateurSimpleCount = static::getModel()->UtilisateurSimpleCount();
        $UtilisateurAdminCount = static::getModel()->UtilisateurAdminCount();


        $data = [
            'MatreilCount' => $MatreilCount ,
            'CommandeCount' => $CommandeCount,
            'FournisseurCount' => $FournisseurCount,
            'BonLivraisonCount' => $BonLivraisonCount,
            'UtilisateurSimpleCount' => $UtilisateurSimpleCount,
            'UtilisateurAdminCount' => $UtilisateurAdminCount 
        ];

        // var_dump($data);

        static::view("../resources/views/Dashboard/index.php", $data ); 

    }




}


?>
