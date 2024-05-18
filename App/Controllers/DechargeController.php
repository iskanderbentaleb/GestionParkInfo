<?php


namespace App\Controllers;
include "../../vendor/autoload.php" ;
use App\Models\Marque;
use App\Models\Matreil;
use App\Models\Decharge;
use App\Models\MatreilType;
use App\Models\utilisateurs;
use App\Models\Caracteristiques;
use App\Models\MatreilADecharge;
use App\Models\MatreilCaracteristiques;


class DechargeController extends BaseController{ 

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
        static::view("../resources/views/Decharge/index.php"); 
    }


    public static function create(){
        

        static::CallModel(new utilisateurs());
        $utilisateurs = static::getModel()->latest() ;

        static::CallModel(new Matreil());
        $Matreils = static::getModel()->latest(" WHERE CodeRef IS NULL ") ;


//         SELECT mat.*
// FROM matreil_view mat
// WHERE mat.CodeRef IS NULL
// AND (
//     -- Check for the latest record being 'Retour'
//     EXISTS (
//         SELECT 1
//         FROM matreiladecharge_v mad
//         WHERE mat.SSH = mad.SSH
//         AND mad.CodeDech = (
//             SELECT MAX(m.CodeDech)
//             FROM matreiladecharge_v m
//             WHERE m.SSH = mad.SSH
//         )
//         AND mad.Dechtype = 'Retour'
//     )
//     -- Or check there are no records in matreiladecharge_v for this SSH
//     OR NOT EXISTS (
//         SELECT 1
//         FROM matreiladecharge_v mad
//         WHERE mat.SSH = mad.SSH
//     )
// );



        static::CallModel(new MatreilCaracteristiques());
        $Caracteristiques = static::getModel()->latest() ;


        $data = [ 
            'utilisateurs' => $utilisateurs , 
            'Matreils' => $Matreils ,
            'Caracteristiques' => $Caracteristiques
        ];

        static::view("../resources/views/decharge/create.php" , $data);
    }  



    public static function store(){
        
        

        $Type = $_POST['Type'];
        $user = $_POST['user'];

        static::CallModel(new Decharge());
        $id_decharge = static::getModel()->store($Type , $user);

        if($id_decharge){

            if(isset($_POST['matreils']) && !empty($_POST['matreils'])) {
                static::CallModel(new MatreilADecharge());
                $matreils = $_POST['matreils'];
                foreach($matreils as $matreil_ssh) {
                    static::getModel()->store($matreil_ssh ,$id_decharge);
                }
            }
            static::withAlert('success_message' , "Données stockées avec succès !");
            header('location:index.php?page=decharge&action=index');
        }else{
            static::withAlert('error_message' , "les données n'a pas enregistré !!!");
            header('location:index.php?page=decharge&action=index');
        }



    }   



    public static function edit(){

        static::CallModel(new Decharge());
        $DechargeInfo = static::getModel()->edit($_GET['CodeDech']);

        if(!$DechargeInfo){
            static::index();
        }

        static::CallModel(new utilisateurs());
        $utilisateurs = static::getModel()->latest() ;

        static::CallModel(new Matreil());
        $Matreils = static::getModel()->latest() ;

        static::CallModel(new MatreilCaracteristiques());
        $Caracteristiques = static::getModel()->latest() ;


        static::CallModel(new MatreilADecharge());
        $SelectedMatreil = static::getModel()->latest($_GET['CodeDech']) ;


        $data = [ 
            'DechargeInfo' => $DechargeInfo ,
            'utilisateurs' => $utilisateurs , 
            'Matreils' => $Matreils ,
            'Caracteristiques' => $Caracteristiques ,
            'SelectedMatreil' => $SelectedMatreil
        ];

        static::view("../resources/views/Decharge/edit.php" , $data);
    }    




    public static function update(){
        static::callModel(new Decharge());

        $CodeDech = $_POST['CodeDech'];
        $Type = $_POST['Type'];
        $user = $_POST['user'];

        $is_updated = static::getModel()->update($CodeDech , $Type , $user);
        if($is_updated){

            static::CallModel(new MatreilADecharge());
            static::getModel()->destroy($CodeDech);

            if(isset($_POST['matreils']) && !empty($_POST['matreils'])) {
                static::CallModel(new MatreilADecharge());
                $matreils = $_POST['matreils'];
                foreach($matreils as $matreil_ssh) {
                    static::getModel()->store($matreil_ssh ,$CodeDech);
                }
            }

            static::withAlert('success_message' , "Les données ont été modifiées avec succès");
            header('location:index.php?page=decharge&action=index');
        }else{
            static::withAlert('error_message' , "les données n'est pas modifiées");
            header('location:index.php?page=decharge&action=index');
        }
    }




    public static function destroy(){
        static::CallModel(new Decharge());
        $is_destroy = static::getModel()->destroy($_GET['CodeDech']);
        if($is_destroy){
            static::withAlert('success_message' , "Supprimé avec succès");
            header('location:index.php?page=decharge&action=index');
        }else{
            static::withAlert('error_message' , "Vous ne pouvez pas effacer l'élément");
            header('location:index.php?page=commandes&action=index');
        }
    }





    public static function print(){

        static::CallModel(new Decharge());
        $dechargeInfo = static::getModel()->print($_GET['dech']);
    
        if(empty($dechargeInfo['getDechargeInfo'])){
            static::index();
        } else {
    

            $data = [
                "DechargeInfo" => $dechargeInfo['getDechargeInfo'] ,
                "DechargeContenue" => $dechargeInfo['getDechargeContenue'] 
            ];
    
            
            static::view("../resources/views/Decharge/print.php" , $data); 
        }
    }



}


?>
