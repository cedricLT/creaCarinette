<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';
require 'app/views/backend/secure.php';

try{
    $controleurAdmin = new \Projet\Controllers\ControllerAdmin(); //objet controler


    if (isset($_GET['action'])){

        /*======================= connexion admin ==========================================*/

        if ($_GET['action'] == 'connexionAdm') { //connexion admin
            $pseudo = htmlspecialchars($_POST['name']);
            $mdp = $_POST['pass'];
            if (isset($pseudo) && isset($mdp)) {
                $controleurAdmin->connexionAdm($pseudo, $mdp);
            } else {
                throw new Exception('renseigner vos identifiants');
            }
        }
        /*====================== affiche tous les items crochets =============================*/

        elseif ($_GET['action'] == 'crochetAdmin'){
            isConnect();
            if (isset($_GET['p']))
            {
                $cPage = $_GET['p'];
            }
            else {
                $cPage = 1;
            }
            $controleurAdmin->crochetsAdmin($cPage);
        }
        /*======================= page itemCrochet ==============================================*/

        elseif ($_GET['action'] == 'nouveauCrochet'){
            isConnect();
            $controleurAdmin->nouveauCrochet();
        }
        /*======================= création d'un item crochet=====================================*/

        elseif ($_GET['action'] =='creatItemCrochet'){
            isConnect();
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
            isConnect();
            if (isset($_GET['p']))
            {
                $cPage = $_GET['p'];
            }
            else {
                $cPage = 1;
            }

            $controleurAdmin->tricotAdmin($cPage);
        }
        /*======================= page item tricot ================================================*/

        elseif ($_GET['action'] == 'nouveauTricot'){
            isConnect();
            $controleurAdmin->nouveauTricot();
        }
        /*========================= création d'un item crochet =============================*/

        elseif ($_GET['action'] =='creatItemTricot'){
            isConnect();
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
            isConnect();
            $idItem = $_GET['idItem'];
            $controleurAdmin->viewItemCrochet($idItem);
        }
        /*========================= modifier le texte d'un article crochet =====================================*/

        elseif ($_GET['action'] == 'modifItemCrochet'){
            isConnect();
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
            isConnect();
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
            isConnect();
            $idItem = $_GET['idItem'];

            $controleurAdmin->modifImg($idItem);
        }

        /*======================== page modification d'un article tricot ======================================*/

        elseif ($_GET['action'] == 'viewItemTricot'){
            isConnect();
            $idItem = $_GET['idItem'];
            $controleurAdmin->viewItemTricot($idItem);
        }
        /*========================== supprimer un article crochet ======================================*/

        elseif ($_GET['action'] == 'deleteItemCrochet'){
            isConnect();
            $idItem = $_GET['idItem'];
            $controleurAdmin->deleteItemCrochet($idItem);
        }
        /*========================== supprimer un article tricot ======================================*/

        elseif ($_GET['action'] == 'deleteItemTricot'){
            isConnect();
            $idItem = $_GET['idItem'];
            $controleurAdmin->deleteItemTricot($idItem);
        }
        /*=========================== modifier une image tricot======================================*/

        elseif ($_GET['action'] == 'modifImgTricot'){
            isConnect();
            $idItem = $_GET['idItem'];

            $controleurAdmin->modifImgTricot($idItem);
        }
        /*=========================== affichage des commentaires du livre d'or ==================*/

        elseif ($_GET['action'] == 'visitorBook'){
            isConnect();

            if (isset($_GET['p']))
            {
                $cPage = $_GET['p'];
            }
            else {
                $cPage = 1;
            }
            $controleurAdmin->visitorBook($cPage);
        }
        /*========================== supprimer un commentaire du livre d'or ====================*/

        elseif ($_GET['action'] == 'deleteCommBook'){
            isConnect();
            $idVisitorBook = $_GET['idVisitorBook'];
            $idUsers = $_GET['idUsers'];
            $controleurAdmin->deleteCommBook($idVisitorBook, $idUsers);
        }
        /*=========================== page des commentaires signalé ===================================*/

        elseif ($_GET['action'] == 'reportComment'){
            isConnect();
            if (isset($_GET['p']))
            {
                $cPage = $_GET['p'];
            }
            else {
                $cPage = 1;
            }
            $controleurAdmin->reportComment($cPage);
        }
        /*============================ supprimer un commentaire signalé ===============================*/

        elseif ($_GET['action'] == 'deleteReportComment'){
            isConnect();
            $idPost = $_GET['idPost'];
            $idUsers = $_GET["idUsers"];
            $controleurAdmin->deleteReportComment($idPost, $idUsers);
    }
        /*============================= page livre d'or messages signalés ==============================*/

        elseif ($_GET['action'] == 'reportVisitorBook'){
            isConnect();
            if (isset($_GET['p']))
            {
                $cPage = $_GET['p'];
            }
            else {
                $cPage = 1;
            }

            $controleurAdmin->reportVisitorBook($cPage);
        }
        /*============================ supprimeer un message signalé dans le livre d'or =====================*/

        elseif ($_GET['action'] == 'deleteReportVisitBook'){
            isConnect();
            $idVisitorBook = $_GET['idVisitorBook'];
            $idUsers = $_GET['idUsers'];
            $controleurAdmin->deleteReportVisitBook($idVisitorBook, $idUsers);
        }
        /*========================== page des commentaires =================================================*/

        elseif ($_GET['action'] == 'deleteComment'){
            isConnect();
            if (isset($_GET['p']))
            {
                $cPage = $_GET['p'];
            }
            else {
                $cPage = 1;
            }

            $controleurAdmin->deleteComment($cPage);
        }
        /*=================================== supprimer des commentaires =================================*/

        elseif ($_GET['action'] == 'deleteCommentUsers'){
            isConnect();
            $idPost = $_GET['idPost'];
            $idUsers = $_GET["idUsers"];
            $controleurAdmin->deleteCommentUsers($idPost, $idUsers);
        }
        /*========================== creation mot de passe admin ========================*/

        elseif ($_GET['action'] == 'creatAdmin'){
            isConnect();
            $firstname = $_POST['firstname'];
            $mdp = $_POST['pass'];
            $pass =  password_hash($mdp, PASSWORD_DEFAULT);
            $controleurAdmin->creatAdmin($firstname, $pass);

        }
        /*===================== page newMdp ================================*/

        elseif ($_GET['action'] == 'newMdp'){
            isConnect();
            $idUsers = $_GET['idUsers'];
            $controleurAdmin->newMdp($idUsers);
        }
        /*=================== page newUtilisateur =====================================================================*/

        elseif ($_GET['action'] == 'newName'){
            isConnect();
            $idUsers = $_GET['idUsers'];
            $controleurAdmin->newName($idUsers);
        }
        /*================= retour tableau de bord =====================================*/

        elseif ($_GET['action'] == 'tdbAdmin'){
            $controleurAdmin->tdbAdmin();
        }
        /*====================== changer de nom Admin =================================================================*/

        elseif ($_GET['action'] == 'newNameAdmin'){
            isConnect();
            $idUsers = $_GET['idUsers'];
            $firstname = htmlspecialchars($_POST['newName']);
            if (!empty($firstname)){
                $controleurAdmin->newNameAdmin($idUsers, $firstname);
            }else {
                throw new Exception('tous les champs ne sont pas remplis');
            }
        }
        /*======================= deconnexion admin ==================================================*/

        elseif ($_GET['action'] == 'deconnexion'){
            session_destroy();
            header('Location: index.php');
        }
        /*======================= modification du mdp admin ===============================*/

        elseif ($_GET['action'] == 'changeMdp'){
            isConnect();
            if (isset($_SESSION['idUsers']) && isset($_POST['mdp']) && isset($_POST['newMdp']) && isset($_POST['newMdp2'])){

                $idUsers = $_GET['idUsers'];
                $mdp = htmlspecialchars($_POST['mdp']);
                $newMdp = htmlspecialchars($_POST['newMdp']);
                $newMdp2 = htmlspecialchars($_POST['newMdp2']);

                if ($newMdp === $newMdp2){
                    $controleurAdmin->changeMdp($idUsers, $mdp, $newMdp);
                }
                else{
                    throw new \Exception('vos mots de passe ne sont pas identiques');
                }
            }
            else{
                throw new \Exception('tous les champs ne sont pas remplis');
            }
        }
        /*========================== page EmailView ====================================================*/

        elseif ($_GET['action'] == 'mail'){
            isConnect();
            if (isset($_GET['p']))
            {
                $cPage = $_GET['p'];
            }
            else {
                $cPage = 1;
            }
            $controleurAdmin->mail($cPage);
        }
        /*=========================== supprimer un mail de la page emailView.php ==========================*/

        elseif ($_GET['action'] == 'deleteMail'){
            isConnect();
            $idContact = $_GET['idContact'];
            $controleurAdmin->deleteMail($idContact);
        }


    }else{
        $controleurAdmin->tableauDeBord();

    }


}catch (Exception $e) {
    die('Erreur : ' . $e->getMessage()); // faire page erreur !!!!
}