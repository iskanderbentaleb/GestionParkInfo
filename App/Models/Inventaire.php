<?php 

namespace App\Models ;
use PDO;
use PDOException;
use App\Models\DataBase\ConnectDataBase;


class Inventaire extends ConnectDataBase{

    
    public static function latest($Order = "ASC"){
        if($Order !== "DESC" AND $Order !==  "ASC"){ $Order = "ASC"; }
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM Inventaire ORDER BY CodeInv $Order");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public static function store($DateDebut , $DateFin){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
            $stmt = $pdo->prepare(
                "INSERT INTO Inventaire (DateDebut, DateFin) 
                VALUES (:DateDebut, :DateFin)"
            );
            
            $stmt->bindParam(':DateDebut', $DateDebut);
            $stmt->bindParam(':DateFin', $DateFin);
    
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
    


    public static function edit($CodeInv){
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM Inventaire WHERE CodeInv = :CodeInv");
        $stmt->bindParam(":CodeInv",$CodeInv);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }



    public static function update($CodeInv , $DateDebut , $DateFin){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
            $stmt = $pdo->prepare(
                "UPDATE Inventaire 
                SET 
                DateDebut = :DateDebut ,
                DateFin = :DateFin
                WHERE CodeInv = :CodeInv
                ");
    

            $stmt->bindParam(':DateDebut', $DateDebut);
            $stmt->bindParam(':DateFin', $DateFin);
            $stmt->bindParam(':CodeInv', $CodeInv);
    
            return $stmt->execute();
        } catch (PDOException $e) {
            return false; // Return false indicating update failure
        }
    }
    



    public static function destroy($CodeInv){
        $pdo = ConnectDataBase::ConnectDataBase();
        try{
            $stmt = $pdo->prepare("DELETE FROM Inventaire WHERE CodeInv = :CodeInv");
            $stmt->bindParam(':CodeInv', $CodeInv);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }

    }


    


    
    
}



