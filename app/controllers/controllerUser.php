<?php

require_once 'app/models/CrochetManager.php';
require_once 'app/models/TricotManager.php';
require_once 'app/models/UserManager.php';

function crochets() //recuperation des items et textes
{
    $postCrochets = new CrochetManager();
    $recCrochets = $postCrochets->getCrochets();

    require 'app/views/frontend/crochetsView.php';
}

function crochet($idItem)
{
    $getItemCrochet = new CrochetManager();
    $getCrochet = $getItemCrochet->itemCrochet($idItem);

    $commentUser = new UserManager();
    $commentUserCrochet = $commentUser->commentItem($idItem);

    require 'app/views/frontend/itemCrochetView.php';

}

function tricots()
{
    $postTricot = new TricotManager();
    $recTricot = $postTricot->getTricots();

    require 'app/views/frontend/tricotView.php';
}

function tricot($idItem)
{
    $postviewTrico = new TricotManager();
    $lookItem = $postviewTrico->itemTricot($idItem);
    require 'app/views/frontend/itemTricotView.php';


}


function addcommentCrochet($idItem, $firstname, $content){


    $userManager = new UserManager();
    $commentCrochet = $userManager->addCrochetUser($firstname);

    $getId = $userManager-> getId();
    $getId2 = $getId->fetch();
    $idMember = $getId2[0];

    $commentUser = $userManager->comUser($content, $idMember, $idItem);

    header('Location: index.php?action=itemCrochet&idItem='.$idItem);
}