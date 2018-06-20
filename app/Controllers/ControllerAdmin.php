<?php

namespace Projet\Controllers;

use Projet\Models\ItemsManager;
use Projet\Models\UserManager;

class ControllerAdmin
{
    function connexion()
    {

        require 'app/views/backend/connexionAdminView.php';
    }

    /*==================== page de tous les items  =========================================================*/

    function creationAdmin($cPage, $type)
    {
        $ItemsManager = new \Projet\Models\ItemsManager();

        $numPage = $ItemsManager->nbPage($type);
        if (!($cPage > 0 && $cPage <= $numPage)) {
            $cPage = 1;
        }

        $recCrochets = $ItemsManager->getCreations($cPage, $type);

        $nbrItemCrochet = $ItemsManager->nbrItemC($type);

        $recItem = $recCrochets->fetchAll();
        if ($type === 'publication'){
            require 'app/views/backend/publicationAdminViews.php';
        }else{
            require 'app/views/backend/creationAdminView.php';
        }
        


    }

    /*======================= affichage article crochet tricot publication ==============================*/
    function viewItemCreation($idItem)
    {
        $ItemsManager = new \Projet\Models\ItemsManager();
        $modifItemC = $ItemsManager->item($idItem);

        require 'app/views/backend/modifItemView.php';
    }


    /*========================= modification du texte article crochet ==============================*/

    function modifItem($idItem, $title, $content, $type)
    {
        $ItemsManager = new \Projet\Models\ItemsManager;
        $newItemCrochet = $ItemsManager->modifItem($idItem, $title, $content);


        header('Location: indexAdmin.php?action=creationAdmin&type='.$type);

    }

    /*========================== modification d'une image crochet, tricot, publication =======================*/

    function modifImg($idItem, $type)
    {

        $target_dir = "app/public/img/"; //spécifie le répertoire où le fichier va être placé
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);// spécifie le chemin du fichier à télécharger
        $uploadOk = 1; // n'est pas encore utilisé (sera utilisé plus tard)
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //contient l'extension du fichier (en minuscules)
        try {
            // on vérifie que le fichier image est une image réelle
            if (!empty($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    // Check file size
                    if ($_FILES["fileToUpload"]["size"] > 500000) {
                        throw new \Exception('Désolé, votre fichier est trop volumineux.');
                        $uploadOk = 0;
                    }
                    // Allow certain file formats
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif") {
                        throw new \Exception('Seuls les formats JPG, JPEG, PNG & GIF files sont authorisés.');
                        $uploadOk = 0;
                    }
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        throw new \Exception('Désolé, votre avatar n\'a pu être envoyé.');
                        // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            $ItemsManager = new \Projet\Models\ItemsManager;
                            $newImgItem = $ItemsManager->modifImgItem($idItem, $target_file);

                            header('Location: indexAdmin.php?action=creationAdmin&type='.$type);

                        } else {
                            throw new \Exception('Désolé, une erreur est survenue dans l\'envoi de votre fichier.');
                        }
                    }
                } else {
                    header('Location: indexAdmin.php?action=creationAdmin&type='.$type);
                    $uploadOk = 0;
                }
            }
        } catch (Exception $e) {
            require 'app/views/backend/errorImg.php';

        }

    }

    /*========================== suppression d'un article et de ses commentaire et utilisateur attenant ======================*/

    function deleteItem($idItem, $type)
    {


        $Usermager = new \Projet\Models\UserManager;
        $getUsersPost = $Usermager->getUserPost($idItem);
        $getUsersPost2 = $getUsersPost->fetchAll();
        $deleteCom = $Usermager->deleteComItem($idItem);

        foreach ($getUsersPost2 as $deleteidUsers){
            $deleteSingleidUsers = $deleteidUsers[0];
            $suppreIdUsers = $Usermager->deleteIdUsers($deleteSingleidUsers);

        }

        $ItemsManager = new \Projet\Models\ItemsManager;
        $deleteItem = $ItemsManager->delete($idItem);

        header('Location: indexAdmin.php?action=creationAdmin&type='.$type);

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

    function reportComment($cPage)
    {
        $userManager = new \Projet\Models\UserManager();

        $numPage = $userManager->nbPageCommentReport();
        if (!($cPage > 0 && $cPage <= $numPage)) {
            $cPage = 1;
        }

        $reportCom = $userManager->reportCommentUser($cPage);
        $nbrCommentReport = $userManager->nbrReportComment();


        require 'app/views/backend/reportCommentView.php';
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

    /*==================== supprimer commentaire admin parents et enfants signaler ou non =============================*/

    function deleteCommentUsers($idPost, $idUsers)
    {
        $userManager = new \Projet\Models\UserManager();

        $getUsersParent = $userManager->getUserParent($idPost);
        $getUsersParent2 = $getUsersParent->fetchAll();
        $deleteCommentUser = $userManager->deleteUserComment($idPost);


        $deleteCommentParent = $userManager->deleteUserParent($idPost);

        $deleteUser = $userManager->deleteUser($idUsers);

        foreach ($getUsersParent2 as $singleUser) {
            $newSingleUser = $singleUser[0];
            $deleteUserParent = $userManager->deleteUser($newSingleUser);
        }
        header('Location: indexAdmin.php?action=tdbAdmin');
    }

    /*=========================== connexion admin sur la  page tableau de bord ===============================================*/


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

            header('Location: indexAdmin.php?action=tdbAdmin');
        } else {
            throw new \Exception('vos identifients sont incorrect');
        }
    }

    /*=============================== retour tableau de bord ================================*/

    function tdbAdmin()
    {
        $ItemsManager = new \Projet\Models\ItemsManager();
        $nbrItemCrochet = $ItemsManager->nbrItemCrochet();

        $nbrItemTricot = $ItemsManager->nbrItemt();

        $userManager = new \Projet\Models\UserManager();
        $nbrComment = $userManager->nbrComents();
        $nbrCommentReport = $userManager->nbrReportComment();
        $nbrCommentBook = $userManager->nbrVisitorBook();
        $nbrReportBook = $userManager->nbrReportCommentBook();
        $nbrMail = $userManager->nbrUserMail();
        $nbrPublications = $userManager->nbrPubliation();

        require 'app/views/backend/tableauDeBordAdminView.php';
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
                throw new \Exception('votre mot de passe actuel est erroné');
            }
        }

    }

    /*=========================== page EmailView  ==========================================*/

    function email()
    {
        require 'app/views/backend/emailView.php';

    }

    /*=========================== supprimer un mail ==================================*/
    function deleteMail($idContact)
    {
        $userManager = new \Projet\Models\UserManager();
        $deleteEmail = $userManager->deleteMailUser($idContact);

        header('Location: indexAdmin.php?action=email');
    }

    /*========================= lire text homeview ========================================================*/

    function homeText()
    {
        $userManager = new \Projet\Models\UserManager();
        $newtext = $userManager->readContentHome();

        require 'app/views/backend/textHomeView.php';
    }

    /*======================= new text home ================================================*/

    function newtextHome($content)
    {
        $userManager = new \Projet\Models\UserManager();
        $newtext = $userManager->contentHome($content);

        header('Location:indexAdmin.php?action=homeText');
    }

    /*==================== photo accueil ================================================================*/

    function imgHome()
    {
        $userManager = new \Projet\Models\UserManager();
        $imgHome = $userManager->imgHome();
        require 'app/views/backend/newImgHomeView.php';
    }

    /*===================== changer l'image de la page d'accueil =========================================*/

    function newImgHome()
    {
        $target_dir = "app/public/img/profile"; //spécifie le répertoire où le fichier va être placé
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);// spécifie le chemin du fichier à télécharger
        $uploadOk = 1; // n'est pas encore utilisé (sera utilisé plus tard)
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //contient l'extension du fichier (en minuscules)
        try {
            // on vérifie que le fichier image est une image réelle
            if (!empty($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    // Check file size
                    if ($_FILES["fileToUpload"]["size"] > 5000000) {
                        throw new \Exception('Désolé, votre fichier est trop volumineux.');
                        $uploadOk = 0;
                    }
                    // Allow certain file formats
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif") {
                        throw new \Exception('Seuls les formats JPG, JPEG, PNG & GIF files sont authorisés.');
                        $uploadOk = 0;
                    }
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        throw new \Exception('Désolé, votre avatar n\'a pu être envoyé.');
                        // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                            $userManager = new \Projet\Models\UserManager();
                            $newImg = $userManager->newImgHome($target_file);

                            header('Location: indexAdmin.php?action=imgHome');

                        } else {
                            throw new \Exception('Désolé, une erreur est survenue dans l\'envoi de votre fichier.');
                        }
                    }
                } else {
                    throw new \Exception('Ce fichier n\'est pas une image.');
                    $uploadOk = 0;
                }
            }
        } catch (Exception $e) {
            require 'app/views/backend/errorImg.php';

        }
    }
 /*============================================== new publication ======================================================*/

    function newPublication()
    {
        require 'app/views/backend/newPublicationAdminView.php';
    }

    /*=================================== page new article ===================================*/

    function pageNewArticle()
    {
        require_once 'app/views/backend/newArticle.php';
    }


    /*=============================== email json ajax ==============================================*/

    function email_json()
    {
        $userManager = new \Projet\Models\UserManager();
        $mailUser = $userManager->mailAdmin2();

        header('Content-Type: application/json');
        $mailUser = $mailUser->fetchAll();
        echo json_encode($mailUser);
    }

    /*======================================== new article ================================*/

    function newItem($title, $content, $article)
    {
        $ItemsManager = new \Projet\Models\ItemsManager();
        $target_dir = "app/public/img/"; //spécifie le répertoire où le fichier va être placé
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);// spécifie le chemin du fichier à télécharger
        $uploadOk = 1; // n'est pas encore utilisé (sera utilisé plus tard)
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); //contient l'extension du fichier (en minuscules)

        if($target_file !== $target_dir) {

            try {
                // on vérifie que le fichier image est une image réelle
                if (isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if ($check !== false) {
                        // Check file size
                        if ($_FILES["fileToUpload"]["size"] > 500000) {
                            throw new \Exception('Désolé, votre fichier est trop volumineux.');
                            $uploadOk = 0;
                        }
                        // Allow certain file formats
                        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                            && $imageFileType != "gif") {
                            throw new \Exception('Seuls les formats JPG, JPEG, PNG & GIF files sont authorisés.');
                            $uploadOk = 0;
                        }
                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                            throw new \Exception('Désolé, votre avatar n\'a pu être envoyé.');
                            // if everything is ok, try to upload file
                        } else {
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {


                                $newItem = $ItemsManager->newCreatItem($title, $content, $target_file, $article);
                                header('Location: indexAdmin.php?action=creationAdmin&type=' . $article);


                            } else {
                                throw new \Exception('Désolé, une erreur est survenue dans l\'envoi de votre fichier.');

                            }
                        }
                    } else {
                        throw new \Exception('Ce fichier n\'est pas une image.');
                        $uploadOk = 0;
                    }
                }
            } catch (Exception $e) {
                require 'app/views/backend/errorImg.php';
            }
        }else{
            $newItem = $ItemsManager->newCreatItem($title, $content, $target_file, $article);
            header('Location: indexAdmin.php?action=creationAdmin&type=' . $article);
        }
    }
}