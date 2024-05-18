<?php 

namespace App\Models ;
use PDO;
use PDOException;
use App\Models\DataBase\ConnectDataBase;


class commandes extends ConnectDataBase{




    public static function CodeCommandeGeneration(){
        $pdo = ConnectDataBase::connectDataBase(); // Ensure this function is correctly named (check casing)
        try {
            $currentYear = date('Y');
    
            // SQL to count the current number of entries for this year using a safer prepared statement
            $stmt = $pdo->prepare("SELECT COUNT(*) AS total FROM Commande WHERE YEAR(Date) = :currentYear");
            $stmt->execute([':currentYear' => $currentYear]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            $totalEntriesThisYear = $result ? (int)$result['total'] : 0;
    
            // Increment to get the next sequence number
            $nextSequenceNumber = $totalEntriesThisYear + 1;
    
            // Format the CodeCom as YYYY/NNN
            $codeCom = sprintf("%s/%03d", $currentYear, $nextSequenceNumber);
    
            return $codeCom;
    
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());  // It's good practice to log the actual error
            return false; // Return false indicating failure
        }
    }
    







    public static function latest(){



        function latest_cmd($Order = "ASC"){
            if($Order !== "DESC" AND $Order !==  "ASC"){ $Order = "ASC"; }
            $pdo = ConnectDataBase::ConnectDataBase();
            $stmt = $pdo->prepare("SELECT * FROM commnade");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }


    
        function latest_commander_view($Order = "ASC"){
            if($Order !== "DESC" AND $Order !==  "ASC"){ $Order = "ASC"; }
            $pdo = ConnectDataBase::ConnectDataBase();
            $stmt = $pdo->prepare("SELECT * FROM commander_view");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        

        function LesBonLivraison($Order = "ASC"){
            if($Order !== "DESC" AND $Order !==  "ASC"){ $Order = "ASC"; }
            $pdo = ConnectDataBase::ConnectDataBase();
            $stmt = $pdo->prepare("SELECT * FROM bonlivraison_v");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }



        $data = [
            'livraison' => LesBonLivraison() ,
            'data' => latest_cmd() ,
            'cmd_contenue' => latest_commander_view()
        ] ;


        return $data;
        
    }
    

    public static function store($codeCommande, $typeCommande, $fournisseur , $CommandeContenue) {
        $pdo = ConnectDataBase::ConnectDataBase();
        try {

            // Insert main command data
            $stmt = $pdo->prepare("INSERT INTO Commande (CodeCom, CodeFournisseur, CodeCommandeType) 
                                                VALUES (:CodeCom , :CodeFournisseur, :CodeCommandeType)");
            $stmt->bindParam(':CodeCom', $codeCommande);
            $stmt->bindParam(':CodeFournisseur', $fournisseur);
            $stmt->bindParam(':CodeCommandeType', $typeCommande);
            $result = $stmt->execute();

            try {
                // Insert command content
                foreach ($CommandeContenue as $item) {
                    $CodeType = $item['CodeType'];
                    $CodeMrq = $item['CodeMrq'];
                    $Qty = $item['Qty'];
            
                    $stmtContent = $pdo->prepare(
                        "INSERT INTO Commander (CodeCommande, CodeType, CodeMrq, Qty) 
                        VALUES (:CodeCommande, :CodeType, :CodeMrq, :Qty)"
                    );
                    $stmtContent->bindParam(':CodeCommande', $codeCommande);
                    $stmtContent->bindParam(':CodeType', $CodeType);
                    $stmtContent->bindParam(':CodeMrq', $CodeMrq);
                    $stmtContent->bindParam(':Qty', $Qty);
                    $stmtContent->execute();

                }

                return true ;
            } catch (PDOException $e) {
                echo "Insertion failed: " . $e->getMessage(); // Output detailed error message
                commandes::destroy($codeCommande);
                return false; // Return false indicating insertion failure
            }
            

            
    
        } catch (PDOException $e) {
            echo "inserted faildes"; 
            return false; // Return false indicating insertion failure
            
        }
    }
    
    

    public static function edit($CodeCom){
        try {
        
        function getCommandeInfo($CodeCom){
            $pdo = ConnectDataBase::ConnectDataBase();
            $stmt = $pdo->prepare("SELECT * FROM Commande WHERE CodeCom = :CodeCom");
            $stmt->bindParam(":CodeCom",$CodeCom);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        function getCommandeContenue($CodeCom){
            $pdo = ConnectDataBase::ConnectDataBase();
            $stmt = $pdo->prepare("SELECT * FROM Commander WHERE CodeCommande = :CodeCommande");
            $stmt->bindParam(":CodeCommande",$CodeCom);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        $data = [
            'getCommandeInfo' => getCommandeInfo($CodeCom) ,
            'getCommandeContenue' => getCommandeContenue($CodeCom)
        ] ;

        return $data;


        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }
    }




    public static function destroy($CodeCom){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
            $stmt = $pdo->prepare("DELETE FROM Commande WHERE CodeCom = :CodeCom");
            $stmt->bindParam(':CodeCom', $CodeCom);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }
    }
    
    


    public static function print($CodeCom){
        
        try {

        function getCommandeInfo($CodeCom){
            $pdo = ConnectDataBase::ConnectDataBase();
            $stmt = $pdo->prepare("SELECT * FROM commnade WHERE CodeCom = :CodeCom");
            $stmt->bindParam(":CodeCom",$CodeCom);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        function getCommandeContenue($CodeCom){
            $pdo = ConnectDataBase::ConnectDataBase();
            $stmt = $pdo->prepare("SELECT * FROM commander_view WHERE CodeCommande = :CodeCommande");
            $stmt->bindParam(":CodeCommande",$CodeCom);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        $data = [
            'getCommandeInfo' => getCommandeInfo($CodeCom) ,
            'getCommandeContenue' => getCommandeContenue($CodeCom)
        ] ;

        return $data;


        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }
    }







    
    
}



