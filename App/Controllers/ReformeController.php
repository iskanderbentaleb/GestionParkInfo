<?php


namespace App\Controllers;
include "../../vendor/autoload.php" ;
use App\Models\Marque;
use App\Models\Reforme;
use App\Models\Matreil;
use App\Models\MatreilCaracteristiques;



class ReformeController extends BaseController{ 

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
        static::view("../resources/views/Reforme/index.php"); 
    }


    public static function create(){
        static::CallModel(new Matreil());
        $Matreils = static::getModel()->latest(" WHERE CodeRef IS NULL ") ;

        static::CallModel(new MatreilCaracteristiques());
        $Caracteristiques = static::getModel()->latest() ;


        $data = [ 
            'Matreils' => $Matreils ,
            'Caracteristiques' => $Caracteristiques
        ];

        static::view("../resources/views/Reforme/create.php" , $data);
    }  


    public static function store(){

        $Date = $_POST['Date'];

        static::CallModel(new Reforme());
        $id_Reforme = static::getModel()->store($Date);

        if($id_Reforme){
            if(isset($_POST['matreils']) && !empty($_POST['matreils'])) {
                static::CallModel(new Matreil());
                $matreils = $_POST['matreils'];
                foreach($matreils as $matreil_ssh) {
                    static::getModel()->updateReforme($matreil_ssh ,$id_Reforme);
                }
            }
            static::withAlert('success_message' , "Données stockées avec succès !");
            header('location:index.php?page=reforme&action=index');
        }else{
            static::withAlert('error_message' , "les données n'a pas enregistré !!!");
            header('location:index.php?page=reforme&action=index');
        }

    }


    public static function edit(){

        static::CallModel(new Reforme());
        $ReformeInfo = static::getModel()->edit($_GET['CodeRef']);

        if(!$ReformeInfo){
            static::index();
        }

        static::CallModel(new Matreil());
        $Matreils = static::getModel()->latest("WHERE CodeRef IS NULL OR CodeRef = " .  $_GET['CodeRef']) ;

        static::CallModel(new MatreilCaracteristiques());
        $Caracteristiques = static::getModel()->latest() ;


        $data = [ 
            'ReformeInfo' => $ReformeInfo ,
            'Matreils' => $Matreils ,
            'Caracteristiques' => $Caracteristiques 
        ];

        static::view("../resources/views/Reforme/edit.php" , $data);
    }    


    public static function update(){
        static::callModel(new Reforme());

        $CodeRef = $_POST['CodeRef'];
        $Date = $_POST['Date'];

        $is_updated = static::getModel()->update($CodeRef , $Date);
        if($is_updated){

            static::CallModel(new Matreil());
            static::getModel()->ResetMatreilCodeRef($CodeRef);

            if($is_updated){
                if(isset($_POST['matreils']) && !empty($_POST['matreils'])) {
                    static::CallModel(new Matreil());
                    $matreils = $_POST['matreils'];
                    foreach($matreils as $matreil_ssh) {
                        static::getModel()->updateReforme($matreil_ssh ,$CodeRef);
                    }
                }
                static::withAlert('success_message' , "Données stockées avec succès !");
                header('location:index.php?page=reforme&action=index');
            }else{
                static::withAlert('error_message' , "les données n'a pas enregistré !!!");
                header('location:index.php?page=reforme&action=index');
            }

        }
    }


    public static function destroy(){
        static::CallModel(new Reforme());
        $is_destroy = static::getModel()->destroy($_GET['CodeRef']);
        if($is_destroy){
            static::withAlert('success_message' , "Supprimé avec succès");
            header('location:index.php?page=reforme&action=index');
        }else{
            static::withAlert('error_message' , "Vous ne pouvez pas effacer l'élément");
            header('location:index.php?page=reforme&action=index');
        }
    }


}


?>
