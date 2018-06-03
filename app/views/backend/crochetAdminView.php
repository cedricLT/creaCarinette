<!--page Gérer vos articles Crochets admin-->
<?php ob_start(); ?>

<?php $item = $nbrItemCrochet->fetch() ?>

<div class="titleCrochet">
    <h1>Gérer vos articles Crochets</h1>
</div>

<div class="nbrArticles">
    <h2>vous avez <?= $item[0] ?> Articles</h2>
</div>

<div class="createArticle">
    <button><a href="indexAdmin.php?action=nouveauCrochet">Créer un nouvel Article Crochet</a></button>
</div>

<hr>

<?php while ($donner = $recCrochets->fetch()) { ?>

    <div class="blockCrochet">

        <div class="numbArticleDates">
            <h4>Article numero : <?= $donner['idItem'] ?></h4></p>
            <h4>Créé le :<?= $donner['dates_fr'] ?></h4>
        </div>

        <div class="titleArticle">
            <h3><?= $donner['title'] ?></h3>
        </div>
        <div class="row">
            <div class="imgText col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="creationIMG col-xs-12 col-sm-12 col-md-5 col-lg-5">
                    <img src="<?= $donner['img'] ?>" alt="Titoune&Laine création crochet tricot laine">

                </div>
                <div class="creationText col-xs-12 col-sm-12 col-md-7 col-lg-7">
                    <P><?= $donner['contents'] ?></P>
                </div>
            </div>
        </div>
        <div class="gererArticle">

            <div class="modifText">
                <button><a href="indexAdmin.php?action=viewItemCrochet&idItem=<?= $donner['idItem'] ?>">Modifier le
                        texte de cet Article</a></button>
            </div>
            <div class="btnItem">
                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
                    Modifier
                    l'image
                </button>

                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"> Sélectionner une image:</h4>
                            </div>
                            <div class="modal-body">
                                <form action="indexAdmin.php?action=modifImg&idItem=<?= $donner['idItem'] ?>"
                                      method="post"
                                      enctype="multipart/form-data">

                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                    <br>
                                    <div class="img">
                                        <img id="blah" src="#" alt="image"/>
                                        <br>
                                        <br>
                                        <input type="submit" value="Envoyer" name="submit" id='upload'>
                                    </div>
                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    supprimer cet article
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <a href="indexAdmin.php?action=deleteItemCrochet&idItem=<?= $donner['idItem'] ?>">Supprimer
                                        cet Article</a>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">annuler
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <hr>
    <?php
}
$recCrochets->closeCursor();
?>

<p id="numberPages">Pages : <?php
    for ($i = 1; $i <= $numPage; $i++) {
        echo "<a href=\"indexAdmin.php?action=crochetAdmin&p=$i\">$i </a>";
    }

    ?>
</p>
<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>