<?php
namespace Projet\Models;


class TricotManager extends Manager
{
    public function getTricots(){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT idItem, title, content, img,  DATE_FORMAT(postDates, \'%d/%m/%Y\') AS dates_fr, categorie FROM item WHERE categorie = "tricot" ORDER BY postDates');
        $req->execute(array());
        return $req;
    }

    public function itemTricot($idItem){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT idItem, title, content, img,  DATE_FORMAT(postDates, \'%d/%m/%Y\') AS dates_fr FROM item WHERE idItem = ?');
        $req->execute(array($idItem));
        return $req->fetch();
    }

    public function newCreatTricot($title, $content, $target_file)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO item (title, content, img, postDates, categorie) VALUES(?,?,?, NOW(), "tricot")');
        $req->execute(array($title, $content, $target_file));
        return $req;
    }


}