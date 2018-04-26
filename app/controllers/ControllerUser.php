<?php

namespace Projet\Controllers;


class ControllerUser
{

    function crochets() //recuperation des items et textes
    {
        $postCrochets = new \Projet\Models\CrochetManager();
        $recCrochets = $postCrochets->getCrochets();

        require 'app/views/frontend/crochetsView.php';
    }

    function crochet($idItem)
    {
        $getItemCrochet = new \Projet\Models\CrochetManager();
        $getCrochet = $getItemCrochet->itemCrochet($idItem);

        $commentUserC = new \Projet\Models\UserManager();
        $commentUserCrochet = $commentUserC->commentItemC($idItem);

        require 'app/views/frontend/itemCrochetView.php';

    }

    function tricots()
    {
        $postTricot = new \Projet\Models\TricotManager();
        $recTricot = $postTricot->getTricots();

        require 'app/views/frontend/tricotView.php';
    }

    function tricot($idItem)
    {
        $postviewTrico = new \Projet\Models\TricotManager();
        $lookItem = $postviewTrico->itemTricot($idItem);

        $commentUserT = new \Projet\Models\UserManager();
        $commentUserTricot = $commentUserT->commentItemT($idItem);

        require 'app/views/frontend/itemTricotView.php';


    }


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

    function commentBook($firstname, $lastname, $content)
    {
        $userManager = new \Projet\Models\UserManager();

        $contentVisitorBook = $userManager->addContent($firstname, $lastname);

        $getVisitor = $userManager->getVisitor();
        $getVisitor2 = $getVisitor->fetch();
        $idMember = $getVisitor2[0];

        $userBook = $userManager->addVisitorBook($content, $idMember);

        $commentUser = $userManager->addCommentBook();

        header('Location: index.php?action=book');
    }

    function commentUsersBook()
    {
        $userManager = new \Projet\Models\UserManager();
        $commentUser = $userManager->addCommentBook();


        require 'app/views/frontend/visitorBookViews.php';

    }


}