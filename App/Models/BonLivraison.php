<?php 

namespace App\Models ;
use PDO;
use PDOException;
use App\Models\DataBase\ConnectDataBase;


class BonLivraison extends ConnectDataBase{

    public static function latest($condtion = NULL){
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM bonlivraison_v " . $condtion);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function store($CodeBL , $Date , $CodeCommande , $CodeFacteur   , $CodeEtat){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
        $stmt = $pdo->prepare(
            "INSERT INTO BonLivraison (CodeBL , Date , CodeCommande , CodeFacteur , CodeEtat) 
            VALUES (:CodeBL , :Date , :CodeCommande , :CodeFacteur , :CodeEtat)
        ");
        $stmt->bindParam(':CodeBL', $CodeBL);
        $stmt->bindParam(':Date', $Date);
        $stmt->bindParam(':CodeCommande', $CodeCommande);
        $stmt->bindParam(':CodeFacteur', $CodeFacteur);
        $stmt->bindParam(':CodeEtat', $CodeEtat);
        
        $result = $stmt->execute();
        return $result;
        } catch (PDOException $e) {
        return false; // Return false indicating deletion failure
        }
    }




    public static function edit($CodeBL){
        try {
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM BonLivraison WHERE CodeBL = :CodeBL");
        $stmt->bindParam(":CodeBL",$CodeBL);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }
    }



    public static function update($oldCodeBL , $CodeBL , $Date , $CodeCommande , $CodeFacteur , $codeetat){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
        $stmt = $pdo->prepare(
            "UPDATE BonLivraison 
            SET 
            CodeBL  = :CodeBL  ,
            Date  = :Date  ,
            CodeCommande  = :CodeCommande  ,
            CodeFacteur = :CodeFacteur  ,
            codeetat = :codeetat 
            WHERE CodeBL = :oldCodeBL
            ");
        $stmt->bindParam(':CodeBL', $CodeBL);
        $stmt->bindParam(':Date', $Date);
        $stmt->bindParam(':CodeCommande', $CodeCommande);
        $stmt->bindParam(':CodeFacteur', $CodeFacteur);
        $stmt->bindParam(':codeetat', $codeetat);
        $stmt->bindParam(':oldCodeBL', $oldCodeBL);
        return $stmt->execute();
        } catch (PDOException $e) {
        return false; // Return false indicating deletion failure
        }
    }



    public static function destroy($CodeBL){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
            $stmt = $pdo->prepare("DELETE FROM BonLivraison WHERE CodeBL = :CodeBL");
            $stmt->bindParam(':CodeBL', $CodeBL);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }
    }
    
    
    
}



