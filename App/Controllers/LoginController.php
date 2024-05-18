<?php

namespace App\Controllers;

use App\Models\Login;
include "../../vendor/autoload.php" ;




class LoginController extends BaseController{ 

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
        static::view("../resources/views/Login/index.php"); 
    }


    public static function connexion() {
        if(isset($_POST['submit'])) {
            if(isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {
                // Verify email format
                $email = $_POST['email'];
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    static::ErrorMessage("Format d'email incorrect");
                    return; // Stop execution if email format is incorrect
                }
                
                // Proceed with login authentication
                $password = $_POST['password'];
                
                // Call your authentication method here
                static::CallModel(new Login());
                $isConnected = static::getModel()->connexion($email, $password);
    
                if($isConnected) {
                    static::withAlert('success_message', "Connecté avec succès");
                    header('location:index.php?page=dashboard&action=index');
                } else {
                    // If authentication fails
                    static::ErrorMessage("Identifiants incorrects");
                }
            } else {
                static::ErrorMessage("Veuillez remplir tous les champs");
            }
        } else {
            static::ErrorMessage("Veuillez soumettre le formulaire incorrectement");
        }
    }

    public static function ErrorMessage($message) {
        static::withAlert('errorr_message', $message);
        header('location:index.php?page=login&action=index');
    }


}


?>
