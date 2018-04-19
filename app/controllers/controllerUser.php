<?php

require_once'app/models/CrochetManager.php';
require_once 'app/models/TricotManager.php';

function crochet() //recuperation des items et textes
{
    $postCrochet = new CrochetManager();
    $recCrochet = $postCrochet->getCrochet();

    require 'app/views/frontend/crochetsView.php';
}

function tricot()
{
    $postTricot = new TricotManager();
    $recTricot = $postTricot->getTricot();

    require 'app/views/frontend/tricotView.php';
}