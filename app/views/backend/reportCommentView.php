<?php ob_start(); ?>
<?php $commentReport = $nbrCommentReport->fetch() ?>

    <div class="titleCrochet">
        <h1>Commentaires signalés</h1>
    </div>

    <div class="nbrArticles">
        <h2>Vous avez <?= $commentReport[0] ?> commentaire(s) de signalés</h2>
    </div>
    <hr>
<?php
while ($report = $reportCom->fetch()) {
    ?>
    <div class="commentairesArticle">
        <div class="detailArticle">
            <div class="dateComment">
                <p><?= $report['date_fr'] ?></p>
            </div>
            <br>
            <div class="pseudoComment">
                <p>Pseudo :<br><?= $report['firstname'] ?></p>
            </div>
            <br>
            <div class="commentText">
                <p>Commentaire :<br><?= $report['content'] ?></p>
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
                            <a href="indexAdmin.php?action=deleteReportComment&idPost=<?= $report['idPost'] ?>&idUsers=<?= $report['idUsers'] ?>">Supprimer
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
$reportCom->closeCursor();
?>

    <p id="numberPages">Pages : <?php
        for ($i = 1; $i <= $numPage; $i++) {
            echo "<a href=\"indexAdmin.php?action=reportComment&p=$i\">$i </a>";
        }

        ?>
    </p>

<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>