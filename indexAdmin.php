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
        /*======================= page modification d'un article crochet =====================================*/
        elseif ($_GET['action'] == 'viewItemCrochet'){
            $idItem = $_GET['idItem'];
            $controleurAdmin->viewItemCrochet($idItem);
        }
        /*========================= modifier le texte d'un article crochet =====================================*/
        elseif ($_GET['action'] == 'modifItemCrochet'){
            $idItem = $_GET['idItem'];
            $title = htmlspecialchars($_POST['title']);
            $content = $_POST['area'];

            if (!empty($title) && !empty($content)){
                $controleurAdmin->modifItemCrochet($idItem, $title, $content);
            }
            else {

                throw new Exception('Tous les champs ne sont pas remplis');
            }
        }
        /*======================= modifier une image item crochet ===========================================*/
        elseif ($_GET['action'] == 'modifImg'){
            $idItem = $_GET['idItem'];

            $controleurAdmin->modifImg($idItem);
        }

        /*======================== page modification d'un article tricot ======================================*/
        elseif ($_GET['action'] == 'viewItemTricot'){
            $idItem = $_GET['idItem'];
            $controleurAdmin->viewItemTricot($idItem);
        }
        /*========================== supprimer un article crochet ======================================*/
        elseif ($_GET['action'] == 'deleteItemCrochet'){
            $idItem = $_GET['idItem'];
            $controleurAdmin->deleteItemCrochet($idItem);
        }

    }else{
        $controleurAdmin->tableauDeBord();
    }


}catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}