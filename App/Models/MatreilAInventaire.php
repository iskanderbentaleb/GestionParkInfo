<?php 

namespace App\Models ;
use PDO;
use PDOException;
use App\Models\DataBase\ConnectDataBase;


class MatreilAInventaire extends ConnectDataBase{

    public static function latest($CodeInv = NULL){
        $condition = ' ';
        if(!is_null($CodeInv)){
            $condition  = "WHERE CodeInv = " . $CodeInv ;
        }
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM matreilainventaire_v "  . $condition );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function store($SSH , $CodeInv){
        $pdo = ConnectDataBase::ConnectDataBase();
        try{
        $stmt = $pdo->prepare(
            "INSERT INTO MatreilAInventaire (SSH , CodeInv) 
            VALUES (:SSH , :CodeDech)
        ");
        
        $stmt->bindParam(':SSH', $SSH);
        $stmt->bindParam(':CodeDech', $CodeInv);

        $result = $stmt->execute();
        return $result;
        } catch (PDOException $e) {
        return false; // Return false indicating deletion failure
        }
    }


    public static function destroy($CodeInv){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
            $stmt = $pdo->prepare("DELETE FROM MatreilAInventaire WHERE CodeInv = :CodeInv");
            $stmt->bindParam(':CodeInv', $CodeInv);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }
    }

    
}



