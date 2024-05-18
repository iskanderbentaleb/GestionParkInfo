<?php 

namespace App\Models ;
use PDO;
use PDOException;
use App\Models\DataBase\ConnectDataBase;


class NouveauMotDePasse extends ConnectDataBase{

    public static function checkToken($email , $token) {
        try {
            $pdo = ConnectDataBase::ConnectDataBase();
            
            // Prepare and execute the query to fetch user data by email
            $stmt = $pdo->prepare("SELECT token FROM Utilisateur WHERE Email = :Email AND Mdp IS NOT NULL");
            $stmt->bindParam(':Email', $email);
            $stmt->execute();
            
            // Fetch the result
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if($user) {
                if(password_verify($token, $user['token'])) {
                    return true; // Return true to indicate successful login
                } else {
                    // Password is incorrect
                    return false;
                }
            } else {
                // Email does not exist
                return false;
            }
        } catch (PDOException $e) {
            // Handle database errors
            return false;
        }
    }


    public static function updatePassword($password , $email) {
        try {
            $pdo = ConnectDataBase::ConnectDataBase();
            
            $stmt = $pdo->prepare("UPDATE Utilisateur SET Mdp = :Mdp WHERE Email = :Email AND Mdp IS NOT NULL");
            $stmt->bindParam(':Mdp', $password); 
            $stmt->bindParam(':Email', $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
            
        } catch (PDOException $e) {
            // Handle database errors
            return false;
        }
    }
    
    

}



