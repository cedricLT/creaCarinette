<?php ob_start(); ?>

<?php $commentBook = $nbrCommentBook->fetch() ?>

<div class="titleCrochet">
    <h1>Livre D'Or</h1>
</div>

<div class="nbrArticles">
    <h2>Vous avez <?= $commentBook[0] ?> message(s)</h2>
</div>

<hr>
<?php

while ($commentBook = $commentUser->fetch()) {

    ?>

    <div class="contentVisitorBook">
        <div class="detailArticle">
            <div class="dates">
                <p><?= $commentBook['date_fr'] ?></p>
            </div>

            <div class="nom">
                <p>nom : <?= $commentBook['lastname'] ?></p>
            </div>

            <div class="prenom">
                <p>Prénom : <?= $commentBook['firstname'] ?></p>
            </div>

            <br><br>
            <div class="message">
                <p>Message : <br><?= $commentBook['content'] ?></p>
            </div>
        </div>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?= $commentBook['idVisitorBook'] ?>">
            supprimer ce mesage
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?= $commentBook['idVisitorBook'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                <a href="indexAdmin.php?action=deleteCommBook&idVisitorBook=<?= $commentBook['idVisitorBook'] ?>&idUsers=<?= $commentBook['idUsers'] ?>">Supprimer
                                    ce message</a>

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
?>
<p id="numberPages">Pages : <?php
    for ($i = 1; $i <= $numPage; $i++) {
        echo "<a href=\"indexAdmin.php?action=visitorBook&p=$i\">$i </a>";
    }
    $commentUser->closeCursor();
    ?>
</p>


<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>




