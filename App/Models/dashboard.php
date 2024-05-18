<?php 

namespace App\Models ;
use PDO;
use PDOException;
use App\Models\DataBase\ConnectDataBase;


class dashboard extends ConnectDataBase{

    public static function MatreilCount(){
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare(" SELECT count(*) as MatreilCount FROM Matreil ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function CommandeCount(){
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare(" SELECT count(*) as CommandeCount FROM commnade ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function FournisseurCount(){
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare(" SELECT count(*) as FournisseurCount FROM Fournisseur ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function BonLivraisonCount(){
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare(" SELECT count(*) as BonLivraisonCount FROM BonLivraison ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function UtilisateurSimpleCount(){
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare(" SELECT count(*) as UtilisateurSimpleCount FROM Utilisateur WHERE Mdp is null");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function UtilisateurAdminCount(){
        $pdo = ConnectDataBase::ConnectDataBase();
        $stmt = $pdo->prepare(" SELECT count(*) as UtilisateurAdminCount FROM Utilisateur WHERE Mdp is not null");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    
}



