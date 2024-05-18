<?php


namespace App\Controllers;
include "../../vendor/autoload.php" ;

use App\Models\Facture;
use App\Models\commandes;
use App\Models\BonLivraison;
use App\Models\EtatBonLivraison;



class BonLivraisonController extends BaseController{ 

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
        static::CallModel(new BonLivraison());
        $data = static::getModel()->latest();
        static::view("../resources/views/BonLivraison/index.php", $data ); 
    }


    public static function create(){

        static::CallModel(new commandes());
        $commandes = static::getModel()->latest();

        static::CallModel(new Facture());
        $Facture = static::getModel()->latest();

        static::CallModel(new EtatBonLivraison());
        $Etat = static::getModel()->latest();

        $data = [
        "commandes" => $commandes , 
        "Facture" => $Facture , 
        "Etat" => $Etat 
        ];


        static::view("../resources/views/BonLivraison/create.php" , $data );
    }  


    public static function store(){
        static::CallModel(new BonLivraison());

        $CodeBL = $_POST['CodeBL'];
        $Date = $_POST['Date'];
        $CodeCommande = $_POST['CodeCommande'];
        $CodeFacteur = $_POST['CodeFacteur']; 
        $CodeEtat = $_POST['CodeEtat'];

        $is_stored = static::getModel()->store($CodeBL , $Date , $CodeCommande , $CodeFacteur , $CodeEtat);
        if($is_stored){
            static::withAlert('success_message' , "Données stockées avec succès !");
            header('location:index.php?page=BonLivraison&action=index');
        }else{
            static::withAlert('error_message' , "les données n'est pas enregistrées");
            header('location:index.php?page=BonLivraison&action=index');
        }
    }   


    public static function edit(){

        static::CallModel(new BonLivraison());
        $BonLivraisonInfo = static::getModel()->edit($_GET['CodeBL']);

        if(!$BonLivraisonInfo){
            static::index();
        }

        static::CallModel(new commandes());
        $commandes = static::getModel()->latest();

        static::CallModel(new Facture());
        $Facture = static::getModel()->latest();

        static::CallModel(new EtatBonLivraison());
        $Etat = static::getModel()->latest();
        

        $data = [ 
            'BonLivraisonInfo' => $BonLivraisonInfo , 
            "commandes" => $commandes , 
            "Facture" => $Facture , 
            "Etat" => $Etat 
        ];

        // print_r($data);
        static::view("../resources/views/BonLivraison/edit.php" , $data);
    }    


    public static function update(){
        static::callModel(new BonLivraison());

        $oldCodeBL = $_POST['oldCodeBL'];
        $CodeBL = $_POST['CodeBL'];
        $Date = $_POST['Date'];
        $CodeCommande = $_POST['CodeCommande'];
        $CodeFacteur = $_POST['CodeFacteur'];
        $CodeEtat = $_POST['CodeEtat'];

        $is_updated = static::getModel()->update($oldCodeBL , $CodeBL , $Date , $CodeCommande , $CodeFacteur ,  $CodeEtat);
        if($is_updated){
            static::withAlert('success_message' , "Les données ont été modifiées avec succès");
            header('location:index.php?page=BonLivraison&action=index');
        }else{
            static::withAlert('error_message' , "les données n'est pas modifiées");
            header('location:index.php?page=BonLivraison&action=index');
        }
    }


    public static function destroy(){
        static::CallModel(new BonLivraison());
        $is_destroy = static::getModel()->destroy($_GET['CodeBL']);
        if($is_destroy){
            static::withAlert('success_message' , "Supprimé avec succès");
            header('location:index.php?page=BonLivraison&action=index');
        }else{
            static::withAlert('error_message' , "Vous ne pouvez pas effacer l'élément");
            header('location:index.php?page=BonLivraison&action=index');
        }
    }


}


?>
