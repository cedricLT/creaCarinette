<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

try {
    $controleurUser = new \Projet\Controllers\ControllerUser(); //objet controler

    if (isset($_GET['action'])) {
        // recuperation des items crochet page crochet
        if ($_GET['action'] == 'crochet')
        {
            if (isset($_GET['p']))
            {
                $cPage = $_GET['p'];
            }
            else {
                $cPage = 1;
            }
            $controleurUser->crochets($cPage);

        }
        // recuperation des items tricot page tricot
        elseif ($_GET['action'] == 'tricots') {
            if (isset($_GET['p']))
            {
                $cPage = $_GET['p'];
            }
            else {
                $cPage = 1;
            }
            $controleurUser->tricots($cPage);
        }
        // recuperation d un item tricot
        elseif ($_GET['action'] == 'itemTricot') {
            $idItem = htmlspecialchars($_GET['idItem']);
            if (isset($idItem) && $idItem > 0) {
                $controleurUser->tricot($idItem);
            } else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        } // recuperation d un item crochet
        elseif ($_GET['action'] == 'itemCrochet') {
            $idItem = htmlspecialchars($_GET['idItem']);
            if (isset($idItem) && $idItem > 0) {
                $controleurUser->crochet($idItem);
            } else {
                echo 'Erreur de chargement!';
            }
        } // injection des commentaire par item crochet dans la bdd et recup sur ItemCrochetView
        elseif ($_GET['action'] == 'commentCrochet') {
            $idItem = htmlspecialchars($_GET['idItem']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $content = htmlspecialchars($_POST['content']);
            if (!empty($firstname) && (!empty($content))) {
                $controleurUser->addcommentCrochet($idItem, $firstname, $content);
            }else {
                throw new Exception('tous les champs ne sont pas remplis');
            }

        } // injection des commentaire par item tricot dans la bdd et recup sur ItemtricotView
        elseif ($_GET['action'] == 'commentTricot') {
            $idItem = htmlspecialchars($_GET['idItem']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $content = htmlspecialchars($_POST['content']);
            if (!empty($firstname) && (!empty($content))) {
                $controleurUser->addcommentTricot($idItem, $firstname, $content);
            } else {
                throw new Exception('tous les champs ne sont pas remplis');
            }
        }
        elseif ($_GET['action'] == 'book') {
            if (isset($_GET['p']))
            {
                $cPage = $_GET['p'];
            }
            else {
                $cPage = 1;
            }
            $controleurUser->commentUsersBook($cPage);
        }
        // injecte les commentaire du livre d'or dans la bdd
        elseif ($_GET['action'] == 'commentBook') {
            $firstname = htmlspecialchars($_POST['firstnameBook']);
            $lastname = htmlspecialchars($_POST['lastnameBook']);
            $content = htmlspecialchars($_POST['contentBook']);
            if (!empty($firstname) && (!empty($lastname) && (!empty($content)))) {
                $controleurUser->commentBook($firstname, $lastname, $content);
            } else {
                throw new Exception('tous les champs ne sont pas remplis');
            }
        }
        elseif ($_GET['action'] == 'contact') {
            $controleurUser->contactUsers();
        } /*elseif ($_GET['action'] == 'contactMail'){ //formulaire contact mail
            $lastname = $_POST['name'];
            $firstname = $_POST['prenom'];
            $mail = $_POST['email'];
            $content = $_POST['message'];

            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
            $headers .= "From: $lastname <$mail>\r\nReply-to : $lastname <$mail>\nX-Mailer:PHP";

            $destinataire =" ced533@msn.com";
            $body="$content";

            if (mail($destinataire,$body,$headers)) {
                echo "Votre mail a été envoyé";
                require 'app/views/frontend/contactView.php';
            } else {
                echo "Une erreur s'est produite";
            }

        }*/
        // envois de mail dans la bdd
        elseif ($_GET['action'] == 'contactMail') {
            $lastname = htmlspecialchars($_POST['name']);
            $firstname = htmlspecialchars($_POST['prenom']);
            $mail = htmlspecialchars($_POST['email']);
            $content = htmlspecialchars($_POST['message']);
            if (!empty($lastname) && (!empty($firstname) && (!empty($mail) && (!empty($content))))) {
                $controleurUser->contactMail($lastname, $firstname, $mail, $content);
            } else {
                throw new Exception('tous les champs ne sont pas remplis');
            }
        } // signaler un commentaire dans item Crochet
        elseif ($_GET['action'] == 'reportCommentCrochet') {
            $idItem = htmlspecialchars($_GET['idItem']);
            $idPost = htmlspecialchars($_GET['idPost']);

            $controleurUser->reportCommentCrochet($idItem, $idPost);

        } // signaler un commentaire dans item tricot
        elseif ($_GET['action'] == 'reportCommentTricot') {
            $idItem = htmlspecialchars($_GET['idItem']);
            $idPost = htmlspecialchars($_GET['idPost']);
            $controleurUser->reportCommentTricot($idItem, $idPost);

        } elseif ($_GET['action'] == 'reportCommentBook') {
            $idVisitorBook = htmlspecialchars($_GET['idVisitorBook']);

            $controleurUser->reportBook($idVisitorBook);
        } //repondre a un commentaire  item crochet
        elseif ($_GET['action'] == 'repCommentCrochet') {
            $idParent = htmlspecialchars($_GET['idPostParent']);
            $idItem = htmlspecialchars($_GET['idItem']);
            $firstname = htmlspecialchars($_POST['repPrenom']);
            $content = htmlspecialchars($_POST['content']);
            if (!empty($firstname) && (!empty($content))) {
                $controleurUser->repCommentCrochet($idParent, $idItem, $firstname, $content);
            } else {
                throw new Exception('tous les champs ne sont pas remplis');
            }

        } //repondre a un commentaire item Tricot
        elseif ($_GET['action'] == 'repCommentTricot') {
            $idParent = htmlspecialchars($_GET['idPostParent']);
            $idItem = htmlspecialchars($_GET['idItem']);
            $firstname = htmlspecialchars($_POST['repPrenom']);
            $content = htmlspecialchars($_POST['content']);
            if (!empty($firstname) && (!empty($content))) {
                $controleurUser->repCommentTricot($idParent, $idItem, $firstname, $content);
            } else {
                throw new Exception('tous les champs ne sont pas remplis');
            }

        }


    } else {
        require 'app/views/frontend/homeView.php';
    }


} catch (Exception $e) {
    require 'app/views/frontend/error.php';
}
