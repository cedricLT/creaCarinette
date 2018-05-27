<?php ob_start(); ?>

<?php $commentReportBook = $nbrReportBook->fetch() ?>

    <div class="titleCrochet">
        <h1>Message Signalé du livre d'or</h1>
    </div>

    <div class="nbrArticles">
        <h2>Vous avez <?= $commentReportBook[0] ?> message(s) signalé(s) </h2>
    </div>
    <hr>
<?php
while ($report = $reportCommentBook->fetch()) {
    ?>
    <div class="contentVisitorBook">
        <div class="detailArticle">
            <div class="dates">
                <p><?= $report['date_fr'] ?></p>
            </div>
            <br>
            <div class="nom">
                <p>nom :<?= $report['lastname'] ?></p>
            </div>
            <br>
            <div class="prenom">
                <p>Prénom : <?= $report['firstname'] ?></p>
            </div>
            <br><br>
            <div class="message">
                <p>Message :<br><?= $report['content'] ?></p>
            </div>
            <br><br>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                supprimer ce message
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
                            <div class="suppre">
                                <a href="indexAdmin.php?action=deleteReportVisitBook&idVisitorBook=<?= $report['idVisitorBook'] ?>&idUsers=<?= $report['idUsers'] ?>">Supprimer
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
    </div>
    <?php
}
$reportCommentBook->closeCursor();
?>
    <p id="numberPages">Pages : <?php
        for ($i = 1; $i <= $numPage; $i++) {
            echo "<a href=\"indexAdmin.php?action=reportVisitorBook&p=$i\">$i </a>";
        }
        $reportCommentBook->closeCursor();
        ?>
    </p>
<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>