<?php 

namespace App\Models ;
use PDO;
use PDOException;
use App\Models\DataBase\ConnectDataBase;


class MatreilCaracteristiques extends ConnectDataBase{

    public static function latest($SSH = NULL){
        $condition = ' ';
        if(!is_null($SSH)){
            $condition  = "WHERE SSH = " . $SSH ;
        }
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM mareilcaractview " . $condition );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function store($SSH , $CodeCaracteristiques){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
        $stmt = $pdo->prepare(
            "INSERT INTO MatreilCaracteristiques (SSH , CodeCaracteristiques)
            VALUES (:SSH , :CodeCaracteristiques )
        ");
        $stmt->bindParam(':SSH', $SSH);
        $stmt->bindParam(':CodeCaracteristiques', $CodeCaracteristiques);
        $result = $stmt->execute();
        return $result;
        } catch (PDOException $e) {
        return false; // Return false indicating deletion failure
        }
    }


    public static function destroy($SSH){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
            $stmt = $pdo->prepare("DELETE FROM MatreilCaracteristiques WHERE SSH = :SSH");
            $stmt->bindParam(':SSH', $SSH);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }
    }

    
    
}



