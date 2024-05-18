<?php 

namespace App\Models ;
use PDO;
use PDOException;
use App\Models\DataBase\ConnectDataBase;


class Reforme extends ConnectDataBase{

    public static function latest($Order = "ASC"){
        if($Order !== "DESC" AND $Order !==  "ASC"){ $Order = "ASC"; }
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM Reforme ORDER BY CodeRef $Order");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public static function store($Date){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
            $stmt = $pdo->prepare(
                "INSERT INTO Reforme (Date) 
                VALUES (:Date)"
            );
            
            $stmt->bindParam(':Date', $Date);
    
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
    


    public static function edit($CodeRef){
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM Reforme WHERE CodeRef = :CodeRef");
        $stmt->bindParam(":CodeRef",$CodeRef);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }



    public static function update($CodeRef , $Date){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
            $stmt = $pdo->prepare(
                "UPDATE Reforme 
                SET 
                CodeRef = :CodeRef ,
                Date = :Date 
                WHERE CodeRef = :CodeRef
                ");
            $stmt->bindParam(':Date', $Date);
            $stmt->bindParam(':CodeRef', $CodeRef);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false; // Return false indicating update failure
        }
    }
    



    public static function destroy($CodeRef){
        $pdo = ConnectDataBase::ConnectDataBase();
        try{
            $stmt = $pdo->prepare("DELETE FROM Reforme WHERE CodeRef = :CodeRef");
            $stmt->bindParam(':CodeRef', $CodeRef);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }

    }


    


    
    
}



