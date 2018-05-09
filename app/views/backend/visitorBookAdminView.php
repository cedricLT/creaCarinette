<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="app/public/css/styleAdmin.css">
</head>

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
            supprimer ce commentaire
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
                                <a href="indexAdmin.php?action=deleteCommBook&idVisitorBook=<?= $commentBook['idVisitorBook'] ?>">Supprimer
                                    le commentaire</a>

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


</div>





