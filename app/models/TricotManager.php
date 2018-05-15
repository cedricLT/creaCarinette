<?php
namespace Projet\Models;


class TricotManager extends Manager
{

    private $perPage = 5;
    private $cPage = 1;

    public function nbPage()
    {
        $bdd = $this->dbConnect();
        $reqPage = $bdd->query('SELECT COUNT(*) AS total FROM item WHERE categorie = "tricot"');
        $result = $reqPage->fetch();
        $total = $result['total'];
        $nbPage = ceil($total / $this->perPage);

        return $nbPage;
    }

    public function getTricots($cPage){
        $this->cPage = $cPage;
        $bdd = $this->dbConnect();
        $req = $bdd->query("SELECT idItem, title, contents, categorie, img,  DATE_FORMAT(postDates, '%d/%m/%Y') AS dates_fr FROM item   WHERE categorie = 'tricot'  ORDER BY idItem DESC LIMIT " . $this->perPage . " OFFSET " . ($this->cPage - 1) * $this->perPage);

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

    /*===================== page home dernier item tricot ===============================================================*/

    public function lastItemTricot()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT idItem, title, contents, img,  DATE_FORMAT(postDates, \' % d /%m /%Y\') AS dates_fr FROM item WHERE categorie = \'tricot\' ORDER BY idItem DESC');
        $req->execute(array());
        return $req;
    }

    /*================================= compte le nombre d article tricot =============================================*/
    public function nbrItemt()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT COUNT(categorie) FROM item WHERE categorie = \'tricot\'');
        $req->execute(array());
        return $req;
    }
}