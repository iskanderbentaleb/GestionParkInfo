<?php


namespace App\Controllers;
include "../../vendor/autoload.php" ;
use App\Models\MatreilType;


class MatreilTypeController extends BaseController{ 

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
        static::CallModel(new MatreilType());
        $data = static::getModel()->latest();
        static::view("../resources/views/MatreilType/index.php", $data ); 
    }


    public static function create(){
        static::view("../resources/views/MatreilType/create.php");
    }  

    public static function store(){
        static::CallModel(new MatreilType());
        $TypeName = $_POST['TypeName'];
        $is_stored = static::getModel()->store($TypeName);
        if($is_stored){
            static::withAlert('success_message' , "Données stockées avec succès !");
            header('location:index.php?page=matreiltype&action=index');
        }else{
            static::withAlert('error_message' , "les données n'est pas enregistrées");
            header('location:index.php?page=matreiltype&action=index');
        }
    }   

    public static function edit(){
        static::CallModel(new MatreilType());
        $MatreilTypeInfo = static::getModel()->edit($_GET['CodeType']);

        if(!$MatreilTypeInfo){
            static::index();
        }

        $data = [ 
            'MatreiltypeInfo' => $MatreilTypeInfo 
        ];

        // print_r($data);
        static::view("../resources/views/MatreilType/edit.php" , $data);
    }    


    public static function update(){
        static::callModel(new MatreilType());

        $CodeType = $_POST['CodeType'];
        $TypeName = $_POST['TypeName'];

        $is_updated = static::getModel()->update($CodeType , $TypeName);
        if($is_updated){
            static::withAlert('success_message' , "Les données ont été modifiées avec succès");
            header('location:index.php?page=matreiltype&action=index');
        }else{
            static::withAlert('error_message' , "les données n'est pas modifiées");
            header('location:index.php?page=matreiltype&action=index');
        }
    }


    public static function destroy(){
        static::CallModel(new MatreilType());
        $is_destroy = static::getModel()->destroy($_GET['CodeType']);
        if($is_destroy){
            static::withAlert('success_message' , "Supprimé avec succès");
            header('location:index.php?page=matreiltype&action=index');
        }else{
            static::withAlert('error_message' , "Vous ne pouvez pas effacer l'élément");
            header('location:index.php?page=matreiltype&action=index');
        }
    }


}


?>
