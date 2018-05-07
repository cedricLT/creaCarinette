<?php

namespace Projet\Controllers;

class ControllerAdmin
{
    function tableauDeBord()
    {
        require 'app/views/backend/tableauDeBordAdminView.php';
    }

    /*==================== page de tous les items crochet =========================================================*/

    function crochetsAdmin()
    {
        $CrochetManager = new \Projet\Models\CrochetManager();
        $recCrochets = $CrochetManager->getCrochets();

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

        $CrochetManager = new \Projet\Models\CrochetManager();


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



                        header('Location: indexAdmin.php');
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


}