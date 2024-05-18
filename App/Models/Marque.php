<?php 

namespace App\Models ;
use PDO;
use PDOException;
use App\Models\DataBase\ConnectDataBase;


class Marque extends ConnectDataBase{

    public static function latest($Order = "ASC"){
        if($Order !== "DESC" AND $Order !==  "ASC"){ $Order = "ASC"; }
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM Marque ORDER BY Designation $Order");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function store($Designation){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
        $stmt = $pdo->prepare(
            "INSERT INTO Marque (Designation) 
            VALUES (:Designation)
        ");
        $stmt->bindParam(':Designation', $Designation);
        $result = $stmt->execute();
        return $result;
        } catch (PDOException $e) {
        return false; // Return false indicating deletion failure
        }
    }




    public static function edit($CodeMrq){
        try {
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM Marque WHERE CodeMrq = :CodeMrq");
        $stmt->bindParam(":CodeMrq",$CodeMrq);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }
    }



    public static function update($CodeMrq , $Designation){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
        $stmt = $pdo->prepare(
            "UPDATE Marque 
            SET 
            Designation = :Designation 
            WHERE CodeMrq = :CodeMrq
            ");
        $stmt->bindParam(':CodeMrq', $CodeMrq);
        $stmt->bindParam(':Designation', $Designation);
        return $stmt->execute();
        } catch (PDOException $e) {
        return false; // Return false indicating deletion failure
        }
    }



    public static function destroy($CodeMrq){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
            $stmt = $pdo->prepare("DELETE FROM Marque WHERE CodeMrq = :CodeMrq");
            $stmt->bindParam(':CodeMrq', $CodeMrq);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }
    }
    
    
    
}



