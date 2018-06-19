<?php

namespace Projet\Models;


class ItemsManager extends Manager
{

    private $perPage = 6;
    private $cPage = 1;

    public function nbPage($type)
    {
        $bdd = $this->dbConnect();
        $reqPage = $bdd->prepare('SELECT COUNT(*) AS total FROM item WHERE categorie = ?');
        $reqPage->execute(array($type));
        $result = $reqPage->fetch();
        $total = $result['total'];
        $nbPage = ceil($total / $this->perPage);

        return $nbPage;
    }

    public function getCreations($cPage, $type)
    {
        $this->cPage = $cPage;
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT idItem, title, contents, categorie, img,  DATE_FORMAT(postDates, '%d/%m/%Y') AS dates_fr FROM item   WHERE categorie = ?  ORDER BY idItem DESC LIMIT " . $this->perPage . " OFFSET " . ($this->cPage - 1) * $this->perPage);
        $req->execute(array($type));
        return $req;
    }


    public function item($idItem)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT idItem, title, contents, img, categorie,  DATE_FORMAT(postDates, \'%d/%m/%Y\') AS dates_fr FROM item WHERE idItem = ?');
        $req->execute(array($idItem));
        return $req->fetch();
    }

    public function newCreatItem($title, $content, $target_file, $article)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO item (title, contents, img, postDates, categorie) VALUES(?,?,?, NOW(), ?)');
        $req->execute(array($title, $content, $target_file, $article));
        return $req;
    }

    public function modifItem($idItem, $title, $content)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE item SET title = ?, contents = ? WHERE idItem = ?');
        $req->execute(array($title, $content, $idItem));
        return $req;
    }

    public function modifImgItem($idItem, $target_file)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE item SET img = ? WHERE idItem = ?');
        $req->execute(array($target_file, $idItem));
        return $req;
    }
    /*=========================== supprimer un item ====================================================*/
    public function delete($idItem)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM item  WHERE idItem = ?');
        $req->execute(array($idItem));
        return $req;
    }

    /*============================ home view item ======================================================*/

    public function lastItemCrochet()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT idItem, title, contents, img,  DATE_FORMAT(postDates, \' % d /%m /%Y\') AS dates_fr FROM item WHERE categorie = \'crochet\' ORDER BY idItem DESC');
        $req->execute(array());
        return $req;
    }

    /*================================= compte le nombre d article crochet =============================================*/
    public function nbrItemC($type)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT COUNT(idItem) FROM item WHERE categorie = ?');
        $req->execute(array($type));
        return $req;
    }

    public function nbrItemCrochet()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT COUNT(idItem) FROM item WHERE categorie = "crochet"');
        $req->execute(array());
        return $req;
    }
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