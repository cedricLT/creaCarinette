<?php

namespace Projet\Models;


class UserManager extends Manager
{

    private $perPage = 6;
    private $cPage = 1;

    public function commentUser($firstname)
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

    public function commentItem($idItem)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT idPost, content, post.idItem, firstname, idParent, DATE_FORMAT(dates, \'%d/%m/%Y\') AS dates_fr FROM post INNER JOIN users ON users.idUsers = post.idUsers  WHERE idItem = ? ORDER BY idPost DESC ');
        $req->execute(array($idItem));
        return $req;

    }

    /*=========================== tous les commentaires pour l admin ===============================================*/

    public function nbPageComment()
    {
        $bdd = $this->dbConnect();
        $reqPage = $bdd->query('SELECT COUNT(*) AS total FROM post WHERE idPost');
        $result = $reqPage->fetch();
        $total = $result['total'];
        $nbPage = ceil($total / $this->perPage);

        return $nbPage;
    }

    public function commentpostUsers($cPage)
    {
        $this->cPage = $cPage;
        $bdd = $this->dbConnect();
        $req = $bdd->query("SELECT idPost, content, title, DATE_FORMAT(dates, '%d/%m/%Y') AS date_fr, post.idItem, firstname, idParent, categorie, users.idUsers FROM post INNER JOIN users ON users.idUsers = post.idUsers INNER JOIN item ON item.idItem = post.idItem ORDER BY idUsers DESC LIMIT " . $this->perPage . " OFFSET " . ($this->cPage - 1) * $this->perPage);

        return $req;
    }

    /*=================================visitorBook==================================================================*/


    public function nbPagebook()
    {
        $bdd = $this->dbConnect();
        $reqPage = $bdd->query('SELECT COUNT(*) AS total FROM visitorbook');
        $result = $reqPage->fetch();
        $total = $result['total'];
        $nbPage = ceil($total / $this->perPage);

        return $nbPage;
    }


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


    public function addCommentBook($cPage)
    {
        $this->cPage = $cPage;
        $bdd = $this->dbConnect();
        $req = $bdd->query("SELECT idVisitorBook, content, DATE_FORMAT(postDate,  '%d/%m/%Y') AS date_fr,firstname, lastname, visitorbook.idUsers FROM visitorbook INNER JOIN users ON users.idUsers = visitorbook.idUsers  ORDER BY idVisitorBook DESC LIMIT " . $this->perPage . " OFFSET " . ($this->cPage - 1) * $this->perPage);
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

    public function getUserPost($idItem)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT idUsers FROM post WHERE idItem = ?');
        $req->execute(array($idItem));
        return $req;
    }
    public function deleteIdUsers($idUsers)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM users  WHERE idUsers = ?');
        $req->execute(array($idUsers));
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

    public function nbPageCommentReport()
    {
        $bdd = $this->dbConnect();
        $reqPage = $bdd->query('SELECT COUNT(*) AS total FROM post WHERE report > 2');
        $result = $reqPage->fetch();
        $total = $result['total'];
        $nbPage = ceil($total / $this->perPage);

        return $nbPage;
    }


    public function reportCommentUser($cPage)
    {
        $this->cPage = $cPage;
        $bdd = $this->dbConnect();
        $req = $bdd->query("SELECT idPost, content, DATE_FORMAT(dates,  '%d/%m/%Y') AS date_fr, post.idItem, firstname, idParent, post.idUsers FROM post INNER JOIN users ON users.idUsers = post.idUsers  WHERE report > 2 ORDER BY idPost  DESC LIMIT " . $this->perPage . " OFFSET " . ($this->cPage - 1) * $this->perPage);

        return $req;
    }

    /*============================ supprimer commentaire admin parents et enfants signaler ou non =========================*/

    public function deleteUserComment($idPost)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM post  WHERE idPost = ?');
        $req->execute(array($idPost));
        return $req;
    }

    public function deleteUserParent($idParent)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM post  WHERE idParent = ?');
        $req->execute(array($idParent));
        return $req;
    }

    public function  getUserParent($idPost)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT idUsers FROM post WHERE idParent = ?');
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

    /*============================ message signalé sur livre d'or =======================================*/

    public function nbPageReportBook()
    {
        $bdd = $this->dbConnect();
        $reqPage = $bdd->query('SELECT COUNT(*) AS total FROM visitorbook WHERE report > 2');
        $result = $reqPage->fetch();
        $total = $result['total'];
        $nbPage = ceil($total / $this->perPage);

        return $nbPage;
    }


    public function reportComment($cPage)
    {
        $this->cPage = $cPage;
        $bdd = $this->dbConnect();
        $req = $bdd->query("SELECT idVisitorBook, content, DATE_FORMAT(postDate,  '%d/%m/%Y') AS date_fr ,firstname, lastname, visitorbook.idUsers FROM visitorbook INNER JOIN users ON users.idUsers = visitorbook.idUsers  WHERE report > 2 ORDER BY idVisitorBook DESC LIMIT " . $this->perPage . " OFFSET " . ($this->cPage - 1) * $this->perPage);

        return $req;
    }

    /*========================== connexion admin ==============================================*/

    public function recupMdp($pseudo, $mdp)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT idUsers, firstname, pass FROM users  WHERE firstname=?');
        $req->execute(array($pseudo));

        return $req;
    }


    /*================================= creation admin ========================================*/

    public function creatMdpAdmin($firstname, $pass)
    {
        $bdd = $this->dbConnect();
        $mdp = $bdd->prepare('INSERT INTO users (firstname, pass, status)  VALUE (?, ?, 1)');
        $mdp->execute(array($firstname, $pass));

        return $mdp;
    }

    /*=========================== page new name admin ==================================*/

    public function newNameAd($idUsers)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT firstname FROM users WHERE idUsers = ?');
        $req->execute(array($idUsers));

        return $req;
    }

    /*=============================== nouveau nom admin ============================================*/

    public function newAdminNAme($idUsers, $firstname)
    {
        $bdd = $this->dbConnect();
        $name = $bdd->prepare('UPDATE users SET firstname = ? WHERE idUsers = ?');
        $name->execute(array($firstname, $idUsers));
        return $name;
    }

    /*==================== recup mdp admin ===========================================*/

    public function newMdpAdmin($idUsers)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT idUsers, firstname, pass FROM users  WHERE idUsers=?');
        $req->execute(array($idUsers));

        return $req;
    }

    /*=========================== nouveau mot de passe ==========================================*/

    public function changePass($idMember, $newPass)
    {
        $db = $this->dbConnect();
        $changePass = $db->prepare('UPDATE users SET pass=? WHERE idUsers=?');
        $changePass->execute(array($newPass, $idMember));
        return $changePass;
    }

    /*=========================== compte le nombre de commentaires ==============================*/

    public function nbrComents()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT COUNT(content) FROM post WHERE idItem');
        $req->execute(array());
        return $req;
    }

    /*=========================== compte le nombre de commentaires signalés ==============================*/

    public function nbrReportComment()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT COUNT(content) FROM post WHERE report > 2');
        $req->execute(array());
        return $req;
    }

    /*=========================== compte le nombre de messages livre d'or ==============================*/

    public function nbrVisitorBook()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT COUNT(content) FROM visitorBook WHERE idVisitorBook');
        $req->execute(array());
        return $req;
    }

    /*=========================== compte le nombre de messages signalés livre d'or ==============================*/

    public function nbrReportCommentBook()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT COUNT(content) FROM visitorBook WHERE report > 2');
        $req->execute(array());
        return $req;
    }

    /*================================= page emailView.php ========================================*/

    public function nbPagemail()
    {
        $bdd = $this->dbConnect();
        $reqPage = $bdd->query('SELECT COUNT(*) AS total FROM contact WHERE idContact');
        $result = $reqPage->fetch();
        $total = $result['total'];
        $nbPage = ceil($total / $this->perPage);

        return $nbPage;
    }

    public function mailAdmin($cPage)
    {
        $this->cPage = $cPage;
        $bdd = $this->dbConnect();
        $req = $bdd->query("SELECT idContact, lastname, firstname, mail, content, DATE_FORMAT(dates, '%d/%m/%Y') AS date_fr FROM contact ORDER BY idContact  DESC LIMIT " . $this->perPage . " OFFSET " . ($this->cPage - 1) * $this->perPage);

        return $req;
    }

    /*====================================== supprimer un mail ===========================================*/

    public function deleteMailUser($idContact)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM contact WHERE idContact = ?');
        $req->execute(array($idContact));
        return $req;
    }

    /*================================ nombres de mail  ====================================*/

    public function nbrUserMail()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT COUNT(content) FROM contact WHERE idContact');
        $req->execute(array());
        return $req;
    }

    /*========================= new text home =============================================================*/

    public function contentHome($content)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE home SET content = ? WHERE idHome = 1');
        $req->execute(array($content));
        return $req;
    }

    /*======================== affichage new text home ====================================================*/

    public function readContentHome()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT content FROM home WHERE idHome = 1');
        $req->execute(array());
        return $req->fetch();
    }

    /*========================= new img home ====================================*/

    public function newImgHome($target_file)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('UPDATE home SET img = ? WHERE idHome = 1');
        $req->execute(array($target_file));
        return $req;
    }

    /*========================= img home ====================================*/

    public function imgHome()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT img FROM home WHERE idHome = 1');
        $req->execute(array());
        return $req;
    }

    /*============================ page des publications users ==============================================*/
    public function lookPublication($cPage)
    {
        $this->cPage = $cPage;
        $bdd = $this->dbConnect();
        $req = $bdd->query("SELECT idItem, title, contents, img, DATE_FORMAT(postDates, '%d/%m/%Y') AS dates_fr FROM item WHERE categorie = 'publication' ORDER BY idItem  DESC LIMIT " . $this->perPage . " OFFSET " . ($this->cPage - 1) * $this->perPage);
        return $req;
    }

    public function nbPagePublis()
    {
        $bdd = $this->dbConnect();
        $reqPage = $bdd->query('SELECT COUNT(*) AS total FROM publication WHERE idPublication');
        $result = $reqPage->fetch();
        $total = $result['total'];
        $nbPage = ceil($total / $this->perPage);

        return $nbPage;
    }

    /*============================== nombre de publications ===============================================*/

    public function nbrPubliation()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT COUNT(idItem) FROM item WHERE categorie = 'publication'");
        $req->execute(array());
        return $req;
    }

    /*======================================= delete publication =============================================*/

    public function deletePublication($idPublication)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('DELETE FROM publication WHERE idPublication = ?');
        $req->execute(array($idPublication));
        return $req;
    }

    /*=============================== email json ajax ==============================================*/

    public function mailAdmin2()
    {

        $bdd = $this->dbConnect();
        $req = $bdd->query("SELECT idContact, lastname, firstname, mail, content, DATE_FORMAT(dates, '%d/%m/%Y') AS date_fr FROM contact ORDER BY idContact ");

        return $req;
    }

}
