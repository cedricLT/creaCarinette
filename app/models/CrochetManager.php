<?php
namespace Projet\Models;



class CrochetManager extends Manager
{
    public function getCrochets()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT idItem, title, content, img,  DATE_FORMAT(postDates, \'%d/%m/%Y\') AS dates_fr, categorie FROM item  WHERE categorie = "crochet" ORDER BY postDates');
        $req->execute(array());
        return $req;
    }


    public function itemCrochet($idItem)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT idItem, title, content, img,  DATE_FORMAT(postDates, \'%d/%m/%Y\') AS dates_fr FROM item WHERE idItem = ?');
        $req->execute(array($idItem));
        return $req->fetch();
    }
}