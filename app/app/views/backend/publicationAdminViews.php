<?php ob_start(); ?>
<div class="titleCrochet">
    <h1>toutes vos publications</h1>
</div>

<div class="newPublis">
    <a href="indexAdmin.php?action=newArticle&type=publication">
        <button>Créer une nouvelle publication</button>
    </a>
</div>

<br><br>
<hr>
<br>

<?php foreach ($recItem as $look) {
    ?>
    <div class="publicationAdmin">
        <div class="publisDate">
            <p>publier le <?= $look ['dates_fr'] ?></p>
        </div>
        <h3><?= $look ['idItem'] ?></h3>
        <h3><?= $look ['title'] ?></h3>

        <?php
        if ($look ['img'] !== "app/public/img/") {
            ?><img src="<?= $look ['img'] ?>" alt="titoune&laine">
            <?php
        }
        ?>
        <div class="publicationText">
            <p><?= $look ['contents'] ?></p>
        </div>
        <div class="btnItem">
            <div class="btnItem">
                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal"
                        data-target="#myModal<?= $look ['idItem'] ?>">Modifier
                    l'image
                </button>
                <!-- Modal -->
                <div class="modal fade" id="myModal<?= $look ['idItem'] ?>" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"> Sélectionner une image:</h4>
                            </div>
                            <div class="modal-body">
                                <form action="indexAdmin.php?action=modifImg&idItem=<?= $look['idItem'] ?>&type=<?= $_GET['type'] ?>"
                                      method="post"
                                      enctype="multipart/form-data">

                                    <input type="file" name="fileToUpload" id="fileToUpload" accept='image/*'
                                           onchange='openFile(event, <?= $look ['idItem'] ?>)'>
                                    <br>
                                    <div class="imgModal">
                                        <img id='output<?= $look ['idItem'] ?>'>
                                    </div>
                                    <br><br>
                                    <div class="subBtn">
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
                <div class="modifText">
                    <a href="indexAdmin.php?action=viewItemCreation&idItem=<?= $look['idItem'] ?>">
                        <button>Modifier le texte</button>
                    </a>
                </div>
                <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#exampleModal<?= $look ['idItem'] ?>">
                    supprimer
                </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal<?= $look ['idItem'] ?>" tabindex="-1" role="dialog"
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
                                <a href="indexAdmin.php?action=deleteItem&idItem=<?= $look['idItem'] ?>&type=<?=$_GET['type'] ?>">Supprimer</a>
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
    <hr>
    <?php

}

?>
<p id="numberPages">Pages : <?php
    for ($i = 1; $i <= $numPage; $i++) {
        echo "<a href=\"indexAdmin.php?action=crochetAdmin&type=publication&p=$i\">$i </a>";
    }

    ?>
</p>


<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>
