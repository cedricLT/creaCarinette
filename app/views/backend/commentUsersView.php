<?php ob_start(); ?>

<?php $comment = $nbrComment->fetch() ?>

    <div class="titleCrochet">
        <h1>Tous les commentaires par Articles</h1>
    </div>

    <div class="nbrArticles">
        <h2>Vous avez <?= $comment[0] ?> commentaire</h2>
    </div>
    <hr>
<?php
while ($comment = $commentUsers->fetch()) {

    ?>
    <div class="commentairesArticle">
        <div class="detailArticle">
            <div class="nameArticle">
                <p>Article :<?= $comment['categorie'] ?> <br> numero <?= $comment['idItem'] ?></p>
            </div>
            <br>
            <div class="dateComment">
                <p>Le :<?= $comment['date_fr'] ?></p>
            </div>
            <br>
            <div class="pseudoComment">
                <p>Pseudo :<br><?= $comment['firstname'] ?></p>
            </div>
            <br>
            <div class="commentText">
                <p>Commentaire :<br><?= $comment['content'] ?></p>
            </div>
        </div>

        <br><br>

        <div class="btnDelete">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                supprimer ce commentaire
            </button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
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
                            <a href="indexAdmin.php?action=deleteCommentUsers&idPost=<?= $comment['idPost'] ?>&idUsers=<?= $comment['idUsers'] ?>">Supprimer
                                ce commentaire</a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">annuler</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <?php
}

$commentUsers->closeCursor();
?>

    <p id="numberPages">Pages : <?php
        for ($i = 1; $i <= $numPage; $i++) {
            echo "<a href=\"indexAdmin.php?action=deleteComment&p=$i\">$i </a>";
        }

        ?>
    </p>

<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>