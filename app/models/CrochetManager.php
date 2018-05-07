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

    public function newCreatCrochet($title, $content, $target_file)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO item (title, content, img, postDates, categorie) VALUES(?,?,?, NOW(), "crochet")');
        $req->execute(array($title, $content, $target_file));
        return $req;
    }

    public function modifCrochet($idItem, $title, $content)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE item SET title = ?, content = ? WHERE idItem = ?');
        $req->execute(array($title, $content, $idItem));
        return $req;
    }

    public function modifImgCrochet($idItem, $target_file)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE item SET img = ? WHERE idItem = ?');
        $req->execute(array($target_file, $idItem));
        return $req;
    }

    public function deleteCrochet($idItem)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM item  WHERE idItem = ?');
        $req->execute(array($idItem));
        return $req;
    }
}