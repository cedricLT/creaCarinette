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
        $req = $bdd->prepare('SELECT idPost, content, dates, post.idItem, firstname, idParent FROM post INNER JOIN users ON users.idUsers = post.idUsers  WHERE idItem = ?');
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
        $req = $bdd->prepare('SELECT idPost, content, dates, post.idItem, firstname, idParent FROM post INNER JOIN users ON users.idUsers = post.idUsers WHERE idItem = ?');
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
        $req = $bdd->prepare('INSERT INTO visitorbook(content, postDate, report, idUsers) VALUE(?, NOW(), 0, ?)');
        $req->execute(array($content, $idMember));
        return $req;
    }

    public function addCommentBook()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT idVisitorBook, content, DATE_FORMAT(postDate,  \'%d/%m/%Y\') AS date_fr,firstname, lastname, visitorbook.idUsers FROM visitorbook INNER JOIN users ON users.idUsers = visitorbook.idUsers');
        $req->execute(array());
        return $req;
    }

    /*======================================== mail ====================================================*/

    public function addMail($lastname, $firstname, $mail, $content)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO contact( dates, lastname, firstname,  mail, content ) VALUE(NOW(), ?, ?, ?, ?)');
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

    /*=======================commentaire signalé livre d'or =====================================================*/

    public function reportUserBook($idVisitorBook)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE visitorbook SET report = (report + 1) WHERE idVisitorBook = ?');
        $req->execute(array($idVisitorBook));

        return $req;
    }

    /*=========================== repondre a un commentaire ==================================================*/

    public function repComUser($idParent, $content, $idMember, $idItem)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO post(content, dates, report, idUsers, idItem, idParent) VALUE(?, NOW(),0, ?, ?,?)');
        $req->execute(array($content, $idMember, $idItem, $idParent));
        return $req;
    }

    /*=============================== supprimer les commentaire a la suppression d'un item ====================*/

    public function deleteComItem($idItem)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM post  WHERE idItem = ?');
        $req->execute(array($idItem));
        return $req;
    }

    /*============================= supprimer commentaire livre d'or ===================================*/

    public function deleteComm($idVisitorBook)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM visitorbook  WHERE idVisitorBook = ?');
        $req->execute(array($idVisitorBook));
        return $req;
    }

    /*=============================== commentaire signalé pour l admin =============================*/

    public function reportCommentUser()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT idPost, content, dates, post.idItem, firstname, idParent, post.idUsers FROM post INNER JOIN users ON users.idUsers = post.idUsers  WHERE report>2');
        $req->execute(array());

        return $req;
    }
    /*============================ supprimer un commentaire signalé =========================*/

    public function deleteUserComment($idPost)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM post  WHERE idPost = ?');
        $req->execute(array($idPost));
        return $req;
    }

    public function deleteUser($idUsers)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM users  WHERE idUsers = ?');
        $req->execute(array($idUsers));
        return $req;
    }
}
