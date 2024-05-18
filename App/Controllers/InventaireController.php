<?php


namespace App\Controllers;
include "../../vendor/autoload.php" ;
use App\Models\Marque;
use App\Models\Matreil;
use App\Models\Decharge;
use App\Models\Inventaire;
use App\Models\MatreilType;
use App\Models\utilisateurs;
use App\Models\Caracteristiques;
use App\Models\MatreilADecharge;
use App\Models\MatreilAInventaire;
use App\Models\MatreilCaracteristiques;


class InventaireController extends BaseController{ 

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
        static::view("../resources/views/Inventaire/index.php"); 
    }


    public static function create(){
        static::CallModel(new Matreil());
        $Matreils = static::getModel()->latest(" WHERE CodeRef IS NULL") ;

        static::CallModel(new MatreilCaracteristiques());
        $Caracteristiques = static::getModel()->latest() ;


        $data = [ 
            'Matreils' => $Matreils ,
            'Caracteristiques' => $Caracteristiques
        ];

        static::view("../resources/views/Inventaire/create.php" , $data);
    }


    public static function store(){
        
        

        $DateDeb = $_POST['DateDeb'];
        $DateFin = $_POST['DateFin'];

        static::CallModel(new Inventaire());
        $id_inventaire = static::getModel()->store($DateDeb , $DateFin);

        if($id_inventaire){

            if(isset($_POST['matreils']) && !empty($_POST['matreils'])) {
                static::CallModel(new MatreilAInventaire());
                $matreils = $_POST['matreils'];
                foreach($matreils as $matreil_ssh) {
                    static::getModel()->store($matreil_ssh ,$id_inventaire);
                }
            }
            static::withAlert('success_message' , "Données stockées avec succès !");
            header('location:index.php?page=inventaire&action=index');
        }else{
            static::withAlert('error_message' , "les données n'a pas enregistré !!!");
            header('location:index.php?page=inventaire&action=index');
        }



    }   



    public static function edit(){

        static::CallModel(new Inventaire());
        $InventaireInfo = static::getModel()->edit($_GET['CodeInv']);

        if(!$InventaireInfo){
            static::index();
        }


        static::CallModel(new Matreil());
        $Matreils = static::getModel()->latest() ;

        static::CallModel(new MatreilCaracteristiques());
        $Caracteristiques = static::getModel()->latest() ;


        static::CallModel(new MatreilAInventaire());
        $SelectedMatreil = static::getModel()->latest($_GET['CodeInv']) ;


        $data = [ 
            'InventaireInfo' => $InventaireInfo ,
            'Matreils' => $Matreils ,
            'Caracteristiques' => $Caracteristiques ,
            'SelectedMatreil' => $SelectedMatreil
        ];

        static::view("../resources/views/Inventaire/edit.php" , $data);
    }    




    public static function update(){
        static::callModel(new Inventaire());

        $CodeInv = $_POST['CodeInv'];
        $DateDeb = $_POST['DateDeb'];
        $DateFin = $_POST['DateFin'];

        $is_updated = static::getModel()->update($CodeInv , $DateDeb , $DateFin);
        if($is_updated){

            static::CallModel(new MatreilAInventaire());
            static::getModel()->destroy($CodeInv);

            if(isset($_POST['matreils']) && !empty($_POST['matreils'])) {
                static::CallModel(new MatreilAInventaire());
                $matreils = $_POST['matreils'];
                foreach($matreils as $matreil_ssh) {
                    static::getModel()->store($matreil_ssh ,$CodeInv);
                }
            }

            static::withAlert('success_message' , "Les données ont été modifiées avec succès");
            header('location:index.php?page=inventaire&action=index');
        }else{
            static::withAlert('error_message' , "les données n'est pas modifiées");
            header('location:index.php?page=fournisseurs&action=index');
        }
    }




    public static function destroy(){
        static::CallModel(new Inventaire());
        $is_destroy = static::getModel()->destroy($_GET['CodeInv']);
        if($is_destroy){
            static::withAlert('success_message' , "Supprimé avec succès");
            header('location:index.php?page=inventaire&action=index');
        }else{
            static::withAlert('error_message' , "Vous ne pouvez pas effacer l'élément");
            header('location:index.php?page=inventaire&action=index');
        }
    }


}


?>
