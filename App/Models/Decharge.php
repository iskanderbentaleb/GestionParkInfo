<?php 

namespace App\Models ;
use PDO;
use PDOException;
use App\Models\DataBase\ConnectDataBase;


class Decharge extends ConnectDataBase{

    public static function latest(){
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM decharge_v");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public static function store($Type, $user){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
            $stmt = $pdo->prepare(
                "INSERT INTO Decharge (Type, CodeUtilisateur) 
                VALUES (:Type, :CodeUtilisateur)"
            );
            
            $stmt->bindParam(':Type', $Type);
            $stmt->bindParam(':CodeUtilisateur', $user);
    
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
    


    public static function edit($CodeDech){
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM Decharge WHERE CodeDech = :CodeDech");
        $stmt->bindParam(":CodeDech",$CodeDech);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }



    public static function update($id , $Type , $user){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
            $stmt = $pdo->prepare(
                "UPDATE Decharge 
                SET 
                Type = :Type ,
                CodeUtilisateur = :CodeUtilisateur
                WHERE CodeDech = :CodeDech
                ");
    

            $stmt->bindParam(':Type', $Type);
            $stmt->bindParam(':CodeUtilisateur', $user);
            $stmt->bindParam(':CodeDech', $id);
    
            return $stmt->execute();
        } catch (PDOException $e) {
            return false; // Return false indicating update failure
        }
    }
    



    public static function destroy($CodeDech){
        $pdo = ConnectDataBase::ConnectDataBase();
        try{
            $stmt = $pdo->prepare("DELETE FROM Decharge WHERE CodeDech = :CodeDech");
            $stmt->bindParam(':CodeDech', $CodeDech);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }

    }





    public static function print($CodeDech){
        
        try {

        function getDechargeInfo($CodeDech){
            $pdo = ConnectDataBase::ConnectDataBase();
            $stmt = $pdo->prepare("SELECT * FROM decharge_v WHERE CodeDech = :CodeDech");
            $stmt->bindParam(":CodeDech",$CodeDech);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        function getDechargeContenue($CodeDech){
            $pdo = ConnectDataBase::ConnectDataBase();
            $stmt = $pdo->prepare("SELECT * FROM matreiladecharge_v WHERE CodeDech = :CodeDech");
            $stmt->bindParam(":CodeDech",$CodeDech);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        $data = [
            'getDechargeInfo' => getDechargeInfo($CodeDech) ,
            'getDechargeContenue' => getDechargeContenue($CodeDech)
        ] ;

        return $data;

        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }
    }


    


    
    
}



