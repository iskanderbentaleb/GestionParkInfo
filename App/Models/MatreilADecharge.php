<?php 

namespace App\Models ;
use PDO;
use PDOException;
use App\Models\DataBase\ConnectDataBase;


class MatreilADecharge extends ConnectDataBase{

    public static function latest($CodeDech = NULL){
        $condition = ' ';
        if(!is_null($CodeDech)){
            $condition  = "WHERE CodeDech = " . $CodeDech ;
        }
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM matreiladecharge_v "  . $condition );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function store($SSH , $CodeDech){
        $pdo = ConnectDataBase::ConnectDataBase();
        try{
        $stmt = $pdo->prepare(
            "INSERT INTO MatreilADecharge (SSH , CodeDech) 
            VALUES (:SSH , :CodeDech)
        ");
        
        $stmt->bindParam(':SSH', $SSH);
        $stmt->bindParam(':CodeDech', $CodeDech);

        $result = $stmt->execute();
        return $result;
        } catch (PDOException $e) {
        return false; // Return false indicating deletion failure
        }
    }


    public static function destroy($CodeDech){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
            $stmt = $pdo->prepare("DELETE FROM MatreilADecharge WHERE CodeDech = :CodeDech");
            $stmt->bindParam(':CodeDech', $CodeDech);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }
    }

    
}



