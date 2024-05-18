<?php


namespace App\Controllers;
include "../../vendor/autoload.php" ;
use App\Models\Caracteristiques;


class CaracteristiquesController extends BaseController{ 

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
        static::CallModel(new Caracteristiques());
        $data = static::getModel()->latest();
        static::view("../resources/views/MatreilCaracteristique/index.php", $data ); 
    }


    public static function create(){
        static::view("../resources/views/MatreilCaracteristique/create.php");
    }  

    public static function store(){
        static::CallModel(new Caracteristiques());
        $caracteristiqueName = $_POST['caracteristiqueName'];
        $is_stored = static::getModel()->store($caracteristiqueName);
        if($is_stored){
            static::withAlert('success_message' , "Données stockées avec succès !");
            header('location:index.php?page=caracteristiques&action=index');
        }else{
            static::withAlert('error_message' , "les données n'est pas enregistrées");
            header('location:index.php?page=caracteristiques&action=index');
        }
    }   

    public static function edit(){
        static::CallModel(new Caracteristiques());
        $CaracteristiqueInfo = static::getModel()->edit($_GET['CodeCar']);

        if(!$CaracteristiqueInfo){
            static::index();
        }

        $data = [ 
            'CaracteristiqueInfo' => $CaracteristiqueInfo 
        ];

        // print_r($data);
        static::view("../resources/views/MatreilCaracteristique/edit.php" , $data);
    } 


    public static function update(){
        static::callModel(new Caracteristiques());

        $CodeCar = $_POST['CodeCar'];
        $Designation = $_POST['Designation'];

        $is_updated = static::getModel()->update($CodeCar , $Designation);
        if($is_updated){
            static::withAlert('success_message' , "Les données ont été modifiées avec succès");
            header('location:index.php?page=caracteristiques&action=index');
        }else{
            static::withAlert('error_message' , "les données n'est pas modifiées");
            header('location:index.php?page=caracteristiques&action=index');
        }
    }


    public static function destroy(){
        static::CallModel(new Caracteristiques());
        $is_destroy = static::getModel()->destroy($_GET['CodeCar']);
        if($is_destroy){
            static::withAlert('success_message' , "Supprimé avec succès");
            header('location:index.php?page=caracteristiques&action=index');
        }else{
            static::withAlert('error_message' , "Vous ne pouvez pas effacer l'élément");
            header('location:index.php?page=caracteristiques&action=index');
        }
    }


}


?>
