<?php

use App\routes\Route;

use App\Controllers\LoginController;
use App\Controllers\LogoutController;
use App\Controllers\MarqueController;
use App\Controllers\FactureController;
use App\Controllers\MatreilController;
use App\Controllers\ReformeController;
use App\Controllers\DechargeController;
use App\Controllers\commandesController;
use App\Controllers\dashboardController;
use App\Controllers\InventaireController;
use App\Controllers\ReparationController;
use App\Controllers\verifycodeController;
use App\Controllers\MatreilTypeController;
use App\Controllers\utilisateursCntroller;
use App\Controllers\BonLivraisonController;
use App\Controllers\CommandeTypeController;
use App\Controllers\FournisseursController;
use App\Controllers\ForgotPasswordController;
use App\Controllers\CaracteristiquesController;
use App\Controllers\NouveauMotDePassController;
use App\Controllers\PieceaReparationController;

include "../../vendor/autoload.php";


Route::resource([
    "matreil" => MatreilController::class , 
    "matreiltype" => MatreilTypeController::class , 
    "marque" => MarqueController::class,
    "caracteristiques" => CaracteristiquesController::class,
    "fournisseurs" => FournisseursController::class ,
    "CommandeType" => CommandeTypeController::class , 
    "commandes" => commandesController::class , 
    "factures" => FactureController::class , 
    "BonLivraison" => BonLivraisonController::class  ,
    "utilisateur" => utilisateursCntroller::class ,
    "logout" => LogoutController::class ,
    "login" => LoginController::class , 
    "decharge" => DechargeController::class , 
    "inventaire" => InventaireController::class , 
    "reforme" => ReformeController::class ,
    "reparation" => ReparationController::class ,
    "PieceaReparation" => PieceaReparationController::class ,
    "dashboard" => dashboardController::class ,
    "Forgotpassword" => ForgotPasswordController::class ,
    "verifycode" => verifycodeController::class ,
    "NewPassword" => NouveauMotDePassController::class 
]);
