<?php


namespace App\Controllers;
include "../../vendor/autoload.php" ;
use App\Models\Piece;
use App\Models\Marque;
use App\Models\Matreil;
use App\Models\Reforme;
use App\Models\PieceReparation;
use App\Models\MatreilCaracteristiques;



class PieceaReparationController extends BaseController{ 

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
        static::view("../resources/views/Reparation/index.php"); 
    }


    public static function edit(){

        static::CallModel(new Piece());
        $Piece = static::getModel()->latest();


        static::CallModel(new PieceReparation());
        $condition = " WHERE CodeReparation = '" . $_GET['CodeRep'] . "'";
        $PieceReparationSelected = static::getModel()->latest($condition);        

        $data = [ 
            'Piece' => $Piece  ,
            'PieceReparationSelected' => $PieceReparationSelected
        ];
        // var_dump($PieceReparationSelected);

        static::view("../resources/views/PieceaReparation/edit.php" , $data);
    }    


    public static function update(){


        static::callModel(new PieceReparation());

        $CodeRep = $_POST['CodeRep'];

        $is_deleted = static::getModel()->destroy($CodeRep);



        if($is_deleted){
                if (isset($_POST["quantity"]) && is_array($_POST["quantity"])) {
                    static::CallModel(new PieceReparation());
                    foreach ($_POST["quantity"] as $pieceCode => $quantity) {
                        echo "Piece Code: " . $pieceCode . ", Quantity: " . $quantity . "<br>";
                        static::getModel()->store($pieceCode , $CodeRep , $quantity);
                    }
                }
                static::withAlert('success_message' , "Données stockées avec succès !");
                header('location:index.php?page=reparation&action=index');
            }else{
                static::withAlert('error_message' , "les données n'a pas enregistré !!!");
                header('location:index.php?page=reparation&action=index');
            }

    }


}


?>
