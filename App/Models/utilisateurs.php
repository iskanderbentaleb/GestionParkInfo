<?php 

namespace App\Models ;
use PDO;
use PDOException;
use App\Models\DataBase\ConnectDataBase;


class utilisateurs extends ConnectDataBase{

    public static function latest($condition = NULL){
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM utilisateur_v " . $condition);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function store($Nom, $Prenom, $DNN, $Email, $Tel, $Post, $structure, $role, $secure_password)
    {
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
            $stmt = $pdo->prepare(
                "INSERT INTO Utilisateur (Nom, Prenom, DNN, Email, Mdp , Tel , Post, CodeStructure, CodeRole) 
                                 VALUES (:Nom, :Prenom, :DNN, :Email, :Mdp , :Tel, :Post, :CodeStructure, :CodeRole)"
            );
            $stmt->bindParam(':Nom', $Nom);
            $stmt->bindParam(':Prenom', $Prenom);
            $stmt->bindParam(':DNN', $DNN);
            $stmt->bindParam(':Email', $Email);
            $stmt->bindParam(':Mdp', $secure_password);
            $stmt->bindParam(':Tel', $Tel);
            $stmt->bindParam(':Post', $Post);
            $stmt->bindParam(':CodeStructure', $structure);
            $stmt->bindParam(':CodeRole', $role);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            return false; // Return false indicating insertion failure
        }
    }
    

    public static function edit($CodeUt){
        try {
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM utilisateur_v WHERE CodeUt = :CodeUt");
        $stmt->bindParam(":CodeUt",$CodeUt);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }
    }



    public static function update($CodeUt, $Nom, $Prenom, $DNN, $Email, $Tel, $Post, $structure, $role){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
            $stmt = $pdo->prepare(
                "UPDATE Utilisateur 
                SET 
                Nom = :Nom, 
                Prenom = :Prenom, 
                DNN = :DNN, 
                Email = :Email, 
                Tel = :Tel, 
                Post = :Post, 
                CodeRole = :CodeRole, 
                CodeStructure = :CodeStructure 
                WHERE CodeUt = :CodeUt"
            );

            $stmt->bindParam(':Nom', $Nom);
            $stmt->bindParam(':Prenom', $Prenom);
            $stmt->bindParam(':DNN', $DNN);
            $stmt->bindParam(':Email', $Email);
            $stmt->bindParam(':Tel', $Tel);
            $stmt->bindParam(':Post', $Post);
            $stmt->bindParam(':CodeRole', $role);
            $stmt->bindParam(':CodeStructure', $structure);
            $stmt->bindParam(':CodeUt', $CodeUt);

            return $stmt->execute();
        } catch (PDOException $e) {
            return false; // Return false indicating update failure
        }
    }
    



    public static function destroy($CodeUt){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
            $stmt = $pdo->prepare("DELETE FROM Utilisateur WHERE CodeUt = :CodeUt");
            $stmt->bindParam(':CodeUt', $CodeUt);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }
    }
    
    
    
}



