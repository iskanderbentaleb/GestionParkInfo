<?php


namespace App\Controllers;
include "../../vendor/autoload.php" ;
use App\Models\Marque;
use App\Models\Facture;



class FactureController extends BaseController{ 

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
        static::CallModel(new Facture());
        $data = static::getModel()->latest();
        static::view("../resources/views/Factures/index.php", $data ); 
    }


    public static function create(){
        static::view("../resources/views/Factures/create.php");
    }  

    public static function store(){
        static::CallModel(new Facture());


        $CodeFact = $_POST['CodeFact'];
        $Date = $_POST['Date'];

        $is_stored = static::getModel()->store($CodeFact , $Date);
        if($is_stored){
            static::withAlert('success_message' , "Données stockées avec succès !");
            header('location:index.php?page=factures&action=index');
        }else{
            static::withAlert('error_message' , "les données n'est pas enregistrées");
            header('location:index.php?page=factures&action=index');
        }
    }   

    public static function edit(){
        static::CallModel(new Facture());
        $FactureInfo = static::getModel()->edit($_GET['CodeFact']);

        if(!$FactureInfo){
            static::index();
        }

        $data = [ 
            'FactureInfo' => $FactureInfo 
        ];

        // print_r($data);
        static::view("../resources/views/Factures/edit.php" , $data);
    }    


    public static function update(){
        static::callModel(new Facture());

        $oldCodeFact = $_POST['oldCodeFact'];
        $CodeFact = $_POST['CodeFact'];
        $Date = $_POST['Date'];

        $is_updated = static::getModel()->update($oldCodeFact ,$CodeFact , $Date);
        if($is_updated){
            static::withAlert('success_message' , "Les données ont été modifiées avec succès");
            header('location:index.php?page=factures&action=index');
        }else{
            static::withAlert('error_message' , "les données n'est pas modifiées ");
            header('location:index.php?page=factures&action=index');
        }
    }


    public static function destroy(){
        static::CallModel(new Facture());
        $is_destroy = static::getModel()->destroy($_GET['CodeFact']);
        if($is_destroy){
            static::withAlert('success_message' , "Supprimé avec succès");
            header('location:index.php?page=factures&action=index');
        }else{
            static::withAlert('error_message' , "Vous ne pouvez pas effacer l'élément");
            header('location:index.php?page=factures&action=index');
        }
    }


}


?>
