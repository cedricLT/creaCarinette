<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

try {
    $controleurUser = new \Projet\Controllers\ControllerUser(); //objet controler

    if (isset($_GET['action'])) {

        /*=============== recuperation des items crochet page crochet ===========*/

        if ($_GET['action'] == 'item') {
            if (isset($_GET['p'])) {
                $cPage = $_GET['p'];
            } else {
                $cPage = 1;
            }
            
            $type = $_GET['type'];
            $controleurUser->crochets($cPage, $type);

        }

         /*================== recuperation d un item crochet =========================*/

        elseif ($_GET['action'] == 'itemCreations') {
            $idItem = htmlspecialchars($_GET['idItem']);
            if (isset($idItem) && $idItem > 0) {
                $controleurUser->itemCreations($idItem);
            } else {
                throw new Exception('aucun identifiant d\'article envoyé!!');
            }
        }

        /*======== injection des commentaires par item crochet et tricot dans la bdd =======*/

        elseif ($_GET['action'] == 'commentItem') {
            $idItem = htmlspecialchars($_GET['idItem']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $content = htmlspecialchars($_POST['content']);
            if (!empty($firstname) && (!empty($content))) {
                $controleurUser->commentItem($idItem, $firstname, $content);
            } else {
                throw new Exception('tous les champs ne sont pas remplis');
            }

        }

        /*============================ commentaires livre d'or =========================================*/
        elseif ($_GET['action'] == 'book') {
            if (isset($_GET['p'])) {
                $cPage = $_GET['p'];
            } else {
                $cPage = 1;
            }
            $controleurUser->commentUsersBook($cPage);
        }

        /*========= injecte les commentaire du livre d'or dans la bdd =====================*/

        elseif ($_GET['action'] == 'commentBook') {
            $firstname = htmlspecialchars($_POST['firstnameBook']);
            $lastname = htmlspecialchars($_POST['lastnameBook']);
            $content = htmlspecialchars($_POST['contentBook']);
            if (!empty($firstname) && (!empty($lastname) && (!empty($content)))) {
                if (isset($_GET['p'])) {
                    $cPage = $_GET['p'];
                } else {
                    $cPage = 1;
                }
                $controleurUser->commentBook($firstname, $lastname, $content, $cPage);
            } else {
                throw new Exception('tous les champs ne sont pas remplis');
            }
        } elseif ($_GET['action'] == 'contact') {
            $controleurUser->contactUsers();
        }

        /*================= envois de mail dans la bdd =======================*/

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
        }

        /*=========== signaler un commentaire dans item Crochet =====================*/

        elseif ($_GET['action'] == 'reportCommentItem') {
            $idItem = htmlspecialchars($_GET['idItem']);
            $idPost = htmlspecialchars($_GET['idPost']);

            $controleurUser->reportCommentItem($idItem, $idPost);

        }

        /*========================== signaler un commentaire livre d'or ==========================================*/
        
        elseif ($_GET['action'] == 'reportCommentBook') {
            $idVisitorBook = htmlspecialchars($_GET['idVisitorBook']);
            $idUsers = htmlspecialchars($_GET['idUsers']);

            $controleurUser->reportBook($idVisitorBook, $idUsers);
        }

        /*================ repondre a un commentaire  item crochet et tricot ===============================*/

        elseif ($_GET['action'] == 'reponseCommentItem') {
            $idParent = htmlspecialchars($_GET['idPostParent']);
            $idItem = htmlspecialchars($_GET['idItem']);
            $firstname = htmlspecialchars($_POST['repPrenom']);
            $content = htmlspecialchars($_POST['content']);
            if (!empty($firstname) && (!empty($content))) {
                $controleurUser->reponseCommentItem($idParent, $idItem, $firstname, $content);
            } else {
                throw new Exception('tous les champs ne sont pas remplis');
            }

        }

        /*============================ page de publication =========================================*/
        elseif ($_GET['action'] == 'publicationUsers'){

            if (isset($_GET['p'])) {
                $cPage = $_GET['p'];
            } else {
                $cPage = 1;
            }
            $controleurUser->publicationUsers($cPage);
        }


    } else {
        $controleurUser->homeVIew();
    }


} catch (Exception $e) {
    require 'app/views/frontend/errorLoading.php';
}
