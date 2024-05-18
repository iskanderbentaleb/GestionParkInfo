<?php 

namespace App\Models ;
use PDO;
use DateTime;
use DateTimeZone;
use PDOException;
use App\Models\DataBase\ConnectDataBase;


class VerifyCode extends ConnectDataBase{

    public static function VerifyCode($email, $code) {
        try {
            $pdo = ConnectDataBase::ConnectDataBase();
            
            // Prepare and execute the query to fetch user data by email
            $stmt = $pdo->prepare("SELECT GenerateKey , GenerateKeyExpiration FROM Utilisateur WHERE Email = :Email AND Mdp IS NOT NULL");
            $stmt->bindParam(':Email', $email);
            $stmt->execute();
            
            // Fetch the result
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if($user) {

                // get time => should be < the expiration date
                $timezone = new DateTimeZone('Africa/Algiers');
                $currentDateTime = new DateTime('now', $timezone);
                $checkIfNotExpiredKey = $currentDateTime->format('Y-m-d H:i:s');
                // get time => should be < the expiration date

                // Email exists, now verify the code with hash
                if(password_verify($code, $user['GenerateKey']) && $checkIfNotExpiredKey <= $user['GenerateKeyExpiration']) {

                    
                    $token = static::generateKey(); // gerate token
                    static::updateProfileToken($email , $token); // update profile token
                    
                    session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION['token'] = $token;

                    return true; // Return true to indicate successful code
                } else {
                    // code is incorrect
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


    public static function generateKey() {
        $key = '';
        for ($i = 0; $i < 30; $i++) {
            $key .= random_int(0, 9);
        }
        return $key;
    }


    public static function updateProfileToken($email , $token) {
        $pdo = ConnectDataBase::ConnectDataBase();

        try {
            $stmt = $pdo->prepare(
                "UPDATE Utilisateur 
                SET 
                token = :token
                WHERE Email = :Email"
            );
            
            $stmt->bindParam(':token', password_hash($token, PASSWORD_DEFAULT));
            $stmt->bindParam(':Email', $email);

            return $stmt->execute();
        } catch (PDOException $e) {
            return false; // Return false indicating update failure
        }
    }
    

}



