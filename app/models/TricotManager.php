<?php
require_once('app/models/model.php');

class TricotManager extends Manager
{
    public function getTricots(){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT idItem, title, content, img,  DATE_FORMAT(postDates, \'%d/%m/%Y\') AS dates_fr, categorie FROM item WHERE categorie = "tricot" ORDER BY postDates');
        $req->execute(array());
        return $req;
    }

    public function itemTricot($id){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT idItem, title, content, img,  DATE_FORMAT(postDates, \'%d/%m/%Y\') AS dates_fr FROM item WHERE idItem = ?');
        $req->execute(array($id));
        return $req->fetch();
    }

}