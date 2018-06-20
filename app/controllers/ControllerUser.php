<?php

namespace Projet\Controllers;


class ControllerUser
{

    /*=========================== recuperation des items titres et textes ========================================*/

    function items($cPage, $type)
    {
        $ItemsManager = new \Projet\Models\ItemsManager(); // Création d'un objet

        $numPage = $ItemsManager->nbPage($type);
        if (!($cPage>0 && $cPage<=$numPage)) {
            $cPage = 1;
        }

        $recCrochets = $ItemsManager->getCreations($cPage, $type);// Appel d'une fonction de cet objet

        if ($type === 'publication'){
            require 'app/views/frontend/publicationView.php';
        }
        
        else {
            $donnee = $recCrochets->fetchAll();
           require 'app/views/frontend/creationsView.php';
        }

        

    }

    /*========================== affichage des commentaires  ===================================*/

    function itemCreations($idItem)
    {
        $ItemsManager = new \Projet\Models\ItemsManager();
        $getCrochet = $ItemsManager->item($idItem);

        if ($getCrochet) {

            $UserManager = new \Projet\Models\UserManager();
            $commentUserCrochet = $UserManager->commentItem($idItem);

            /*============= affichage des reponse des commentaires items=================*/

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
                            'dates' => $comUserCrochet['dates_fr'], 'firstname' => $comUserCrochet['firstname'], 'idItem' => $comUserCrochet['idItem']];
                        unset($commentCrochet[$index]);
                    }
                }
            }

            require 'app/views/frontend/itemsCreationsView.php';
        }
        else{
            throw new \Exception('cet item n\'existe pas ! ');
        }
    }

    /*============================ reponse a un commentaire ====================================================*/

    function reponseCommentItem($idParent, $idItem, $firstname, $content)
    {
        /*================= enregistrement d un commentaire ============================*/
        $userManager = new \Projet\Models\UserManager();
        $commentCrochet = $userManager->commentUser($firstname);

        $getId = $userManager->getId();
        $getId2 = $getId->fetch();
        $idMember = $getId2[0];

        /*================ enregistrement de reponse à un commentaire ==============================================*/
        $repCommentUser = $userManager->repComUser($idParent, $content, $idMember, $idItem);

        header('Location: index.php?action=itemCreations&idItem=' . $idItem);


    }


    /*======================== enregistrement des commentaires par items ========================================================*/


    function commentItem($idItem, $firstname, $content)
    {
        $userManager = new \Projet\Models\UserManager();
        $commentCrochet = $userManager->commentUser($firstname);


        $getId = $userManager->getId();
        $getId2 = $getId->fetch();
        $idMember = $getId2[0];

        $commentUser = $userManager->comUser($content, $idMember, $idItem);

        header('Location: index.php?action=itemCreations&idItem=' . $idItem);
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

    /*============================ commentaire livre d'or =============================================*/

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
            require 'app/views/frontend/confirmMailContactView.php';
        } else {
            throw new \Exception("Votre mail n'est pas valide");
        }
    }

    /*====================== commentaires signaler ==========================================================*/

    function reportCommentItem($idItem, $idPost)
    {
        $userManager = new \Projet\Models\UserManager();
        $report = $userManager->reportUser($idPost);

        header('Location: index.php?action=itemCreations&idItem=' . $idItem . "#ancre" .$idPost);

    }

    function reportCommentTricot($idItem, $idPost)
    {
        $userManager = new \Projet\Models\UserManager();
        $report = $userManager->reportUser($idPost);

        header('Location: index.php?action=itemTricot&idItem=' . $idItem . "#ancre" . $idPost);
    }

    /*======================= commentaire signalé livre d'or ====================================================*/

    function reportBook($idVisitorBook, $idUsers)
    {
        $userManager = new \Projet\Models\UserManager();
        $reportBook = $userManager->reportUserBook($idVisitorBook);

        header('Location: index.php?action=book#ancre' . $idUsers);

    }


    /*=============================== page accueil =========================================*/

    function homeView()
    {
        $ItemsManager = new \Projet\Models\ItemsManager();
        $itemC = $ItemsManager->lastItemCrochet();
$itemT = $ItemsManager->lastItemTricot();

        $userManager = new \Projet\Models\UserManager();
        $newtext = $userManager->readContentHome();

        $userManager = new \Projet\Models\UserManager();
        $imgHome = $userManager->imgHome();



        require 'app/views/frontend/homeView.php';
    }

    /*============================ page publication =========================================================*/

    function publicationUsers($cPage)
    {
        $userManager = new \Projet\Models\UserManager();

        $numPage = $userManager->nbPagePublis();
        if (!($cPage > 0 && $cPage <= $numPage)) {
            $cPage = 1;
        }

        $lookPublication = $userManager->lookPublication($cPage);

        require 'app/views/frontend/publicationView.php';
    }
}