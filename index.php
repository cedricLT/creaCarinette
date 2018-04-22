<?php
session_start();
require 'app/controllers/controllerUser.php';

try {


    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'crochet') { // recuperation des items crochet page crochet
            crochets();
        } elseif ($_GET['action'] == 'tricots') { // recuperation des items tricot page tricot
            tricots();
        } elseif ($_GET['action'] == 'itemTricot') {
            $idTricot = htmlspecialchars($_GET['idTricot']);
            if (isset($idTricot) && $idTricot > 0) {
                tricot($idTricot);
            } else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        }elseif ($_GET['action'] == 'itemCrochet'){
            $idCrochet = htmlspecialchars($_GET['idCrochet']);
            if (isset($idCrochet) && $idCrochet > 0){
                crochet($idCrochet);
            }else{
                echo 'Erreur !';
            }
        }


    } else {
        require 'app/views/frontend/homeView.php';
    }


} catch (Exception $e) {
    require 'app/views/frontend/error.php';
}
