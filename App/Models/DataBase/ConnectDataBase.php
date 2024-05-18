<?php

namespace App\Models\DataBase;
use Dotenv\Dotenv;
use PDO , PDOException;

// use .env
require __DIR__ . '../../../../vendor/autoload.php' ;
$dotenv = Dotenv::createImmutable(__DIR__ . '../../../../');
$dotenv->load();
// use .env




class ConnectDataBase {

    private static $username;
    private static $password;
    private static $dsn;
    private static $isConnectedDB ;

    public static function initialize()
    {
        self::$username = $_ENV["DB_USERNAME"];
        self::$password = $_ENV["DB_PASSWORD"];
        $dataBase = $_ENV["DB_CONNECTION"]; 
        $host = $_ENV["DB_HOST"];
        $port = $_ENV["DB_PORT"];
        $database = $_ENV["DB_DATABASE"];
        self::$dsn = "$dataBase:host=$host;port=$port;dbname=$database";
    }


    public static function ConnectDataBase(){
        try {
        if(is_null(static::$isConnectedDB)){
            
            ConnectDataBase::initialize(); 

            $pdo = new PDO(static::$dsn , static::$username , static::$password );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            static::$isConnectedDB = $pdo;
        }  
        $pdo = static::$isConnectedDB;
        return $pdo;
        }
        catch(PDOException $e)
        {
        return "Connection failed: " . $e->getMessage();
        }
    }



}

