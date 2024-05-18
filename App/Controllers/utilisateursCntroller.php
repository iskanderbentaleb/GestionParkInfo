<?php


namespace App\Controllers;
include "../../vendor/autoload.php" ;
use App\Models\Role;
use App\Models\Marque;
use App\Models\Structure;
use App\Models\utilisateurs;



class utilisateursCntroller extends BaseController{ 

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
        static::CallModel(new utilisateurs());
        $data = static::getModel()->latest();
        static::view("../resources/views/utilisateurs/index.php", $data ); 
    }


    public static function create(){
        
        static::CallModel(new Structure());
        $Structures = static::getModel()->latest() ;

        static::CallModel(new Role());
        $Roles = static::getModel()->latest() ;

        $data = [ 
            'Structures' => $Structures , 
            'Roles' => $Roles
        ];


        static::view("../resources/views/utilisateurs/create.php" , $data);
    }  

    public static function store(){

        static::CallModel(new utilisateurs());


        $Nom = $_POST['Nom'];
        $Prenom = $_POST['Prenom'];
        $DNN = $_POST['DNN'];
        $Email = $_POST['Email'];
        $Tel = $_POST['Tel'];
        $Post = $_POST['Post'];
        $structure = $_POST['structure'];
        $role = $_POST['role'];


        $secure_password = NULL ;
        if(isset($_POST['password']) && !empty($_POST['password'])) {
            $password = $_POST['password'];
            $secure_password = password_hash($password, PASSWORD_DEFAULT);
            // if(password_verify($password, $getRow['pass'])) check password 
        }

        $is_stored = static::getModel()->store($Nom , $Prenom , $DNN , $Email , $Tel , $Post , $structure , $role , $secure_password);
        if($is_stored){
            static::withAlert('success_message' , "Données stockées avec succès !");
            header('location:index.php?page=utilisateur&action=index');
        }else{
            static::withAlert('error_message' , "les données n'a pas enregistré !!!");
            header('location:index.php?page=utilisateur&action=index');
        }
    }   


    public static function edit(){

        static::CallModel(new utilisateurs());
        $UtilisateurInfo = static::getModel()->edit($_GET['CodeUt']);

        static::CallModel(new Structure());
        $Structures = static::getModel()->latest() ;

        static::CallModel(new Role());
        $Roles = static::getModel()->latest() ;

        if(!$UtilisateurInfo){
            static::index();
        }

        $data = [
            'UtilisateurInfo' => $UtilisateurInfo ,
            'Structures' => $Structures , 
            'Roles' => $Roles
        ];

        // print_r($data);
        static::view("../resources/views/utilisateurs/edit.php" , $data);
    }    


    public static function update(){
        static::callModel(new utilisateurs());

        $CodeUt = $_POST['CodeUt'];
        $Nom = $_POST['Nom'];
        $Prenom = $_POST['Prenom'];
        $DNN = $_POST['DNN'];
        $Email = $_POST['Email'];
        $Tel = $_POST['Tel'];
        $Post = $_POST['Post'];
        $structure = $_POST['structure'];
        $role = $_POST['role'];

        $is_updated = static::getModel()->update($CodeUt, $Nom, $Prenom, $DNN, $Email, $Tel, $Post, $structure, $role);
        if($is_updated){
            static::withAlert('success_message' , "Les données ont été modifiées avec succès");
            header('location:index.php?page=utilisateur&action=index');
        }else{
            static::withAlert('error_message' , "les données n'est pas modifiées");
            header('location:index.php?page=utilisateur&action=index');
        }
    }


    public static function destroy(){
        static::CallModel(new utilisateurs());
        $is_destroy = static::getModel()->destroy($_GET['CodeUt']);
        if($is_destroy){
            static::withAlert('success_message' , "Supprimé avec succès");
            header('location:index.php?page=utilisateur&action=index');
        }else{
            static::withAlert('error_message' , "Vous ne pouvez pas effacer l'élément");
            header('location:index.php?page=utilisateur&action=index');
        }
    }


}


?>
