<!DOCTYPE html>

<?php ob_start(); ?>

<h1 class="h1Title">Livre D'Or</h1>


<div class="contentVisitorBook">
    <?php

    while ($commentBook = $commentUser->fetch()) {

        ?>

        <div class="dates">
            <p>Le :<?= $commentBook['date_fr'] ?></p>
        </div>

        <div class="nom">
            <p>nom : <?= $commentBook['lastname'] ?></p>
        </div>

        <div class="prenom">
            <p>Prénom : <?= $commentBook['firstname'] ?></p>
        </div>

        <div class="message">
            <p>Commentaire : <?= $commentBook['content'] ?></p>
        </div>


        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            supprimer ce mesage
        </button>

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
                        <div class="report">
                            <button>
                                <a href="indexAdmin.php?action=deleteCommBook&idVisitorBook=<?= $commentBook['idVisitorBook'] ?>&idUsers=<?= $commentBook['idUsers'] ?>">Supprimer
                                    ce message</a>

                            </button>
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
    ?>
    <p id="numberPages">Pages : <?php
        for ($i = 1; $i <= $numPage; $i++) {
            echo "<a href=\"indexAdmin.php?action=visitorBook&p=$i\">$i </a>";
        }
        $commentUser->closeCursor();
        ?>
    </p>



</div>
<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>




