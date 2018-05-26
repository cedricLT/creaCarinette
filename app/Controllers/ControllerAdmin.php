<?php

namespace Projet\Controllers;

use Projet\Models\CrochetManager;
use Projet\Models\TricotManager;
use Projet\Models\UserManager;

class ControllerAdmin
{
    function tableauDeBord()
    {

        require 'app/views/backend/connexionAdminView.php';
    }

    /*==================== page de tous les items crochet =========================================================*/

    function crochetsAdmin($cPage)
    {
        $CrochetManager = new \Projet\Models\CrochetManager();

        $numPage = $CrochetManager->nbPage();
        if (!($cPage > 0 && $cPage <= $numPage)) {
            $cPage = 1;
        }

        $recCrochets = $CrochetManager->getCrochets($cPage);

        $nbrItemCrochet = $CrochetManager->nbrItemC();

        require 'app/views/backend/crochetAdminView.php';


    }

    /*======================== page création d un nouvel item crochet ==============================================================================*/

    function nouveauCrochet()
    {
        require 'app/views/backend/nouveauCrochetView.php';
    }

    /*======================= upload titre text et image crochet =======================================================*/

    function creatItemCrochet($title, $content)
    {

        $target_dir = "app/public/img/"; //spécifie le répertoire où le fichier va être placé
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);// spécifie le chemin du fichier à télécharger
        $uploadOk = 1; // n'est pas encore utilisé (sera utilisé plus tard)
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //contient l'extension du fichier (en minuscules)
        // on vérifie que le fichier image est une image réelle
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Désolé, votre fichier est trop volumineux. ";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif") {
                    echo "Seuls les formats JPG, JPEG, PNG & GIF files sont authorisés. ";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Désolé, votre avatar n'a pu être envoyé.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $CrochetManager = new \Projet\Models\CrochetManager();
                        $newItemCrochet = $CrochetManager->newCreatCrochet($title, $content, $target_file);

                        header('Location: indexAdmin.php?action=crochetAdmin');
                    } else {
                        echo "Désolé, une erreur est survenue dans l'envoi de votre fichier. ";
                    }
                }
            } else {
                echo "Ce fichier n'est pas une image. ";
                $uploadOk = 0;
            }
        }
    }

    /*============================ page de tous les items tricots ==============================*/

    function tricotAdmin($cPage)
    {
        $TricotManager = new \Projet\Models\TricotManager;

        $numPage = $TricotManager->nbPage();
        if (!($cPage > 0 && $cPage <= $numPage)) {
            $cPage = 1;
        }

        $recTricots = $TricotManager->getTricots($cPage);
        $nbrItemTricot = $TricotManager->nbrItemt();

        require 'app/views/backend/tricotAdminView.php';
    }

    /*=========================== page création d'un nouvel item tricot ==================================*/
    function nouveauTricot()
    {
        require 'app/views/backend/nouveauTricotView.php';
    }

    /*============================= upload titre text et image tricot ====================================*/

    function creatItemTricot($title, $content)
    {


        $target_dir = "app/public/img/"; //spécifie le répertoire où le fichier va être placé
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);// spécifie le chemin du fichier à télécharger
        $uploadOk = 1; // n'est pas encore utilisé (sera utilisé plus tard)
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //contient l'extension du fichier (en minuscules)
        // on vérifie que le fichier image est une image réelle
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Désolé, votre fichier est trop volumineux. ";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif") {
                    echo "Seuls les formats JPG, JPEG, PNG & GIF files sont authorisés. ";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Désolé, votre avatar n'a pu être envoyé.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $TricotManager = new \Projet\Models\TricotManager;
                        $newItemTricot = $TricotManager->newCreatTricot($title, $content, $target_file);


                        header('Location: indexAdmin.php?action=tricotAdmin');
                    } else {
                        echo "Désolé, une erreur est survenue dans l'envoi de votre fichier. ";
                    }
                }
            } else {
                echo "Ce fichier n'est pas une image. ";
                $uploadOk = 0;
            }
        }
    }

    /*======================= affichage article page crochet ==============================*/
    function viewItemCrochet($idItem)
    {
        $CrochetManager = new \Projet\Models\CrochetManager();
        $modifItemC = $CrochetManager->itemCrochet($idItem);

        require 'app/views/backend/modifCrochetView.php';
    }

    /*======================= affichage article page tricot =================================*/
    function viewItemTricot($idItem)
    {
        $TricotManager = new \Projet\Models\TricotManager;
        $modifItemT = $TricotManager->itemTricot($idItem);

        require 'app/views/backend/modifTricotView.php';

    }

    /*========================= modification du texte article crochet ==============================*/

    function modifItemCrochet($idItem, $title, $content)
    {
        $CrochetManager = new \Projet\Models\CrochetManager;
        $newItemCrochet = $CrochetManager->modifCrochet($idItem, $title, $content);


        header('Location: indexAdmin.php?action=crochetAdmin');

    }

    /*=========================== modification du texte article tricot==============================*/

    function modifItemTricot($idItem, $title, $content)
    {
        $TricotManager = new \Projet\Models\TricotManager;
        $newItemTricot = $TricotManager->modifTricot($idItem, $title, $content);

        header('Location: indexAdmin.php?action=tricotAdmin');
    }

    /*========================== modification dd'une image crochet==========================================*/

    function modifImg($idItem)
    {

        $target_dir = "app/public/img/"; //spécifie le répertoire où le fichier va être placé
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);// spécifie le chemin du fichier à télécharger
        $uploadOk = 1; // n'est pas encore utilisé (sera utilisé plus tard)
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //contient l'extension du fichier (en minuscules)
        // on vérifie que le fichier image est une image réelle
        if (!empty($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Désolé, votre fichier est trop volumineux. ";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif") {
                    echo "Seuls les formats JPG, JPEG, PNG & GIF files sont authorisés. ";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Désolé, votre avatar n'a pu être envoyé.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $CrochetManager = new \Projet\Models\CrochetManager;
                        $newImgCrochet = $CrochetManager->modifImgCrochet($idItem, $target_file);

                        header('Location: indexAdmin.php?action=crochetAdmin');

                    } else {
                        echo "Désolé, une erreur est survenue dans l'envoi de votre fichier. ";
                    }
                }
            } else {
                header('Location: indexAdmin.php');
                $uploadOk = 0;
            }
        }


    }

    /*========================== suppression d'un article crochet et de ses commentaire attenant ======================*/

    function deleteItemCrochet($idItem)
    {
        $CrochetManager = new \Projet\Models\CrochetManager;
        $deleteItem = $CrochetManager->deleteCrochet($idItem);

        $Usermager = new \Projet\Models\UserManager;
        $deleteCom = $Usermager->deleteComItem($idItem);

        header('Location: indexAdmin.php?action=crochetAdmin');

    }

    /*========================== suppression d'un article tricot et de ses commentaire attenant ======================*/

    function deleteItemTricot($idItem)
    {
        $TricotManager = new \Projet\Models\TricotManager;
        $deleteItem = $TricotManager->deleteTricot($idItem);

        $Usermager = new \Projet\Models\UserManager;
        $deleteCom = $Usermager->deleteComItem($idItem);

        header('Location: indexAdmin.php?action=tricotAdmin');
    }

    /*========================== modification d'une image tricot ====================================================*/

    function modifImgTricot($idItem)
    {
        $target_dir = "app/public/img/"; //spécifie le répertoire où le fichier va être placé
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);// spécifie le chemin du fichier à télécharger
        $uploadOk = 1; // n'est pas encore utilisé (sera utilisé plus tard)
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //contient l'extension du fichier (en minuscules)
        // on vérifie que le fichier image est une image réelle
        if (!empty($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Désolé, votre fichier est trop volumineux. ";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif") {
                    echo "Seuls les formats JPG, JPEG, PNG & GIF files sont authorisés. ";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Désolé, votre avatar n'a pu être envoyé.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $TricotManager = new \Projet\Models\TricotManager;
                        $newImgTricot = $TricotManager->modifImgTricot($idItem, $target_file);

                        header('Location: indexAdmin.php?action=tricotAdmin');

                    } else {
                        echo "Désolé, une erreur est survenue dans l'envoi de votre fichier. ";
                    }
                }
            } else {
                header('Location: indexAdmin.php');
                $uploadOk = 0;
            }
        }


    }

    /*======================================== livre d'or ====================================================*/

    function visitorBook($cPage)
    {
        $userManager = new \Projet\Models\UserManager();

        $numPage = $userManager->nbPagebook();
        if (!($cPage > 0 && $cPage <= $numPage)) {
            $cPage = 1;
        }

        $commentUser = $userManager->addCommentBook($cPage);
        $nbrCommentBook = $userManager->nbrVisitorBook();


        require 'app/views/backend/visitorBookAdminView.php';
    }

    /*======================================= suppression commentaire livre d'or ============================*/

    function deleteCommBook($idVisitorBook, $idUsers)
    {
        $userManager = new \Projet\Models\UserManager();
        $deleteCommVisitorBook = $userManager->deleteComm($idVisitorBook);

        $deleteUser = $userManager->deleteUser($idUsers);

        header('Location: indexAdmin.php?action=visitorBook');
    }

    /*============================== commentaire signalés ===================================*/

    function reportComment()
    {
        $userManager = new \Projet\Models\UserManager();
        $reportCom = $userManager->reportCommentUser();
        $nbrCommentReport = $userManager->nbrReportComment();


        require 'app/views/backend/reportCommentView.php';
    }

    /*============================ suppréssion d'un commentaire signaler  ========================*/

    function deleteReportComment($idPost, $idUsers)
    {
        $userManager = new \Projet\Models\UserManager();

        $deleteCommentUser = $userManager->deleteUserComment($idPost);

        $deleteUser = $userManager->deleteUser($idUsers);

        header('Location: indexAdmin.php?action=reportComment');
    }

    /*================================= message signalé livre d'or ===========================================*/

    function reportVisitorBook($cPage)
    {
        $userManager = new \Projet\Models\UserManager();

        $numPage = $userManager->nbPageReportBook();
        if (!($cPage > 0 && $cPage <= $numPage)) {
            $cPage = 1;
        }

        $reportCommentBook = $userManager->reportComment($cPage);
        $nbrReportBook = $userManager->nbrReportCommentBook();


        require 'app/views/backend/reportVisitorBook.php';
    }

    /*============================== spprimer un message signalé du livre d'or ================================*/

    function deleteReportVisitBook($idVisitorBook, $idUsers)
    {
        $userManager = new \Projet\Models\UserManager();
        $deleteCommVisitorBook = $userManager->deleteComm($idVisitorBook);

        $deleteUser = $userManager->deleteUser($idUsers);

        header('Location: indexAdmin.php?action=reportVisitorBook');
    }

    /*============================= page des commentaires admin =========================================*/

    function deleteComment($cPage)
    {
        $userManager = new \Projet\Models\UserManager();

        $numPage = $userManager->nbPageComment();
        if (!($cPage > 0 && $cPage <= $numPage)) {
            $cPage = 1;
        }

        $commentUsers = $userManager->commentpostUsers($cPage);
        $nbrComment = $userManager->nbrComents();


        require 'app/views/backend/commentUsersView.php';
    }

    /*============================ supprimer commentaire admin ================================================*/

    function deleteCommentUsers($idPost, $idUsers)
    {
        $userManager = new \Projet\Models\UserManager();

        $deleteCommentUser = $userManager->deleteUserComment($idPost);

        $deleteUser = $userManager->deleteUser($idUsers);

        header('Location: indexAdmin.php?action=deleteComment');
    }

    /*=========================== connexion admin page tableau de bord ===============================================*/


    function connexionAdm($pseudo, $mdp)
    { //recup du mot de pass
        $userManager = new \Projet\Models\UserManager();
        $connexAdm = $userManager->recupMdp($pseudo, $mdp);
        $resultat = $connexAdm->fetch();
        $isPasswordCorrect = password_verify($mdp, $resultat['pass']);
        $_SESSION['firstname'] = $resultat['firstname']; // transformation des variables recupérées en session
        $_SESSION['pass'] = $resultat['pass'];
        $_SESSION['idUsers'] = $resultat['idUsers'];
        if ($isPasswordCorrect) {

            $CrochetManager = new \Projet\Models\CrochetManager();
            $nbrItemCrochet = $CrochetManager->nbrItemC();

            $TricotManager = new \Projet\Models\TricotManager;
            $nbrItemTricot = $TricotManager->nbrItemt();

            $userManager = new \Projet\Models\UserManager();
            $nbrComment = $userManager->nbrComents();
            $nbrCommentReport = $userManager->nbrReportComment();
            $nbrCommentBook = $userManager->nbrVisitorBook();
            $nbrReportBook = $userManager->nbrReportCommentBook();
            $nbrMail = $userManager->nbrUserMail();

            require 'app/views/backend/tableauDeBordAdminView.php';
        } else {
            echo 'vos identifients sont incorrect';
            //require('views/backend/erreur.php');
        }


    }

    /*=========================== creation admin =======================================*/


    function creatAdmin($firstname, $pass)
    {
        $userManager = new \Projet\Models\UserManager();
        $mdp = $userManager->creatMdpAdmin($firstname, $pass);
    }

    /*========================== newMdp ===============================*/
    function newMdp($idUsers)
    {
        $userManager = new \Projet\Models\UserManager();
        $mdpAdmin = $userManager->newMdpAdmin($idUsers);

        require 'app/views/backend/newMdpView.php';
    }

    /*=========================== newName ===============================================================*/

    function newName($idUsers)
    {
        $userManager = new \Projet\Models\UserManager();
        $newNameAd = $userManager->newNameAd($idUsers);
        require 'app/views/backend/newNameAdmin.php';
    }

    /*======================= changer de nom admin ====================================*/

    function newNameAdmin($idUsers, $firstname)
    {
        $userManager = new \Projet\Models\UserManager();
        $newAdminName = $userManager->newAdminNAme($idUsers, $firstname);

        $_SESSION['firstname'] = $firstname;
        header('Location: indexAdmin.php?action=newName&idUsers=' . $idUsers);
    }

    /*=============================== retour tableau de bord ================================*/

    function tdbAdmin()
    {
        $CrochetManager = new \Projet\Models\CrochetManager();
        $nbrItemCrochet = $CrochetManager->nbrItemC();

        $TricotManager = new \Projet\Models\TricotManager;
        $nbrItemTricot = $TricotManager->nbrItemt();

        $userManager = new \Projet\Models\UserManager();
        $nbrComment = $userManager->nbrComents();
        $nbrCommentReport = $userManager->nbrReportComment();
        $nbrCommentBook = $userManager->nbrVisitorBook();
        $nbrReportBook = $userManager->nbrReportCommentBook();
        $nbrMail = $userManager->nbrUserMail();


        require 'app/views/backend/tableauDeBordAdminView.php';
    }

    /*=========================== changer de mot de passe admin ===========================================*/

    function changeMdp($idUsers, $mdp, $newMdp)
    {
        if ($newMdp) {
            $userManager = new \Projet\Models\UserManager();
            $getMdp = $userManager->newMdpAdmin($idUsers);

            $verifMdp = $getMdp->fetch();
            $isPasswordCorrect = password_verify($mdp, $verifMdp['pass']);
            if ($isPasswordCorrect) {
                $newPass = password_hash($newMdp, PASSWORD_DEFAULT);
                $changePass = $userManager->changePass($idUsers, $newPass);

                require 'app/views/backend/messageMdp.php';
            } else {
                echo 'votre mot de passe actuel est erroné';
            }
        }

    }

    /*=========================== page EmailView  ==========================================*/

    function mail()
    {
        $userManager = new \Projet\Models\UserManager();
        $mailUser = $userManager->mailAdmin();
        $nbrMail = $userManager->nbrUserMail();

        require 'app/views/backend/emailView.php';
    }

    /*=========================== supprimer un mail ==================================*/
    function deleteMail($idContact)
    {
        $userManager = new \Projet\Models\UserManager();
        $deleteEmail = $userManager->deleteMailUser($idContact);

        header('Location: indexAdmin.php?action=mail');
    }
}