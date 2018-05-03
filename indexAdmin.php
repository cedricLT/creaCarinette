<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

try{
    $controleurAdmin = new \Projet\Controllers\ControllerAdmin(); //objet controler

    if (isset($_GET['action'])){
        if ($_GET['action'] == 'crochetAdmin'){
            $controleurAdmin->crochetsAdmin();
        }elseif ($_GET['action'] == 'nouveauCrochet'){
            $controleurAdmin->nouveauCrochet();
        }

    }else{
        $controleurAdmin->tableauDeBord();
    }


}catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}