<?php

namespace App\Controllers;


use App\Models\ForgotPassword;
include "../../vendor/autoload.php" ;




class ForgotPasswordController extends BaseController{

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
        if(isset($_SESSION['emailForgotPass'])){
            unset($_SESSION['emailForgotPass']);
        }
        if(isset($_SESSION['email'])){
            unset($_SESSION['email']);
        }
        if(isset($_SESSION['token'])){
            unset($_SESSION['token']);
        }
        
        static::view("../resources/views/Login/ForgotPassword.php"); 
    }

    
    public static function sendEmail() {
        if(isset($_POST['submit'])) {
            if(isset($_POST['email'] ) && !empty($_POST['email'])) {
                // Verify email format
                $email = $_POST['email'];

                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    static::ErrorMessage("Format d'email incorrect");
                    return; // Stop execution if email format is incorrect
                }

                // Call send email function
                static::CallModel(new ForgotPassword());
                $isSend = static::getModel()->sendMail($email);
    
                if ($isSend) {
                    session_start();
                    $_SESSION['emailForgotPass'] = $email;
                    $_SESSION['errorr_message'] = null;
                    header('Location: index.php?page=verifycode&action=index');
                    exit(); // Ensure no further code is executed
                }else {
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
        header('location:index.php?page=Forgotpassword&action=index');
    }


}


?>
