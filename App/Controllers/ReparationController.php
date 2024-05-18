<?php


namespace App\Controllers;
include "../../vendor/autoload.php" ;
use App\Models\Marque;
use App\Models\Matreil;
use App\Models\Reforme;
use App\Models\Reparation;
use App\Models\utilisateurs;
use App\Models\EtatReparation;
use App\Models\PieceReparation;
use App\Models\MatreilCaracteristiques;



class ReparationController extends BaseController{ 

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


    public static function create(){

        static::CallModel(new utilisateurs());
        $utilisateurs = static::getModel()->latest(" WHERE RollDesignation = 'Technicien' " ) ;
        
        static::CallModel(new Matreil());
        $Matreils = static::getModel()->latest(" WHERE CodeRef IS NULL ") ;

        static::CallModel(new MatreilCaracteristiques());
        $Caracteristiques = static::getModel()->latest() ;


        static::CallModel(new EtatReparation());
        $EtatReparation = static::getModel()->latest() ;

        static::CallModel(new PieceReparation());
        $PieceReparation = static::getModel()->latest() ;
        

        $data = [ 
            "utilisateurs" => $utilisateurs ,
            'Matreils' => $Matreils ,
            'Caracteristiques' => $Caracteristiques ,
            "EtatReparation" => $EtatReparation ,
            "PieceReparation" => $PieceReparation
        ];

        static::view("../resources/views/Reparation/create.php" , $data);
    }  


    public static function store(){

        $Date = $_POST['Date'];
        $observation = $_POST['observation'];
        $tecnicien = $_POST['tecnicien'];
        $matreil = $_POST['matreil'];
        $EtatReparation = $_POST['EtatReparation'];

        static::CallModel(new Reparation());
        $id_Réaration = static::getModel()->store($Date , $observation , $tecnicien , $matreil , $EtatReparation);

        if($id_Réaration){
            static::withAlert('success_message' , "Données stockées avec succès !");
            header('location:index.php?page=reparation&action=index');
        }else{
            static::withAlert('error_message' , "les données n'a pas enregistré !!!");
            header('location:index.php?page=reparation&action=index');
        }

    }


    public static function edit(){

        static::CallModel(new Reparation());
        $ReparationInfo = static::getModel()->edit($_GET['CodeRep']);

        if(!$ReparationInfo){
            static::index();
        }


        static::CallModel(new utilisateurs());
        $utilisateurs = static::getModel()->latest(" WHERE RollDesignation = 'Technicien' " ) ;
        
        static::CallModel(new Matreil());
        $Matreils = static::getModel()->latest(" WHERE CodeRef IS NULL ") ;

        static::CallModel(new MatreilCaracteristiques());
        $Caracteristiques = static::getModel()->latest() ;


        static::CallModel(new EtatReparation());
        $EtatReparation = static::getModel()->latest() ;

        static::CallModel(new PieceReparation());
        $PieceReparation = static::getModel()->latest() ;
        

        $data = [ 
            'ReparationInfo' => $ReparationInfo ,
            "utilisateurs" => $utilisateurs ,
            'Matreils' => $Matreils ,
            'Caracteristiques' => $Caracteristiques ,
            "EtatReparation" => $EtatReparation ,
            "PieceReparation" => $PieceReparation
        ];


        static::view("../resources/views/Reparation/edit.php" , $data);
    }    


    public static function update(){

        static::callModel(new Reparation());

        $CodeRep = $_POST['CodeRep'];
        $Date = $_POST['Date'];
        $observation = $_POST['observation'];
        $tecnicien = $_POST['tecnicien'];
        $matreil = $_POST['matreil'];
        $EtatReparation = $_POST['EtatReparation'];


        $is_updated = static::getModel()->update($CodeRep , $Date , $observation ,$tecnicien ,$matreil , $EtatReparation);
        if($is_updated){
            static::withAlert('success_message' , "Données stockées avec succès !");
            header('location:index.php?page=reparation&action=index');
        }else{
            static::withAlert('error_message' , "les données n'a pas enregistré !!!");
            header('location:index.php?page=reparation&action=index');
        }
    }


    public static function destroy(){
        static::CallModel(new Reparation());
        $is_destroy = static::getModel()->destroy($_GET['CodeRep']);
        if($is_destroy){
            static::withAlert('success_message' , "Supprimé avec succès");
            header('location:index.php?page=reparation&action=index');
        }else{
            static::withAlert('error_message' , "Vous ne pouvez pas effacer l'élément");
            header('location:index.php?page=reparation&action=index');
        }
    }


}


?>
