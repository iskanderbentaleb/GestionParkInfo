<?php 

namespace App\Models ;
use PDO;
use PDOException;
use App\Models\DataBase\ConnectDataBase;


class Login extends ConnectDataBase{

    public static function connexion($email, $password) {
        try {
            $pdo = ConnectDataBase::ConnectDataBase();
            
            // Prepare and execute the query to fetch user data by email
            $stmt = $pdo->prepare("SELECT * FROM Utilisateur WHERE Email = :Email AND Mdp IS NOT NULL");
            $stmt->bindParam(':Email', $email);
            $stmt->execute();
            
            // Fetch the result
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if($user) {
                // Email exists, now verify the password
                if(password_verify($password, $user['Mdp'])) {
                    // Password is correct, store user data in session
                    session_start();
                    $_SESSION['user'] = $user;
                    $_SESSION['last_activity'] = time();
                    // Unset the password before storing user data in session
                    unset($_SESSION['user']['Mdp']);
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
    
    

}



