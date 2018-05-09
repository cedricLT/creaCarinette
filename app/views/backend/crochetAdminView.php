<!--page Crochet admin-->
<!DOCTYPE html>
<html lang="fr">
<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="app/public/css/styleAdmin.css">
</head>
<body>

<h1>Gérer vos articles Crochets</h1>

<a href="indexAdmin.php?action=nouveauCrochet"><h3>Créer un nouvel Article Crochet</h3></a>

<div class="contener">

    <?php while ($donner = $recCrochets->fetch()) { ?>

        <div class="blockCrochet">
            <?= $donner['dates_fr'] ?>

            <h3><?= $donner['title'] ?></h3>

            <div class="creationIMG">
                <img src="<?= $donner['img'] ?>" alt="Créa-carinette crochet tricot">

            </div>
            <div class="creationText">
                <P><?= $donner['content'] ?></P>
            </div>
            <div class="gererArticle">

                <div class="voir">
                    <a href="">Voir cette Article sur la page</a>
                </div>


                <!--<div class="modifImg">
                    <button>Modifier l'image de cet Article</button>
                </div>

                <div class="modif">
                    <form action="indexAdmin.php?action=modifImg&idItem=<?= $donner['idItem'] ?>" method="post"
                          enctype="multipart/form-data">
                        Selectionner une image:
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <input type="submit" value="Upload Image" name="submit">
                    </form>
                    <div class="delete_cancel">
                        <button >Annuler</button>
                    </div>
                </div>-->

                <div class="modifText">
                    <a href="indexAdmin.php?action=viewItemCrochet&idItem=<?= $donner['idItem'] ?>">Modifier le
                        texte de cet Article</a>
                </div>

                    <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Modifier l'image</button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title"> Sélectionner une image:</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="indexAdmin.php?action=modifImg&idItem=<?= $donner['idItem'] ?>" method="post"
                                          enctype="multipart/form-data">
                                        <input type="file" name="fileToUpload" id="fileToUpload">
                                        <input type="submit" value="Envoyer" name="submit" id='upload'>

                                    </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                </div>
                            </div>
                        </div>
                    </div>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    supprimer cet article
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="exampleModalLabel">confirmation de suppression </h4>
                            </div>
                            <div class="modal-body">
                                <div class="suppre">
                                    <a href="indexAdmin.php?action=deleteItemCrochet&idItem=<?= $donner['idItem'] ?>">Supprimer cet Article</a>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">annuler</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <?php
    }
    $recCrochets->closeCursor();
    ?>
</div>
<script src="app/public/js/uploadImg.js"></script>
<script src="app/public/js/img.js"></script>
</body>
</html>