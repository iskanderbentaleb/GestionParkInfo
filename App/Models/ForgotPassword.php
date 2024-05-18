<?php 

namespace App\Models ;

use PDO;
use DateTime;
use DateInterval;
use DateTimeZone;
use PDOException;
use Dotenv\Dotenv;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use App\Models\DataBase\ConnectDataBase;

require __DIR__ . '../../../vendor/autoload.php' ;
$dotenv = Dotenv::createImmutable(__DIR__ . '../../../');
$dotenv->load();

class ForgotPassword extends ConnectDataBase{

    public static function sendMail($email) {
        try {
            $pdo = ConnectDataBase::ConnectDataBase();
            
            // Prepare and execute the query to fetch user data by email
            $stmt = $pdo->prepare("SELECT * FROM Utilisateur WHERE Email = :Email AND Mdp IS NOT NULL");
            $stmt->bindParam(':Email', $email);
            $stmt->execute();
            
            // Fetch the result
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if($user) {
                // --------------- send Email Here -------------------------
                $mail = new PHPMailer(true);

                try {

                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_OFF;                         // Disable verbose debug output for production
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
                    $mail->SMTPAuth   =  true;                                  //Enable SMTP authentication
                    $mail->Username   = $_ENV["EMAIL_ADRESS"];                  //SMTP username
                    $mail->Password   = $_ENV["PASSWORD_APP"];                  //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                    //Recipients
                    $mail->setFrom($_ENV["EMAIL_ADRESS"] , "GESTION DU PARC INFORMATIQUE");
                    $mail->addAddress($email);
                    
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = "GPI SONATRACH";
                    $keyGenerated = ForgotPassword::generateKey();
                    $mail->Body = ForgotPassword::MailDesignHTML($keyGenerated);
                    ForgotPassword::updateProfileKey( $user['CodeUt'] ,  $keyGenerated);
                    $mail->send();
                    return true;

                } catch (Exception $e) {
                    return false;
                    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                // --------------- send Email Here -------------------------
            } else {
                // Email does not exist
                return false;
            }
        } catch (PDOException $e) {
            // Handle database errors
            return false;
        }
    }

    public static function MailDesignHTML($key) {
        return 
        '
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    margin: 0;
                    padding: 0;
                }
                .container {
                    width: 100%;
                    max-width: 600px;
                    margin: 0 auto;
                    background-color: #ffffff;
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                .header {
                    text-align: center;
                    padding: 10px 0;
                    border-bottom: 1px solid #dddddd;
                }
                .header h1 {
                    margin: 0;
                    color: #333333;
                }
                .content {
                    padding: 20px;
                    color: #555555;
                    line-height: 1.6;
                }
                .content p {
                    margin: 0 0 10px;
                }
                .image-container {
                    text-align: center;
                    margin-bottom: 20px;
                }
                .footer {
                    text-align: center;
                    padding: 10px 0;
                    border-top: 1px solid #dddddd;
                    font-size: 12px;
                    color: #999999;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="image-container">
                    <img src="https://sonatrach.com/img/header/sonatrach.png" alt="Description of Image" style="max-width: 100%; height: auto;">
                </div>
                <div class="header">
                    <h1>
                    GPI SONATRACH
                    </h1>
                </div>
                <div class="content">
                
                <center> 
                    <h2>'. $key .'</h2></br>
                    <h3>Est votre code de vérification GPI Sonatrach.</h3>
                </center>
                
                </div>
                <div class="footer">
                    <p>&copy; 2024 Sonatrach. Tous droits réservés.</br>
                    <p>Par Iskander Bentaleb - Hamidi Sihem</p></p>
                </div>
            </div>
        </body>
        </html>
        ';
    }

    public static function generateKey() {
        $key = '';
        for ($i = 0; $i < 8; $i++) {
            $key .= random_int(0, 9);
        }
        return $key;
    }

    public static function updateProfileKey($CodeUt , $GenerateKey) {
        $pdo = ConnectDataBase::ConnectDataBase();
        
        $timezone = new DateTimeZone('Africa/Algiers');
        $currentDateTime = new DateTime('now', $timezone);
        $currentDateTime->add(new DateInterval('PT5M'));
        $GenerateKeyExpiration = $currentDateTime->format('Y-m-d H:i:s');

        try {
            $stmt = $pdo->prepare(
                "UPDATE Utilisateur 
                SET 
                GenerateKey = :GenerateKey,
                GenerateKeyExpiration = :GenerateKeyExpiration 
                WHERE CodeUt = :CodeUt"
            );
            
            $stmt->bindParam(':GenerateKey', password_hash($GenerateKey, PASSWORD_DEFAULT));
            $stmt->bindParam(':GenerateKeyExpiration', $GenerateKeyExpiration);
            $stmt->bindParam(':CodeUt', $CodeUt);

            return $stmt->execute();
        } catch (PDOException $e) {
            return false; // Return false indicating update failure
        }
    }



}



