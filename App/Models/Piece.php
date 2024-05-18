<?php 

namespace App\Models ;
use PDO;
use PDOException;
use App\Models\DataBase\ConnectDataBase;


class Piece extends ConnectDataBase{

    public static function latest(){

        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM Piece");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
}



