<?php


namespace App\Controllers;
include "../../vendor/autoload.php" ;
use App\Models\Marque;
use App\Models\commandes;
use App\Models\MatreilType;
use App\Models\CommandeType;
use App\Models\Fournisseurs;


class commandesController extends BaseController{ 

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
        static::CallModel(new commandes());
        $data = static::getModel()->latest();
        static::view("../resources/views/commandes/index.php", $data ); 
    }


    
    public static function create(){
        
        static::CallModel(new commandes());
        $CodeCommandeGeneration = static::getModel()->CodeCommandeGeneration();


        static::CallModel(new CommandeType());
        $CommandeTypes = static::getModel()->latest("DESC");

        static::CallModel(new Fournisseurs());
        $fournisseur = static::getModel()->latest("DESC");

        static::CallModel(new MatreilType());
        $MatreilTypes = static::getModel()->latest();

        static::CallModel(new Marque());
        $Marques = static::getModel()->latest();

        $data = [ 
            'CodeCommandeGeneration' => $CodeCommandeGeneration ,
            'fournisseurs' => $fournisseur ,
            'CommandeTypes' => $CommandeTypes ,
            'MatreilTypes' => $MatreilTypes , 
            'Marques' => $Marques
        ];

        static::view("../resources/views/commandes/create.php" , $data);
    }  

    public static function store(){
        static::CallModel(new commandes());

        $codeCommande = $_POST['codeCommande']; 
        $typeCommande = $_POST['typeCommande'];  
        $fournisseur = $_POST['fournisseur'];  

        $CodeTypes = $_POST['materielType']; // Array of selected materiel types
        $Codemarques = $_POST['marque']; // Array of selected marques
        $qtys = $_POST['qty']; // Array of quantities
        
        // Assuming the arrays have the same length
        $CommandeContenue = [];
        for ($i = 0; $i < count($CodeTypes); $i++) {
            $CommandeContenue[] = [
                'CodeType' => $CodeTypes[$i],
                'CodeMrq' => $Codemarques[$i],
                'Qty' => $qtys[$i]
            ];
        }
        

        // header('Content-Type: application/json');
        // echo json_encode($CommandeContenue);

        $is_stored = static::getModel()->store($codeCommande , $typeCommande , $fournisseur  , $CommandeContenue);
        if($is_stored){
            static::withAlert('success_message' , "Données stockées avec succès !");
            header('location:index.php?page=commandes&action=index');
        }else{
            static::withAlert('error_message' , "les données n'est pas enregistrées");
            header('location:index.php?page=commandes&action=index');
        }
    }   

    public static function edit(){

        static::CallModel(new commandes());
        $commandeInfo = static::getModel()->edit($_GET['CodeCom']);

        if(!$commandeInfo){
            static::index();
        }else{

        static::CallModel(new commandes());
        $commandeContenue = static::getModel()->latest($_GET['CodeCom']);


        static::CallModel(new CommandeType());
        $CommandeTypes = static::getModel()->latest("DESC");

        static::CallModel(new Fournisseurs());
        $fournisseur = static::getModel()->latest("DESC");

        static::CallModel(new MatreilType());
        $MatreilTypes = static::getModel()->latest();

        static::CallModel(new Marque());
        $Marques = static::getModel()->latest();

        $data = [ 
            'commandeInfo' => $commandeInfo ,
            'commandeContenue' => $commandeContenue ,
            'fournisseurs' => $fournisseur ,
            'CommandeTypes' => $CommandeTypes ,
            'MatreilTypes' => $MatreilTypes , 
            'Marques' => $Marques
        ];


        static::view("../resources/views/commandes/edit.php" , $data);

        }

    }    

    public static function update(){
        static::CallModel(new commandes());

        $codeCommande = $_POST['codeCommande']; 
        $typeCommande = $_POST['typeCommande'];  
        $fournisseur = $_POST['fournisseur'];  

        $CodeTypes = $_POST['materielType']; // Array of selected materiel types
        $Codemarques = $_POST['marque']; // Array of selected marques
        $qtys = $_POST['qty']; // Array of quantities
        
        // Assuming the arrays have the same length
        $CommandeContenue = [];
        for ($i = 0; $i < count($CodeTypes); $i++) {
            $CommandeContenue[] = [
                'CodeType' => $CodeTypes[$i],
                'CodeMrq' => $Codemarques[$i],
                'Qty' => $qtys[$i]
            ];
        }
        
        $deletelastcmnd = static::getModel()->destroy($codeCommande); 
        $is_updated = false ;
        if($deletelastcmnd){
            $is_updated = static::getModel()->store($codeCommande , $typeCommande , $fournisseur  , $CommandeContenue);
        }
        
        if($is_updated){
            static::withAlert('success_message' , "Les données ont été modifiées avec succès");
            header('location:index.php?page=commandes&action=index');
        }else{
            static::withAlert('error_message' , "les données n'est pas modifiées");
            header('location:index.php?page=commandes&action=index');
        }
    }


    public static function destroy(){
        static::CallModel(new commandes());
        $is_destroy = static::getModel()->destroy($_GET['CodeCom']);
        if($is_destroy){
            static::withAlert('success_message' , "Supprimé avec succès");
            header('location:index.php?page=commandes&action=index');
        }else{
            static::withAlert('error_message' , "Vous ne pouvez pas effacer l'élément");
            header('location:index.php?page=commandes&action=index');
        }
    }






    public static function print(){

        static::CallModel(new commandes());
        $commandeInfo = static::getModel()->print($_GET['cmd']);
    
        if(empty($commandeInfo['getCommandeInfo'])){
            static::index();
        } else {
    

            $data = [
                "commandeInfo" => $commandeInfo['getCommandeInfo'] ,
                "commandeContenue" => $commandeInfo['getCommandeContenue'] 
            ];
    
            
            static::view("../resources/views/commandes/print.php" , $data); 
        }
    }


}


?>
