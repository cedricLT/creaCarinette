<?php
namespace Projet\Models;


class UserManager extends Manager
{
    public function addCrochetUser($firstname)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO users(firstname) VALUE(?)');
        $req->execute(array($firstname));
        return $req;
    }

    public function comUser($content,$idMember, $idItem)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO post(content, dates, report, idItem, idUsers) VALUE(?, NOW(),0, ?, ?)');
        $req->execute(array($content, $idItem, $idMember));
        return $req;
    }

    public function getId()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->query('SELECT MAX(idUsers) FROM users');
        return $req;
    }

    public function commentItem($idItem)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT content,dates,firstname FROM post INNER JOIN users ON users.idUsers = post.idUsers WHERE idItem = ?');
        $req->execute(array($idItem));
        return $req;

    }
}//SELECT * FROM post INNER JOIN users on post.idUsers = users.firstname