<?php


namespace App\Controllers;
include "../../vendor/autoload.php" ;
use App\Models\Marque;
use App\Models\Matreil;
use App\Models\MatreilType;
use App\Models\Fournisseurs;
use App\Models\Caracteristiques;
use App\Models\MatreilCaracteristiques;


class FournisseursController extends BaseController{ 

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
        $data = static::getModel()->latest("DESC");
        static::view("../resources/views/Foursnisseur/index.php", $data ); 
    }


    public static function create(){
        static::view("../resources/views/Foursnisseur/create.php");
    }  



    public static function store(){
        static::CallModel(new Fournisseurs());

        $Nom = $_POST['Nom'];
        $Prenom = $_POST['Prenom'];
        $Email = $_POST['Email'];
        $Tel = $_POST['Tel'];
        $Address = $_POST['Address'];

        $is_stored = static::getModel()->store($Nom , $Prenom , $Email , $Tel , $Address);
        if($is_stored){
            static::withAlert('success_message' , "Données stockées avec succès !");
            header('location:index.php?page=fournisseurs&action=index');
        }else{
            static::withAlert('error_message' , "les données n'est pas enregistrées");
            header('location:index.php?page=fournisseurs&action=index');
        }
    }   


    public static function edit(){
        static::CallModel(new Fournisseurs());
        $FournisseurInfo = static::getModel()->edit($_GET['CodeFour']);

        if(!$FournisseurInfo){
            static::index();
        }

        $data = [ 
            'FournisseurInfo' => $FournisseurInfo ,
        ];

        // print_r($data);
        static::view("../resources/views/Foursnisseur/edit.php" , $data);
    }    


    public static function update(){
        static::callModel(new Fournisseurs());

        $CodeFour = $_POST['CodeFour'];
        $Nom = $_POST['Nom']; 
        $Prenom = $_POST['Prenom'];
        $Email = $_POST['Email'];
        $Tel = $_POST['Tel'];
        $Address = $_POST['Address'];

        $is_updated = static::getModel()->update($CodeFour , $Nom , $Prenom , $Email , $Tel , $Address);
        if($is_updated){
            static::withAlert('success_message' , "Les données ont été modifiées avec succès");
            header('location:index.php?page=fournisseurs&action=index');
        }else{
            static::withAlert('error_message' , "les données n'est pas modifiées");
            header('location:index.php?page=fournisseurs&action=index');
        }
    }


    public static function destroy(){
        static::CallModel(new Fournisseurs());
        $is_destroy = static::getModel()->destroy($_GET['CodeFour']);
        if($is_destroy){
            static::withAlert('success_message' , "Supprimé avec succès");
            header('location:index.php?page=fournisseurs&action=index');
        }else{
            static::withAlert('error_message' , "Vous ne pouvez pas effacer l'élément");
            header('location:index.php?page=fournisseurs&action=index');
        }
    }


}


?>
