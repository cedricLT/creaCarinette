<?php

require_once'app/models/CrochetManager.php';

function crochet() //recuperation des items et textes
{
    $postCrochet = new CrochetManager();
    $recCrochet = $postCrochet->getCrochet();

    require 'app/views/frontend/crochetsView.php';
}