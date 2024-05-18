<?php

namespace App\Controllers;


use App\Models\NouveauMotDePasse;
include "../../vendor/autoload.php" ;




class NouveauMotDePassController extends BaseController{ 

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
        session_start();
        if (isset($_SESSION['email']) && isset($_SESSION['token']) && !is_null($_SESSION['email']) && !is_null($_SESSION['token'])) {
            static::view("../resources/views/Login/NewPassword.php"); 
        } else {
            static::ErrorMessage("Vous devez d'abord entrer votre e-mail." , "Forgotpassword");
        }        
    }

    public static function ChangePassword() {
        if(isset($_POST['submit'])) {
            session_start();
            if (isset($_SESSION['email']) && isset($_SESSION['token']) && !is_null($_SESSION['email']) && !is_null($_SESSION['token'])) {
                if(isset($_POST['Password'], $_POST['RewritePassword']) && !empty($_POST['Password']) && !empty($_POST['RewritePassword'])) {

                    $token = $_SESSION['token'];
                    $email = $_SESSION['email'] ;
                    $password = $_POST['Password'];
                    $RewritePassword = $_POST['RewritePassword'];

                    if($password !== $RewritePassword) {
                        static::ErrorMessage("les mots de passe ne sont pas les mêmes" , "NewPassword");
                        return; // Stop execution if email format is incorrect
                    }
                    
                    // call model
                    static::CallModel(new NouveauMotDePasse());

                    // check if token correct
                    $isTokenCorrect = static::getModel()->checkToken($email , $token);
                    if($isTokenCorrect){

                        // check if password updated
                        $isPasswordUpdated = static::getModel()->updatePassword(password_hash($password, PASSWORD_DEFAULT), $email);
                        if($isPasswordUpdated) {
                            session_start();
                            session_unset();
                            static::withAlert('success_message', "Mot de passe modifié avec succès.");
                            header('location:index.php?page=login&action=index');
                        } else {
                            static::ErrorMessage("Le mot de passe n'a pas été modifié." ,"NewPassword");
                        }

                    }else{
                        static::ErrorMessage("Veuillez soumettre le formulaire incorrectement" , "NewPassword");
                    }

                } else {
                    static::ErrorMessage("Veuillez remplir tous les champs" , "NewPassword");
                }
            }else{
                static::ErrorMessage("Veuillez soumettre le formulaire incorrectement" , "Forgotpassword");
            }
        } else {
            static::ErrorMessage("Veuillez soumettre le formulaire incorrectement" , "Forgotpassword");
        }
    }

    public static function ErrorMessage($message , $page) {
        static::withAlert('errorr_message', $message);
        header("location:index.php?page=$page&action=index");
    }


}


?>
