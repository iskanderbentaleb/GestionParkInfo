<?php 

namespace App\Models ;
use PDO;
use PDOException;
use App\Models\DataBase\ConnectDataBase;


class PieceReparation extends ConnectDataBase{



    public static function latest($condition = NULL){
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM piecereparation_v " . $condition);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function store($CodePiece , $CodeReparation , $Qty){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
            $stmt = $pdo->prepare(
                "INSERT INTO PieceReparation (CodePiece ,CodeReparation ,Qty) 
                VALUES (:CodePiece , :CodeReparation  ,:Qty)"
            );
            
            $stmt->bindParam(':CodePiece', $CodePiece);
            $stmt->bindParam(':CodeReparation', $CodeReparation);
            $stmt->bindParam(':Qty', $Qty);
    
            $result = $stmt->execute();
            
            if ($result) {
                // Fetch the last inserted ID (CodeDech)
                $lastInsertedId = $pdo->lastInsertId();
                return $lastInsertedId;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false; // Return false indicating insertion failure
        }
    }
    



    public static function destroy($CodeRep){
        $pdo = ConnectDataBase::ConnectDataBase();
        try{
            $stmt = $pdo->prepare("DELETE FROM PieceReparation WHERE CodeReparation = :CodeReparation");
            $stmt->bindParam(':CodeReparation', $CodeRep);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }

    }



    
}



