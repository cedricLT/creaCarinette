<?php

namespace Projet\Controllers;

class ControllerAdmin
{
    function tableauDeBord()
    {
    require 'app/views/backend/tableauDeBordAdminView.php';
    }

    function crochetsAdmin()
    {
        $CrochetManager = new \Projet\Models\CrochetManager();
        $recCrochets = $CrochetManager->getCrochets();

        require 'app/views/backend/crochetAdminView.php';
    }

    function nouveauCrochet()
    {
        require 'app/views/backend/nouveauCrochetView.php';
    }
}