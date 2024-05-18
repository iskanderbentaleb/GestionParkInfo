<?php


namespace App\Controllers;
include "../../vendor/autoload.php" ;
use App\Models\Marque;



class MarqueController extends BaseController{ 

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
        static::CallModel(new Marque());
        $data = static::getModel()->latest();
        static::view("../resources/views/Marque/index.php", $data ); 
    }


    public static function create(){
        static::view("../resources/views/Marque/create.php");
    }  

    public static function store(){
        static::CallModel(new Marque());
        $marqueName = $_POST['marqueName'];
        $is_stored = static::getModel()->store($marqueName);
        if($is_stored){
            static::withAlert('success_message' , "Données stockées avec succès !");
            header('location:index.php?page=marque&action=index');
        }else{
            static::withAlert('error_message' , "les données n'est pas stockées !!!");
            header('location:index.php?page=marque&action=index');
        }
    }   

    public static function edit(){
        static::CallModel(new Marque());
        $MarqueInfo = static::getModel()->edit($_GET['CodeMrq']);

        if(!$MarqueInfo){
            static::index();
        }

        $data = [ 
            'MarqueInfo' => $MarqueInfo 
        ];

        // print_r($data);
        static::view("../resources/views/Marque/edit.php" , $data);
    }    


    public static function update(){
        static::callModel(new Marque());

        $CodeMarque = $_POST['CodeMarque'];
        $Designation = $_POST['Designation'];

        $is_updated = static::getModel()->update($CodeMarque , $Designation);
        if($is_updated){
            static::withAlert('success_message' , "Les données ont été modifiées avec succès");
            header('location:index.php?page=marque&action=index');
        }else{
            static::withAlert('error_message' , "les données n'est pas modifiées !!!");
            header('location:index.php?page=marque&action=index');
        }
    }


    public static function destroy(){
        static::CallModel(new Marque());
        $is_destroy = static::getModel()->destroy($_GET['CodeMrq']);
        if($is_destroy){
            static::withAlert('success_message' , "Supprimé avec succès");
            header('location:index.php?page=marque&action=index');
        }else{
            static::withAlert('error_message' , "Vous ne pouvez pas effacer l'élément");
            header('location:index.php?page=marque&action=index');
        }
    }


}


?>
