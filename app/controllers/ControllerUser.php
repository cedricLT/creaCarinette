<?php

namespace Projet\Controllers;


class ControllerUser
{


    function crochets($cPage) //recuperation des items et textes
    {
        $CrochetManager = new \Projet\Models\CrochetManager(); // Création d'un objet

        $numPage = $CrochetManager->nbPage();
        if (!($cPage>0 && $cPage<=$numPage)) {
            $cPage = 1;
        }

        $recCrochets = $CrochetManager->getCrochets($cPage);// Appel d'une fonction de cet objet



        require 'app/views/frontend/crochetsView.php';

    }

    function crochet($idItem)
    {
        $CrochetManager = new \Projet\Models\CrochetManager();
        $getCrochet = $CrochetManager->itemCrochet($idItem);

        $UserManager = new \Projet\Models\UserManager();
        $commentUserCrochet = $UserManager->commentItemC($idItem);

        /*============= reponse des commentaires itemCrochet =================*/

        $commentCrochet = $commentUserCrochet->fetchAll();
        $orderedComment = array();

        $idRoot = [0];
        while (count($commentCrochet) > 0) {
            foreach ($commentCrochet as $index => $comUserCrochet) {
                $idParent = $comUserCrochet['idParent'];
                $idPost = $comUserCrochet['idPost'];
                if (in_array($comUserCrochet['idParent'], $idRoot)) {
                    $idRoot [] = $comUserCrochet['idPost'];
                    $orderedComment [$idParent]['children'][$idPost] = ['idPost' => $comUserCrochet['idPost'], 'idParent' => $comUserCrochet['idParent'], 'content' => $comUserCrochet['content'],
                        'dates' => $comUserCrochet['dates'], 'firstname' => $comUserCrochet['firstname'], 'idItem' => $comUserCrochet['idItem']];
                    unset($commentCrochet[$index]);
                }
            }
        }
        /*echo '<pre>';
        print_r($orderedComment);
        echo '</pre>';*/


        require 'app/views/frontend/itemCrochetView.php';

    }

    function tricots($cPage)
    {
        $TricotManager = new \Projet\Models\TricotManager();

        $numPage = $TricotManager->nbPage();
        if (!($cPage>0 && $cPage<=$numPage)) {
            $cPage = 1;
        }

        $recTricot = $TricotManager->getTricots($cPage);

        require 'app/views/frontend/tricotView.php';
    }

    function tricot($idItem)
    {
        $TricotManager = new \Projet\Models\TricotManager();
        $lookItem = $TricotManager->itemTricot($idItem);

        $UserManager = new \Projet\Models\UserManager();
        $commentUserTricot = $UserManager->commentItemT($idItem);

        /*============= reponse des commentaires itemTricot =================*/

        $commentTricot = $commentUserTricot->fetchAll();
        $orderedComment = array();

        $idRoot = [0];
        while (count($commentTricot) > 0) {
            foreach ($commentTricot as $index => $comUserTricot) {
                $idParent = $comUserTricot['idParent'];
                $idPost = $comUserTricot['idPost'];
                if (in_array($comUserTricot['idParent'], $idRoot)) {
                    $idRoot [] = $comUserTricot['idPost'];
                    $orderedComment [$idParent]['children'][$idPost] = ['idPost' => $comUserTricot['idPost'], 'idParent' => $comUserTricot['idParent'], 'content' => $comUserTricot['content'],
                        'dates' => $comUserTricot['dates'], 'firstname' => $comUserTricot['firstname'], 'idItem' => $comUserTricot['idItem']];
                    unset($commentTricot[$index]);
                }
            }
        }

        require 'app/views/frontend/itemTricotView.php';


    }

    /*======================== commentaires par items ========================================================*/


    function addcommentCrochet($idItem, $firstname, $content)
    {
        $userManager = new \Projet\Models\UserManager();
        $commentCrochet = $userManager->addCrochetUser($firstname);


        $getId = $userManager->getId();
        $getId2 = $getId->fetch();
        $idMember = $getId2[0];

        $commentUser = $userManager->comUser($content, $idMember, $idItem);

        header('Location: index.php?action=itemCrochet&idItem=' . $idItem);
    }

    function addcommentTricot($idItem, $firstname, $content)
    {
        $userManager = new \Projet\Models\UserManager();
        $commentCrochet = $userManager->addTricotUser($firstname);

        $getId = $userManager->getId();
        $getId2 = $getId->fetch();
        $idMember = $getId2[0];

        $commentUser = $userManager->comUser($content, $idMember, $idItem);

        header('Location: index.php?action=itemTricot&idItem=' . $idItem);
    }

    /*=============================== visitorbook =======================================================================*/

    function commentBook($firstname, $lastname, $content, $cPage)
    {
        $userManager = new \Projet\Models\UserManager();

        $contentVisitorBook = $userManager->addContent($firstname, $lastname);

        $getVisitor = $userManager->getVisitor();
        $getVisitor2 = $getVisitor->fetch();
        $idMember = $getVisitor2[0];

        $userBook = $userManager->addVisitorBook($content, $idMember);

        $numPage = $userManager->nbPagebook();
        if (!($cPage>0 && $cPage<=$numPage)) {
            $cPage = 1;
        }

        $commentUser = $userManager->addCommentBook($cPage);

        header('Location: index.php?action=book');
    }

    function commentUsersBook($cPage)
    {
        $userManager = new \Projet\Models\UserManager();

        $numPage = $userManager->nbPagebook();
        if (!($cPage>0 && $cPage<=$numPage)) {
            $cPage = 1;
        }
        $commentUser = $userManager->addCommentBook($cPage);

        require 'app/views/frontend/visitorBookViews.php';

    }

    function contactUsers()
    {
        require 'app/views/frontend/contactView.php';
    }

    /*===================== mail formulaire de contact==================================*/

    function contactMail($lastname, $firstname, $mail, $content)
    {
        $userManager = new \Projet\Models\UserManager();


        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $contactUserMail = $userManager->addMail($lastname, $firstname, $mail, $content);
            header('Location: index.php');
        } else {
            header('Location: app/views/frontend/error.php');
        }
    }

    /*====================== commentaires signaler ==========================================================*/

    function reportCommentCrochet($idItem, $idPost)
    {
        $userManager = new \Projet\Models\UserManager();
        $report = $userManager->reportUser($idPost);

        header('Location: index.php?action=itemCrochet&idItem=' . $idItem);

    }

    function reportCommentTricot($idItem, $idPost)
    {
        $userManager = new \Projet\Models\UserManager();
        $report = $userManager->reportUser($idPost);

        header('Location: index.php?action=itemTricot&idItem=' . $idItem);
    }

    /*======================= commentaire signalé livre d'or ====================================================*/

    function reportBook($idVisitorBook)
    {
        $userManager = new \Projet\Models\UserManager();
        $reportBook = $userManager->reportUserBook($idVisitorBook);

        header('Location: index.php?action=book');

    }

    /*============================ reponse a un commentaire ====================================================*/

    function repCommentCrochet($idParent, $idItem, $firstname, $content)
    {
        $userManager = new \Projet\Models\UserManager();
        $commentCrochet = $userManager->addCrochetUser($firstname);

        $getId = $userManager->getId();
        $getId2 = $getId->fetch();
        $idMember = $getId2[0];

        $repCommentUser = $userManager->repComUser($idParent, $content, $idMember, $idItem);

        header('Location: index.php?action=itemCrochet&idItem=' . $idItem);


    }

    function repCommentTricot($idParent, $idItem, $firstname, $content)
    {
        $userManager = new \Projet\Models\UserManager();
        $commentTricot = $userManager->addTricotUser($firstname);

        $getId = $userManager->getId();
        $getId2 = $getId->fetch();
        $idMember = $getId2[0];

        $repCommentUser = $userManager->repComUser($idParent, $content, $idMember, $idItem);

        header('Location: index.php?action=itemTricot&idItem=' . $idItem);
    }
    /*=============================== page accueil =========================================*/

    function homeView()
    {
        $CrochetManager = new \Projet\Models\CrochetManager();
        $itemC = $CrochetManager->lastItemCrochet();

        $TricotManager = new \Projet\Models\TricotManager();
        $itemT = $TricotManager->lastItemTricot();



        require 'app/views/frontend/homeView.php';
    }
}