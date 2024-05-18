<?php


namespace App\Controllers;
include "../../vendor/autoload.php" ;
use App\Models\Marque;
use App\Models\Matreil;
use App\Models\MatreilType;
use App\Models\BonLivraison;
use App\Models\Caracteristiques;
use App\Models\MatreilCaracteristiques;


class MatreilController extends BaseController{ 


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



    public static function index(){
        static::CallModel(new Matreil());
        $data = static::getModel()->latest();
        static::view("../resources/views/Matreil/index.php", $data ); 
    }



    public static function create(){

        static::CallModel(new MatreilType());
        $MatreilTypes = static::getModel()->latest() ;

        static::CallModel(new Marque());
        $Marques = static::getModel()->latest() ;

        static::CallModel(new Caracteristiques());
        $caracteristiques = static::getModel()->latest() ;

        static::CallModel(new BonLivraison());
        $BonLivraisons = static::getModel()->latest(" WHERE Designation = 'Livré' ") ;


        $data = [ 
            'MatreilTypes' => $MatreilTypes , 
            'Marques' => $Marques , 
            'caracteristiques' => $caracteristiques,
            'BonLivraisons' => $BonLivraisons
        ];

        static::view("../resources/views/Matreil/create.php" , $data);
    }  




    public static function store(){
        static::CallModel(new Matreil());

        $SSH = $_POST['SSH'];
        $Prix = $_POST['Prix'];
        $DateGarantie = $_POST['DateGarantie'];
        $DateRec = $_POST['DateRec'];
        $DurreeVie = 3;
        $CodeBL = $_POST['CodeBL'];
        $CodeMarque = $_POST['CodeMarque'];
        $CodeType = $_POST['CodeType'];
        

        $is_stored = static::getModel()->store($SSH , $Prix ,$DateGarantie , $DateRec , $DurreeVie , $CodeMarque , $CodeType , $CodeBL);
        if($is_stored){

            if(isset($_POST['caracteristiques']) && !empty($_POST['caracteristiques'])) {
                static::CallModel(new MatreilCaracteristiques());
                $caracteristiques = $_POST['caracteristiques'];
                foreach($caracteristiques as $caracteristique) {
                    static::getModel()->store($SSH , $caracteristique);
                }
            }

            static::withAlert('success_message' , "Données stockées avec succès !");
            header('location:index.php?page=matreil&action=index');
        }else{
            static::withAlert('error_message' , "les données n'est pas enregistrées");
            header('location:index.php?page=matreil&action=index');
        }
    }   



    public static function edit(){
        static::CallModel(new Matreil());
        $MatreilInfo = static::getModel()->edit($_GET['SSH']);

        if(!$MatreilInfo){
            static::index();
        }

        static::CallModel(new MatreilType());
        $MatreilTypes = static::getModel()->latest() ;

        static::CallModel(new Marque());
        $Marques = static::getModel()->latest() ;

        static::CallModel(new Caracteristiques());
        $caracteristiques = static::getModel()->latest() ;

        static::CallModel(new MatreilCaracteristiques());
        $SelectedCaracteristiques = static::getModel()->latest($_GET['SSH']) ;


        static::CallModel(new BonLivraison());
        $BonLivraisons = static::getModel()->latest(" WHERE Designation = 'Livré' ") ;

        $data = [ 
            'MatreilInfo' => $MatreilInfo ,
            'MatreilTypes' => $MatreilTypes , 
            'Marques' => $Marques ,
            'caracteristiques' => $caracteristiques ,
            'SelectedCaracteristiques' => $SelectedCaracteristiques ,
            'BonLivraisons' => $BonLivraisons
        ];

        // print_r($data);
        static::view("../resources/views/Matreil/edit.php" , $data);
    }    



    public static function update(){
        static::callModel(new Matreil());

        $id = $_POST['id'];
        $SSH = $_POST['SSH'];
        $Prix = $_POST['Prix'];
        $DateGarantie = $_POST['DateGarantie'];
        $DateRec = $_POST['DateRec'];
        $DurreeVie = 3;
        $CodeBL = $_POST['CodeBL'];
        $CodeMarque = $_POST['CodeMarque'];
        $CodeType = $_POST['CodeType'];
        

        $is_updated = static::getModel()->update($id , $SSH ,$Prix,$DateGarantie ,$DateRec ,$DurreeVie ,$CodeMarque ,$CodeType , $CodeBL);
        if($is_updated){

            static::CallModel(new MatreilCaracteristiques());
            static::getModel()->destroy($id);

            if(isset($_POST['caracteristiques']) && !empty($_POST['caracteristiques'])) {
                $caracteristiques = $_POST['caracteristiques'];
                foreach($caracteristiques as $caracteristique) {
                    static::getModel()->store($SSH , $caracteristique);
                }
            }

            static::withAlert('success_message' , "Les données ont été modifiées avec succès");
            header('location:index.php?page=matreil&action=index');
        }else{
            static::withAlert('error_message' , "les données n'est pas modifiées");
            header('location:index.php?page=matreil&action=index');
        }
    }



    public static function destroy(){
        static::CallModel(new Matreil());
        $is_destroy = static::getModel()->destroy($_GET['SSH']);
        if($is_destroy){
            static::withAlert('success_message' , "Supprimé avec succès");
            header('location:index.php?page=matreil&action=index');
        }else{
            static::withAlert('error_message' , "Vous ne pouvez pas effacer l'élément");
            header('location:index.php?page=matreil&action=index');
        }
    }


}


?>
