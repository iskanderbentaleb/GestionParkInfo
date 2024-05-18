<?php 

namespace App\Models ;
use PDO;
use PDOException;
use App\Models\DataBase\ConnectDataBase;


class Caracteristiques extends ConnectDataBase{

    public static function latest($Order = "ASC"){
        if($Order !== "DESC" AND $Order !==  "ASC"){ $Order = "ASC"; }
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM Caracteristiques ORDER BY Designation $Order");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function store($Designation){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
        $stmt = $pdo->prepare(
            "INSERT INTO Caracteristiques (Designation) 
            VALUES (:Designation)
        ");
        $stmt->bindParam(':Designation', $Designation);
        $result = $stmt->execute();
        return $result;
        } catch (PDOException $e) {
        return false; // Return false indicating deletion failure
        }
    }




    public static function edit($CodeCar){
        try {
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM Caracteristiques WHERE CodeCar = :CodeCar");
        $stmt->bindParam(":CodeCar",$CodeCar);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }
    }



    public static function update($CodeCar , $Designation){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
        $stmt = $pdo->prepare(
            "UPDATE Caracteristiques 
            SET 
            Designation = :Designation 
            WHERE CodeCar = :CodeCar
            ");
        $stmt->bindParam(':CodeCar', $CodeCar);
        $stmt->bindParam(':Designation', $Designation);
        return $stmt->execute();
        } catch (PDOException $e) {
        return false; // Return false indicating deletion failure
        }
    }



    public static function destroy($CodeCar){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
            $stmt = $pdo->prepare("DELETE FROM Caracteristiques WHERE CodeCar = :CodeCar");
            $stmt->bindParam(':CodeCar', $CodeCar);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }
    }

    
    
}



