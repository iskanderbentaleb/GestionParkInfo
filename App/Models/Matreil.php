<?php 

namespace App\Models ;
use PDO;
use PDOException;
use App\Models\DataBase\ConnectDataBase;


class Matreil extends ConnectDataBase{

    public static function latest($condition = NULL){

        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM matreil_view " . $condition);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);


    }
    


    public static function store($SSH , $Prix , $DateGarantie , $DateRec , $DurreeVie , $CodeMarque , $CodeType, $CodeBL){
        $pdo = ConnectDataBase::ConnectDataBase();
        try{
        $stmt = $pdo->prepare(
            "INSERT INTO Matreil (SSH, Prix , DateGarantie , DateRec , DurreeVie , CodeMarque , CodeType , CodeBL) 
            VALUES (:SSH, :Prix , :DateGarantie , :DateRec , :DurreeVie , :CodeMarque , :CodeType , :CodeBL)
        ");
        
        $stmt->bindParam(':SSH', $SSH);
        $stmt->bindParam(':Prix', $Prix);
        $stmt->bindParam(':DateGarantie', $DateGarantie);
        $stmt->bindParam(':DateRec', $DateRec);
        $stmt->bindParam(':DurreeVie', $DurreeVie);
        $stmt->bindParam(':CodeMarque', $CodeMarque);
        $stmt->bindParam(':CodeType', $CodeType);
        $stmt->bindParam(':CodeBL', $CodeBL);

        $result = $stmt->execute();
        return $result;
        } catch (PDOException $e) {
        return false; // Return false indicating deletion failure
        }
    }


    public static function edit($SSH){
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare("SELECT * FROM Matreil WHERE SSH = :SSH");
        $stmt->bindParam(":SSH",$SSH);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }



    public static function update($id , $SSH ,$Prix,$DateGarantie ,$DateRec ,$DurreeVie ,$CodeMarque ,$CodeType , $CodeBL){
        $pdo = ConnectDataBase::ConnectDataBase();
        try{
        $stmt = $pdo->prepare(
            "UPDATE Matreil 
            SET 
            SSH = :SSH , 
            Prix = :Prix ,
            DateGarantie = :DateGarantie ,
            DateRec = :DateRec ,
            DurreeVie = :DurreeVie ,
            CodeMarque = :CodeMarque ,
            CodeType = :CodeType ,
            CodeBL = :CodeBL 
            WHERE SSH = :id
            ");

        $stmt->bindParam(':SSH', $SSH);
        $stmt->bindParam(':Prix', $Prix);
        $stmt->bindParam(':DateGarantie', $DateGarantie);
        $stmt->bindParam(':DateRec', $DateRec);
        $stmt->bindParam(':DurreeVie', $DurreeVie);
        $stmt->bindParam(':CodeMarque', $CodeMarque);
        $stmt->bindParam(':CodeType', $CodeType);
        $stmt->bindParam(':CodeBL', $CodeBL);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }
    }



    public static function destroy($SSH){
        $pdo = ConnectDataBase::ConnectDataBase();
        try{
            $stmt = $pdo->prepare("DELETE FROM Matreil WHERE SSH = :SSH");
            $stmt->bindParam(':SSH', $SSH);
            $result = $stmt->execute();
            return $result;
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }

    }


    public static function updateReforme($SSH , $CodeRef){
        $pdo = ConnectDataBase::ConnectDataBase();
        try{
        $stmt = $pdo->prepare(
            "UPDATE Matreil 
            SET
            CodeRef = :CodeRef  
            WHERE SSH = :SSH
            ");
        $stmt->bindParam(':SSH', $SSH);
        $stmt->bindParam(':CodeRef', $CodeRef);
        return $stmt->execute();
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }
    }
    


    public static function ResetMatreilCodeRef($CodeRef){
        $pdo = ConnectDataBase::ConnectDataBase();
        try{
        $stmt = $pdo->prepare(
            "UPDATE Matreil 
            SET
            CodeRef = NULL  
            WHERE CodeRef = :CodeRef
            ");
        $stmt->bindParam(':CodeRef', $CodeRef);
        return $stmt->execute();
        } catch (PDOException $e) {
            return false; // Return false indicating deletion failure
        }
    }

    
    
}



