<?php 

namespace App\Models ;
use PDO;
use PDOException;
use App\Models\DataBase\ConnectDataBase;


class Facture extends ConnectDataBase{

    public static function latest($Order = "ASC"){
        if($Order !== "DESC" AND $Order !==  "ASC"){ $Order = "ASC"; }
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM Facture ORDER BY CodeFact $Order");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function store($CodeFact , $Date){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
        $stmt = $pdo->prepare(
            "INSERT INTO Facture (CodeFact , Date) 
            VALUES (:CodeFact , :Date)
        ");
        $stmt->bindParam(':CodeFact', $CodeFact);
        $stmt->bindParam(':Date', $Date);
        
        $result = $stmt->execute();
        return $result;
        } catch (PDOException $e) {
        return false; // Return false indicating deletion failure
        }
    }




    public static function edit($CodeFact){
        try {
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM Facture WHERE CodeFact = :CodeFact");
        $stmt->bindParam(":CodeFact",$CodeFact);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }
    }



    public static function update($oldCodeFact ,$CodeFact , $Date){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
        $stmt = $pdo->prepare(
            "UPDATE Facture 
            SET 
            CodeFact  = :CodeFact  ,
            Date = :Date 
            WHERE CodeFact = :oldCodeFact
            ");
        $stmt->bindParam(':CodeFact', $CodeFact);
        $stmt->bindParam(':Date', $Date);
        $stmt->bindParam(':oldCodeFact', $oldCodeFact);
        return $stmt->execute();
        } catch (PDOException $e) {
        return false; // Return false indicating deletion failure
        }
    }



    public static function destroy($CodeFact){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
            $stmt = $pdo->prepare("DELETE FROM Facture WHERE CodeFact = :CodeFact");
            $stmt->bindParam(':CodeFact', $CodeFact);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }
    }
    
    
    
}



