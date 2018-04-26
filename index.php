<?php
session_start();

require_once  __DIR__.'/vendor/autoload.php';

try {
$controleurUser = new \Projet\Controllers\ControllerUser(); //objet controler

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'crochet') { // recuperation des items crochet page crochet
            $controleurUser->crochets();
        } elseif ($_GET['action'] == 'tricots') { // recuperation des items tricot page tricot
            $controleurUser->tricots();
        } elseif ($_GET['action'] == 'itemTricot') { // recuperation d un item tricot
            $idItem = htmlspecialchars($_GET['idItem']);
            if (isset($idItem) && $idItem > 0) {
                $controleurUser->tricot($idItem);
            } else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        } elseif ($_GET['action'] == 'itemCrochet') { // recuperation d un item crochet
            $idItem = htmlspecialchars($_GET['idItem']);
            if (isset($idItem) && $idItem > 0) {
                $controleurUser->crochet($idItem);
            } else {
                echo 'Erreur de chargement!';
            }
        }elseif ($_GET['action'] == 'commentCrochet'){ // injection des commentaire par item crochet dans la bdd et recup sur ItemCrochetView
            $idItem = htmlspecialchars($_GET['idItem']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $content = htmlspecialchars($_POST['content']);
            if (!empty($firstname) && (!empty($content))){
                $controleurUser->addcommentCrochet($idItem, $firstname, $content);
            }else{
                throw new Exception('tous les champs ne sont pas remplis');
            }

        }elseif ($_GET['action'] == 'commentTricot'){
            $idItem = htmlspecialchars($_GET['idItem']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $content = htmlspecialchars($_POST['content']);
            if (!empty($firstname) && (!empty($content))){
                $controleurUser->addcommentTricot($idItem, $firstname, $content);
            }else{
                throw new Exception('tous les champs ne sont pas remplis');
            }
        }


    } else {
        require 'app/views/frontend/homeView.php';
    }


} catch (Exception $e) {
    require 'app/views/frontend/error.php';
}
