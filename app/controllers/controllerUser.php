<?php

require_once'app/models/CrochetManager.php';
require_once 'app/models/TricotManager.php';

function crochets() //recuperation des items et textes
{
    $postCrochets = new CrochetManager();
    $recCrochets = $postCrochets->getCrochets();

    require 'app/views/frontend/crochetsView.php';
}

function crochet($idCrochet)
{
    $postCrochet = new CrochetManager();
    $recCrochet = $postCrochet->getCrochet($idCrochet);

    require 'app/views/frontend/itemCrochetView.php';
}

function tricots()
{
    $postTricot = new TricotManager();
    $recTricot = $postTricot->getTricots();

    require 'app/views/frontend/tricotView.php';
}

function tricot($idTricot)
{
    $postviewTrico = new TricotManager();
    $lookItem = $postviewTrico->getTricot($idTricot);
    require 'app/views/frontend/itemTricotView.php';


}