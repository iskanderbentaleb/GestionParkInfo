<?php

namespace App\Controllers;


use App\Models\VerifyCode;
include "../../vendor/autoload.php" ;




class verifycodeController extends BaseController{ 

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
        if(isset($_SESSION['emailForgotPass']) && !is_null($_SESSION['emailForgotPass'])){
            static::view("../resources/views/Login/verifycode.php"); 
        }else{
            static::ErrorMessage("Vous devez d'abord entrer votre e-mail.");
        }
    }


    public static function CheckTheVirifyCode() {
        if(isset($_POST['submit'])) {
            session_start();
            if(isset($_POST['code'], $_SESSION['emailForgotPass']) && !empty($_POST['code']) && !empty($_SESSION['emailForgotPass'])) {
                // Verify email format

                $email = $_SESSION['emailForgotPass'];    
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    unset($_SESSION['emailForgotPass']);
                    static::ErrorMessage("Format d'email incorrect");
                    return; // Stop execution if email format is incorrect
                }

                $code = $_POST['code'];
                if (!ctype_digit($code)) {
                    unset($_SESSION['emailForgotPass']);
                    static::ErrorMessage("Le code doit être un nombre");
                    return; // Stop execution if the code is not numeric
                }

                static::CallModel(new VerifyCode());
                $isCorrect = static::getModel()->VerifyCode($email , $code);

                if($isCorrect) {
                    header('location:index.php?page=NewPassword&action=index');
                } else {
                    static::ErrorMessage("code incorrects");
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
