<?php
session_start();

require_once __DIR__ . '/vendor/autoload.php';
require 'app/views/backend/secure.php';
$controleurAdmin = new \Projet\Controllers\ControllerAdmin(); //objet controler

/*====================== api page emails ============================================*/
if (isset($_GET['api']) && ($_GET['api'] == 'emails')) {
    $controleurAdmin->email_json();
} else {
    try {


        if (isset($_GET['action'])) {
            if ($_GET['action'] == 'email') $controleurAdmin->email();
            /*======================= connexion admin ==========================================*/

            elseif ($_GET['action'] == 'connexionAdm') { //connexion admin
                $pseudo = htmlspecialchars($_POST['name']);
                $mdp = $_POST['pass'];
                if (!empty($pseudo) && !empty($mdp)) {
                    $controleurAdmin->connexionAdm($pseudo, $mdp);
                } else {
                    throw new Exception('renseigner vos identifiants');
                }
            } /*====================== affiche tous les items crochets =============================*/

            elseif ($_GET['action'] == 'creationAdmin') {
                isConnect();
                if (isset($_GET['p'])) {
                    $cPage = $_GET['p'];
                } else {
                    $cPage = 1;
                }
                $type = $_GET['type'];
                $controleurAdmin->creationAdmin($cPage, $type);
            }

            /*======================= page modification d'un article crochet =====================================*/

            elseif ($_GET['action'] == 'viewItemCreation') {
                isConnect();
                $idItem = $_GET['idItem'];
                $controleurAdmin->viewItemCreation($idItem);
            }

            /*========================= modifier le texte d'un article crochet =====================================*/

            elseif ($_GET['action'] == 'modifItem') {
                isConnect();
                $idItem = $_GET['idItem'];
                $type = $_GET['type'];
                $title = htmlspecialchars($_POST['title']);
                $content = $_POST['area'];

                if (!empty($title) && !empty($content)) {
                    $controleurAdmin->modifItem($idItem, $title, $content, $type);
                } else {

                    throw new Exception('Tous les champs ne sont pas remplis');
                }
            }

            /*======================= modifier une image item crochet ===========================================*/

            elseif ($_GET['action'] == 'modifImg') {
                isConnect();
                $idItem = $_GET['idItem'];
                $type = $_GET['type'];

                $controleurAdmin->modifImg($idItem, $type);
            }

            /*========================== supprimer un article  ======================================*/

            elseif ($_GET['action'] == 'deleteItem') {
                isConnect();
                $idItem = $_GET['idItem'];
                $type = $_GET['type'];
                $controleurAdmin->deleteItem($idItem, $type);
            } /*=========================== affichage des commentaires du livre d'or ==================*/

            elseif ($_GET['action'] == 'visitorBook') {
                isConnect();

                if (isset($_GET['p'])) {
                    $cPage = $_GET['p'];
                } else {
                    $cPage = 1;
                }
                $controleurAdmin->visitorBook($cPage);
            } /*========================== supprimer un commentaire du livre d'or ====================*/

            elseif ($_GET['action'] == 'deleteCommBook') {
                isConnect();
                $idVisitorBook = $_GET['idVisitorBook'];
                $idUsers = $_GET['idUsers'];
                $controleurAdmin->deleteCommBook($idVisitorBook, $idUsers);
            } /*=========================== page des commentaires signalé ===================================*/

            elseif ($_GET['action'] == 'reportComment') {
                isConnect();
                if (isset($_GET['p'])) {
                    $cPage = $_GET['p'];
                } else {
                    $cPage = 1;
                }
                $controleurAdmin->reportComment($cPage);
            } /*============================ supprimer un commentaire signalé ===============================*/

            elseif ($_GET['action'] == 'deleteReportComment') {
                isConnect();
                $idPost = $_GET['idPost'];
                $idUsers = $_GET["idUsers"];
                $controleurAdmin->deleteReportComment($idPost, $idUsers);
            } /*============================= page livre d'or messages signalés ==============================*/

            elseif ($_GET['action'] == 'reportVisitorBook') {
                isConnect();
                if (isset($_GET['p'])) {
                    $cPage = $_GET['p'];
                } else {
                    $cPage = 1;
                }

                $controleurAdmin->reportVisitorBook($cPage);
            } /*============================ supprimeer un message signalé dans le livre d'or =====================*/

            elseif ($_GET['action'] == 'deleteReportVisitBook') {
                isConnect();
                $idVisitorBook = $_GET['idVisitorBook'];
                $idUsers = $_GET['idUsers'];
                $controleurAdmin->deleteReportVisitBook($idVisitorBook, $idUsers);
            } /*========================== page des commentaires =================================================*/

            elseif ($_GET['action'] == 'deleteComment') {
                isConnect();
                if (isset($_GET['p'])) {
                    $cPage = $_GET['p'];
                } else {
                    $cPage = 1;
                }

                $controleurAdmin->deleteComment($cPage);
            } /*=================================== supprimer des commentaires =================================*/

            elseif ($_GET['action'] == 'deleteCommentUsers') {
                isConnect();
                $idPost = $_GET['idPost'];
                $idUsers = $_GET["idUsers"];
                $idParent = $_GET['idParent'];
                $controleurAdmin->deleteCommentUsers($idPost, $idUsers, $idParent);
            } /*========================== creation mot de passe admin ========================*/

            elseif ($_GET['action'] == 'creatAdmin') {
                $firstname = $_POST['firstname'];
                $mdp = $_POST['pass'];
                $pass = password_hash($mdp, PASSWORD_DEFAULT);
                $controleurAdmin->creatAdmin($firstname, $pass);

            } /*===================== page newMdp ================================*/

            elseif ($_GET['action'] == 'newMdp') {
                isConnect();
                $idUsers = $_GET['idUsers'];
                $controleurAdmin->newMdp($idUsers);
            } /*=================== page newUtilisateur =====================================================================*/

            elseif ($_GET['action'] == 'newName') {
                isConnect();
                $idUsers = $_GET['idUsers'];
                $controleurAdmin->newName($idUsers);
            } /*================= retour tableau de bord =====================================*/

            elseif ($_GET['action'] == 'tdbAdmin') {
                isConnect();
                $controleurAdmin->tdbAdmin();
            } /*====================== changer de nom Admin =================================================================*/

            elseif ($_GET['action'] == 'newNameAdmin') {
                isConnect();
                $idUsers = $_GET['idUsers'];
                $firstname = htmlspecialchars($_POST['newName']);
                if (!empty($firstname)) {
                    $controleurAdmin->newNameAdmin($idUsers, $firstname);
                } else {
                    throw new Exception('tous les champs ne sont pas remplis');
                }
            } /*======================= deconnexion admin ==================================================*/

            elseif ($_GET['action'] == 'deconnexion') {
                session_destroy();
                header('Location: index.php');
            } /*======================= modification du mdp admin ===============================*/

            elseif ($_GET['action'] == 'changeMdp') {
                isConnect();
                if (isset($_SESSION['idUsers']) && isset($_POST['mdp']) && isset($_POST['newMdp']) && isset($_POST['newMdp2'])) {

                    $idUsers = $_GET['idUsers'];
                    $mdp = htmlspecialchars($_POST['mdp']);
                    $newMdp = htmlspecialchars($_POST['newMdp']);
                    $newMdp2 = htmlspecialchars($_POST['newMdp2']);

                    if ($newMdp === $newMdp2) {
                        $controleurAdmin->changeMdp($idUsers, $mdp, $newMdp);
                    } else {
                        throw new \Exception('vos mots de passe ne sont pas identiques');
                    }
                } else {
                    throw new \Exception('tous les champs ne sont pas remplis');
                }
            }

            /*=========================== supprimer un mail de la page emailView.php ==========================*/
            elseif ($_GET['action'] == 'deleteMail') {
                isConnect();
                $idContact = $_GET['idContact'];
                $controleurAdmin->deleteMail($idContact);
            } /*============================ texte presentation homeView ===============================================*/

            elseif ($_GET['action'] == 'homeText') {
                isConnect();
                $controleurAdmin->homeText();
            } /*============================ modification du text homeView ========================================*/

            elseif ($_GET['action'] == 'newTextHome') {
                isConnect();
                $content = $_POST['area'];
                $controleurAdmin->newtextHome($content);
            } /*========================= photo home =====================================*/

            elseif ($_GET['action'] == 'imgHome') {
                isConnect();
                $controleurAdmin->imgHome();
            } /*========================= new photo home ============================================*/

            elseif ($_GET['action'] == 'newImgHome') {
                isConnect();
                $controleurAdmin->newImgHome();
            } /*================================= publication ==========================================*/
//
//            elseif ($_GET['action'] == 'publication') {
//                isConnect();
//                if (isset($_GET['p'])) {
//                    $cPage = $_GET['p'];
//                } else {
//                    $cPage = 1;
//                }
//                $controleurAdmin->publication($cPage);
//            } /*============================= delete publication ===========================================*/

//            elseif ($_GET['action'] == 'deletePublis') {
//                isConnect();
//                $idPublication = $_GET['idPublication'];
//                $controleurAdmin->deletePublis($idPublication);
//            } //            /*=============================== new img publication ===========================*/
//
//            elseif ($_GET['action'] == 'newImgPublis') {
//                isConnect();
//                $idPublication = $_GET['idPublication'];
//                $controleurAdmin->newImgPublis($idPublication);
//            } /*============================== modification text publication ===========================================*/
//
//            elseif ($_GET['action'] == 'modifTextPublis') {
//                isConnect();
//                $idPublication = $_GET['idPublication'];
//                $controleurAdmin->modifTextPublis($idPublication);
//            } /*===================== enregistrement modif text publication ==========================================*/
//
//            elseif ($_GET['action'] == 'newModifPublication') {
//                isConnect();
//                $idPublication = $_GET['idPublication'];
//                $title = $_POST['title'];
//                $content = $_POST['area'];
//
//                $controleurAdmin->newModifPublication($idPublication, $title, $content);
//            } /*===================== page new article =======================================*/

            elseif ($_GET['action'] == 'newArticle') {
                isConnect();
                $controleurAdmin->pageNewArticle();
            } /*=================== new article tricot crochet ou publication ===========================*/

            elseif ($_GET['action'] == 'postArticle') {
                if (!(empty($_POST['title'])) || !(empty($_POST['content']))) {
                    isConnect();
                    $title = htmlspecialchars($_POST['title']);
                    $content = $_POST['area'];
                    $article = $_POST['article'];


                    $controleurAdmin->newItem($title, $content, $article);
                } else {
                    throw new Exception('tous les champs ne sont pas remplis');
                }


            }

            /*================================================================================*/


        } else {
            $controleurAdmin->connexion();

        }


    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage()); // faire page erreur !!!!
    }
}