<?php 

namespace App\Models ;
use PDO;
use PDOException;
use App\Models\DataBase\ConnectDataBase;


class EtatReparation extends ConnectDataBase{

    public static function latest($Order = "ASC"){
        if($Order !== "DESC" AND $Order !==  "ASC"){ $Order = "ASC"; }
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM etatReparation ORDER BY Designation $Order");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}



