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
        /*========================= modifier le texte d'un article tricot =====================================*/
        elseif ($_GET['action'] == 'modifItemTricot'){
            $idItem = $_GET['idItem'];
            $title = htmlspecialchars($_POST['title']);
            $content = $_POST['area'];

            if (!empty($title) && !empty($content)){
                $controleurAdmin->modifItemTricot($idItem, $title, $content);
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
        /*========================== supprimer un article tricot ======================================*/
        elseif ($_GET['action'] == 'deleteItemTricot'){
            $idItem = $_GET['idItem'];
            $controleurAdmin->deleteItemTricot($idItem);
        }
        /*=========================== modifier une image tricot======================================*/
        elseif ($_GET['action'] == 'modifImgTricot'){
            $idItem = $_GET['idItem'];

            $controleurAdmin->modifImgTricot($idItem);
        }
        /*=========================== affichage des commentaires du livre d'or ==================*/
        elseif ($_GET['action'] == 'visitorBook'){
            $controleurAdmin->visitorBook();
        }
        /*========================== supprimer un commentaire du livre d'or ====================*/
        elseif ($_GET['action'] == 'deleteCommBook'){
            $idVisitorBook = $_GET['idVisitorBook'];
            $controleurAdmin->deleteCommBook($idVisitorBook);
        }
        /*=========================== page des commentaires signalé ===================================*/
        elseif ($_GET['action'] == 'reportComment'){
            $controleurAdmin->reportComment();
        }
        /*============================ supprimer un commentaire signalé ===============================*/
        elseif ($_GET['action'] == 'deleteReportComment'){
            $idPost = $_GET['idPost'];
            $idUsers = $_GET["idUsers"];
            $controleurAdmin->deleteReportComment($idPost, $idUsers);
        }
        /*============================= page livre d'or messages signalés ==============================*/
        elseif ($_GET['action'] == 'reportVisitorBook'){
            $controleurAdmin->reportVisitorBook();
        }

    }else{
        $controleurAdmin->tableauDeBord();
    }


}catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}