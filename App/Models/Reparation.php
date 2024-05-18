<?php 

namespace App\Models ;
use PDO;
use PDOException;
use App\Models\DataBase\ConnectDataBase;


class Reparation extends ConnectDataBase{


    public static function latest($Order = "ASC"){
        if($Order !== "DESC" AND $Order !==  "ASC"){ $Order = "ASC"; }
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM reparation_v ORDER BY CodeRep $Order");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public static function store($Date , $observation , $tecnicien , $matreil , $EtatReparation){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
            $stmt = $pdo->prepare(
                "INSERT INTO Reparation (
                Date,Obs,SSH,CodeUtilisateur,codeetat
                ) 
                VALUES (
                :Date ,:Obs,:SSH,:CodeUtilisateur,:codeetat
                )"
            );
            
            $stmt->bindParam(':Date', $Date);
            $stmt->bindParam(':Obs', $observation);
            $stmt->bindParam(':CodeUtilisateur', $tecnicien);
            $stmt->bindParam(':SSH', $matreil);
            $stmt->bindParam(':codeetat', $EtatReparation);
    
            $result = $stmt->execute();
            
            if ($result) {
                // Fetch the last inserted ID (CodeDech)
                $lastInsertedId = $pdo->lastInsertId();
                return $lastInsertedId;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false; // Return false indicating insertion failure
        }
    }
    


    public static function edit($CodeRep){
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM reparation_v WHERE CodeRep = :CodeRep");
        $stmt->bindParam(":CodeRep",$CodeRep);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }



    public static function update($CodeRep , $Date , $observation ,$tecnicien ,$matreil , $EtatReparation){
        $pdo = ConnectDataBase::ConnectDataBase();
        try {
            $stmt = $pdo->prepare(
                "UPDATE Reparation 
                SET
                Date = :Date ,
                Obs = :Obs ,
                SSH = :SSH ,
                CodeUtilisateur = :CodeUtilisateur ,
                codeetat = :codeetat
                WHERE CodeRep = :CodeRep
                ");

            $stmt->bindParam(':CodeRep', $CodeRep);
            $stmt->bindParam(':Date', $Date);
            $stmt->bindParam(':Obs', $observation);
            $stmt->bindParam(':SSH', $matreil);
            $stmt->bindParam(':CodeUtilisateur', $tecnicien);
            $stmt->bindParam(':codeetat', $EtatReparation);
            

            return $stmt->execute();
        } catch (PDOException $e) {
            return false; // Return false indicating update failure
        }
    }
    



    public static function destroy($CodeRep){
        $pdo = ConnectDataBase::ConnectDataBase();
        try{
            $stmt = $pdo->prepare("DELETE FROM Reparation WHERE CodeRep = :CodeRep");
            $stmt->bindParam(':CodeRep', $CodeRep);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }

    }


    


    
    
}



