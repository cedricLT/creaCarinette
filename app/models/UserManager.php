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

    public function comUser($content, $idMember, $idItem)
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

    public function commentItemC($idItem)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT idPost, content, dates, post.idItem, firstname FROM post INNER JOIN users ON users.idUsers = post.idUsers  WHERE idItem = ?');
        $req->execute(array($idItem));
        return $req;

    }

    public function addTricotUser($firstname)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO users(firstname) VALUE(?)');
        $req->execute(array($firstname));
        return $req;
    }

    public function commentItemT($idItem)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT content,dates,firstname FROM post INNER JOIN users ON users.idUsers = post.idUsers WHERE idItem = ?');
        $req->execute(array($idItem));
        return $req;

    }

    /*=================================visitorBook==================================================================*/
    public function addContent($firstname, $lastname)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO users(firstname, lastname) VALUE(?, ?)');
        $req->execute(array($firstname, $lastname));
        return $req;
    }

    public function getVisitor()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->query('SELECT MAX(idUsers) FROM users');
        return $req;
    }

    public function addVisitorBook($content, $idMember)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO visitorbook(content, postDate, idUsers) VALUE(?, NOW(), ?)');
        $req->execute(array($content, $idMember));
        return $req;
    }

    public function addCommentBook()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT content, DATE_FORMAT(postDate,  \'%d/%m/%Y\') AS date_fr,firstname,lastname FROM visitorbook INNER JOIN users ON users.idUsers = visitorbook.idUsers');
        $req->execute(array());
        return $req;
    }

    /*======================================== mail ====================================================*/

    public function addMail($lastname, $firstname, $mail, $content)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO mail(dates, lastname, firstname,  mail, content ) VALUE(NOW(), ?, ?, ?, ?)');
        $req->execute(array($lastname, $firstname, $mail, $content));
        return $req;
    }

    /*====================== commentaires signalé ==========================================================*/

    public function reportUser($idPost)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE post SET report = (report + 1) WHERE idPost = ?');
        $req->execute(array($idPost));

        return $req;
    }






}

//SELECT content,postDate,firstname,lastname FROM visitorbook INNER JOIN users ON users.idUsers = visitorbook.idUsers