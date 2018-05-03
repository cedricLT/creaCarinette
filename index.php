<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

try {
    $controleurUser = new \Projet\Controllers\ControllerUser(); //objet controler

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'crochet') { // recuperation des items crochet page crochet
            $controleurUser->crochets();
        } elseif ($_GET['action'] == 'tricots') { // recuperation des items tricot page tricot
            $controleurUser->tricots();
        } elseif ($_GET['action'] == 'itemTricot') { // recuperation d un item tricot
            $idItem = htmlspecialchars($_GET['idItem']);
            if (isset($idItem) && $idItem > 0) {
                $controleurUser->tricot($idItem);
            } else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        } elseif ($_GET['action'] == 'itemCrochet') { // recuperation d un item crochet
            $idItem = htmlspecialchars($_GET['idItem']);
            if (isset($idItem) && $idItem > 0) {
                $controleurUser->crochet($idItem);
            } else {
                echo 'Erreur de chargement!';
            }
        } elseif ($_GET['action'] == 'commentCrochet') { // injection des commentaire par item crochet dans la bdd et recup sur ItemCrochetView
            $idItem = htmlspecialchars($_GET['idItem']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $content = htmlspecialchars($_POST['content']);
            if (!empty($firstname) && (!empty($content))) {
                $controleurUser->addcommentCrochet($idItem, $firstname, $content);
            } else {
                throw new Exception('tous les champs ne sont pas remplis');
            }

        } elseif ($_GET['action'] == 'commentTricot') {// injection des commentaire par item tricot dans la bdd et recup sur ItemtricotView
            $idItem = htmlspecialchars($_GET['idItem']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $content = htmlspecialchars($_POST['content']);
            if (!empty($firstname) && (!empty($content))) {
                $controleurUser->addcommentTricot($idItem, $firstname, $content);
            } else {
                throw new Exception('tous les champs ne sont pas remplis');
            }
        } elseif ($_GET['action'] == 'book') {
            $controleurUser->commentUsersBook();
        } elseif ($_GET['action'] == 'commentBook') { // injecte les commentaire du livre d'or dans la bdd
            $firstname = htmlspecialchars($_POST['firstnameBook']);
            $lastname = htmlspecialchars($_POST['lastnameBook']);
            $content = htmlspecialchars($_POST['contentBook']);
            if (!empty($firstname) && (!empty($lastname) && (!empty($content)))) {
                $controleurUser->commentBook($firstname, $lastname, $content);
            } else {
                throw new Exception('tous les champs ne sont pas remplis');
            }
        } elseif ($_GET['action'] == 'contact') {
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
        elseif ($_GET['action'] == 'contactMail') { // envois de mail dans la bdd
            $lastname = htmlspecialchars($_POST['name']);
            $firstname = htmlspecialchars($_POST['prenom']);
            $mail = htmlspecialchars($_POST['email']);
            $content = htmlspecialchars($_POST['message']);
            if (!empty($lastname) && (!empty($firstname) && (!empty($mail) && (!empty($content))))) {
                $controleurUser->contactMail($lastname, $firstname, $mail, $content);
            } else {
                throw new Exception('tous les champs ne sont pas remplis');
            }
        }
        elseif ($_GET['action'] == 'reportCommentCrochet') { // signaler un commentaire dans item Crochet
            $idItem = htmlspecialchars($_GET['idItem']);
            $idPost = htmlspecialchars($_GET['idPost']);

            $controleurUser->reportCommentCrochet($idItem, $idPost);

        }
        elseif ($_GET['action'] == 'reportCommentTricot'){
            $idItem = htmlspecialchars($_GET['idItem']);
            $idPost = htmlspecialchars($_GET['idPost']);
            $controleurUser->reportCommentTricot($idItem, $idPost);

        }
        elseif ($_GET['action'] == 'reportCommentBook'){
            $idVisitorBook = htmlspecialchars($_GET['idVisitorBook']);

            $controleurUser->reportBook($idVisitorBook);
        }
        elseif ($_GET['action'] == 'repCommentCrochet'){
            $idParent= htmlspecialchars($_GET['idPostParent']);
            $idItem = htmlspecialchars($_GET['idItem']);
            $firstname = htmlspecialchars($_POST['repPrenom']);
            $content = htmlspecialchars($_POST['content']);
            if (!empty($firstname) && (!empty($content))){
                $controleurUser->repCommentCrochet($idParent, $idItem, $firstname, $content);
            }else {
                throw new Exception('tous les champs ne sont pas remplis');
            }

        }


    } else {
        require 'app/views/frontend/homeView.php';
    }


} catch (Exception $e) {
    require 'app/views/frontend/error.php';
}
