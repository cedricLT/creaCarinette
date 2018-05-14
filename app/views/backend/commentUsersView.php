<!DOCTYPE html>
<?php ob_start(); ?>
<h1>Tous les commentaires par Articles</h1>

<?php
while ($comment = $commentUsers->fetch()){

    ?>
    <p>Article :<?= $comment['categorie'] ?> numero :<?= $comment['idItem'] ?></p>
    <p>Le :<?= $comment['dates'] ?></p>
    <p>Pseudo :<?= $comment['firstname'] ?></p>
    <p>Commentaire :<br><?= $comment['content'] ?></p>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        supprimer ce commentaire
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
                        <a href="indexAdmin.php?action=deleteCommentUsers&idPost=<?= $comment['idPost'] ?>&idUsers=<?= $comment['idUsers'] ?>">Supprimer ce commentaire</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">annuler</button>
                </div>
            </div>
        </div>
    </div>

<?php
}

$commentUsers->closeCursor();
?>

<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>