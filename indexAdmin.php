<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';

try{
    $controleurAdmin = new \Projet\Controllers\ControllerAdmin(); //objet controler

    if (isset($_GET['action'])){
        /*====================== affiche tous les items crochets =============================*/
        if ($_GET['action'] == 'crochetAdmin'){
            $controleurAdmin->crochetsAdmin();
        }
        /*======================= page itemCrochet ==============================================*/
        elseif ($_GET['action'] == 'nouveauCrochet'){
            $controleurAdmin->nouveauCrochet();
        }
        /*======================= création d'un item crochet=====================================*/
        elseif ($_GET['action'] =='creatItemCrochet'){
            $title = htmlspecialchars($_POST['title']);
            $content = $_POST['area'];

            if (!empty($title) && !empty($content)){
                $controleurAdmin->creatItemCrochet($title, $content);
            }
            else {

                throw new Exception('Tous les champs ne sont pas remplis');
            }

        }
        /*====================== affichage de tous les items tricot===========================*/
        elseif ($_GET['action'] == 'tricotAdmin'){
            $controleurAdmin->tricotAdmin();
        }
        /*======================= page item tricot ================================================*/
        elseif ($_GET['action'] == 'nouveauTricot'){
            $controleurAdmin->nouveauTricot();
        }
        /*========================= création d'un item crochet =============================*/
        elseif ($_GET['action'] =='creatItemTricot'){
            $title = htmlspecialchars($_POST['title']);
            $content = $_POST['area'];

            if (!empty($title) && !empty($content)){
                $controleurAdmin->creatItemTricot($title, $content);
            }
            else {

                throw new Exception('Tous les champs ne sont pas remplis');
            }

        }

    }else{
        $controleurAdmin->tableauDeBord();
    }


}catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}