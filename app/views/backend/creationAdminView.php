<!--page Gérer vos articles admin-->
<?php ob_start(); ?>

<?php $item = $nbrItemCrochet->fetch() ?>



<div class="titleCrochet">
    <h1>Gérer vos articles <?=$_GET['type']?>s</h1>
</div>

<div class="nbrArticles">
    <h2>vous avez <?= $item[0] ?> Articles</h2>
</div>

<div class="createArticle">
    <a href="indexAdmin.php?action=newArticle&type=<?=$_GET['type']?>">
        <button>Créer un nouvel Article <?=$_GET['type']?></button>
    </a>
</div>

<hr>

<?php foreach ($recItem as $donner) { ?>

    <div class="blockCrochet">

        <div class="numbArticleDates">
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
                <a href="indexAdmin.php?action=viewItemCreation&idItem=<?= $donner['idItem'] ?>">
                    <button>Modifier le
                        texte
                    </button>
                </a>
            </div>
            <div class="btnItem">
                <!-- bouton modifier l image -->
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal"
                        data-target="#myModal<?= $donner['idItem'] ?>">
                    Modifier
                    l'image
                </button>

                <!-- Modal -->
                <div class="modal fade" id="myModal<?= $donner['idItem'] ?>" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"> Sélectionner une image:</h4>
                            </div>
                            <div class="modal-body">
                                <form action="indexAdmin.php?action=modifImg&idItem=<?= $donner['idItem'] ?>&type=<?= $_GET['type'] ?>"
                                      method="post"
                                      enctype="multipart/form-data">

                                    <input type="file" name="fileToUpload" id="fileToUpload" accept='image/*'
                                           onchange='openFile(event, <?= $donner['idItem'] ?>)'>
                                    <br>
                                    <div class="imgModal">
                                        <img id='output<?= $donner['idItem'] ?>'>
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

                <!-- bouton de suppression -->
                <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#exampleModal<?= $donner['idItem'] ?>">
                    supprimer cet article
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal<?= $donner['idItem'] ?>" tabindex="-1" role="dialog"
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
                                    <a href="indexAdmin.php?action=deleteItem&idItem=<?= $donner['idItem'] ?>&type=<?=$_GET['type'] ?>">Supprimer
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

?>

<p id="numberPages">Pages : <?php
    for ($i = 1; $i <= $numPage; $i++) {
        echo "<a href=\"indexAdmin.php?action=crochetAdmin&type=".$_GET['type']."&p=$i\">$i </a>";
    }

    ?>
</p>
<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>