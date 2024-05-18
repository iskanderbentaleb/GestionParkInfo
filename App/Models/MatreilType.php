<?php 

namespace App\Models ;
use PDO;
use PDOException;
use App\Models\DataBase\ConnectDataBase;


class MatreilType extends ConnectDataBase{

    public static function latest($Order = "ASC"){
        if($Order !== "DESC" AND $Order !==  "ASC"){ $Order = "ASC"; }
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM MatreilType ORDER BY Designation $Order");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    public static function store($Designation){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
        $stmt = $pdo->prepare(
            "INSERT INTO MatreilType (Designation) 
            VALUES (:Designation)
        ");
        $stmt->bindParam(':Designation', $Designation);
        $result = $stmt->execute();
        return $result;
        } catch (PDOException $e) {
        return false; // Return false indicating deletion failure
        }
    }


    public static function edit($CodeType){
        try {
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM MatreilType WHERE CodeType = :CodeType");
        $stmt->bindParam(":CodeType",$CodeType);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }
    }



    public static function update($CodeType , $Designation){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
        $stmt = $pdo->prepare(
            "UPDATE MatreilType 
            SET 
            Designation = :Designation 
            WHERE CodeType = :CodeType
            ");
        $stmt->bindParam(':CodeType', $CodeType);
        $stmt->bindParam(':Designation', $Designation);
        return $stmt->execute();
        } catch (PDOException $e) {
        return false; // Return false indicating deletion failure
        }
    }



    public static function destroy($CodeType){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
            $stmt = $pdo->prepare("DELETE FROM MatreilType WHERE CodeType = :CodeType");
            $stmt->bindParam(':CodeType', $CodeType);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }
    }
    

    
}



