<?php
namespace Projet\Models;


class TricotManager extends Manager
{
    public function getTricots(){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT idItem, title, contents, img,  DATE_FORMAT(postDates, \'%d/%m/%Y\') AS dates_fr, categorie FROM item WHERE categorie = "tricot" ORDER BY idItem DESC ');
        $req->execute(array());
        return $req;
    }

    public function itemTricot($idItem){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT idItem, title, contents, img,  DATE_FORMAT(postDates, \'%d/%m/%Y\') AS dates_fr FROM item WHERE idItem = ?');
        $req->execute(array($idItem));
        return $req->fetch();
    }

    public function newCreatTricot($title, $content, $target_file)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO item (title, contents, img, postDates, categorie) VALUES(?,?,?, NOW(), "tricot")');
        $req->execute(array($title, $content, $target_file));
        return $req;
    }

    public function deleteTricot($idItem)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM item  WHERE idItem = ?');
        $req->execute(array($idItem));
        return $req;
    }

    public function modifTricot($idItem, $title, $content)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE item SET title = ?, contents = ? WHERE idItem = ?');
        $req->execute(array($title, $content, $idItem));
        return $req;
    }

    public function modifImgTricot($idItem, $target_file)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE item SET img = ? WHERE idItem = ?');
        $req->execute(array($target_file, $idItem));
        return $req;
    }
}