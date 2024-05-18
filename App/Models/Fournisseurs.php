<?php 

namespace App\Models ;
use PDO;
use PDOException;
use App\Models\DataBase\ConnectDataBase;


class Fournisseurs extends ConnectDataBase{

    public static function latest($Order = "ASC"){

        if($Order !== "DESC" AND $Order !==  "ASC"){ $Order = "ASC"; }
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM Fournisseur ORDER BY Nom $Order");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }



    public static function store($Nom , $Prenom , $Email , $Tel , $Address){
        $pdo = ConnectDataBase::ConnectDataBase();
        try{
        $stmt = $pdo->prepare(
            "INSERT INTO Fournisseur (Nom , Prenom , Email , Tel , Address) 
            VALUES (:Nom , :Prenom , :Email , :Tel , :Address)
        ");
        
        $stmt->bindParam(':Nom', $Nom);
        $stmt->bindParam(':Prenom', $Prenom);
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':Tel', $Tel);
        $stmt->bindParam(':Address', $Address);

        $result = $stmt->execute();
        return $result;
        } catch (PDOException $e) {
        return false; // Return false indicating deletion failure
        }
    }


    public static function edit($CodeFour){
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM Fournisseur WHERE CodeFour = :CodeFour");
        $stmt->bindParam(":CodeFour",$CodeFour);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }



    public static function update($CodeFour , $Nom , $Prenom , $Email , $Tel , $Address){
        $pdo = ConnectDataBase::ConnectDataBase();
        try{
        $stmt = $pdo->prepare(
            "UPDATE Fournisseur 
            SET 
            Nom = :Nom , 
            Prenom = :Prenom ,
            Email = :Email ,
            Tel = :Tel ,
            Address = :Address 
            WHERE CodeFour = :CodeFour
            ");

        $stmt->bindParam(':Nom', $Nom);
        $stmt->bindParam(':Prenom', $Prenom);
        $stmt->bindParam(':Email', $Email);
        $stmt->bindParam(':Tel', $Tel);
        $stmt->bindParam(':Address', $Address);
        $stmt->bindParam(':CodeFour', $CodeFour);
        return $stmt->execute();
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }
    }



    public static function destroy($CodeFour){
        $pdo = ConnectDataBase::ConnectDataBase();
        try{
            $stmt = $pdo->prepare("DELETE FROM Fournisseur WHERE CodeFour = :CodeFour");
            $stmt->bindParam(':CodeFour', $CodeFour);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }

    }


    


    
    
}



