<?php ob_start(); ?>

<?php $mail = $nbrMail->fetch() ?>

    <div class="titleCrochet">
        <h1>Vos E-mail <?= $_SESSION['firstname'] ?></h1>
    </div>
    <div class="nbrArticles">
        <h2>Vous avez <?= $mail[0] ?> E-mail</h2>
    </div>
    <hr>
<?php
while ($mail = $mailUser->fetch()) {
    ?>
    <div class="mailAdmin">

        <div class="dates">
            <p><?= $mail['date_fr'] ?></p>
        </div>

        <div class="destinat">
            <h4>Vous avez reçue un mail de <?= $mail['firstname'] ?></h4>
        </div>

        <div class="expediteur">
            <p><?= $mail['lastname'] ?> <?= $mail['firstname'] ?>  <?= $mail['mail'] ?></p>
        </div>

        <br><br>

        <div class="messageExpediteur">
            <p><?= $mail['content'] ?></p>
        </div>


        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Supprimer ce mail
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
                            <a href="indexAdmin.php?action=deleteMail&idContact=<?= $mail['idContact'] ?>">Supprimer ce
                                mail</a>
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
$mailUser->closeCursor();
?>
    <p id="numberPages">Pages : <?php
        for ($i = 1; $i <= $numPage; $i++) {
            echo "<a href=\"indexAdmin.php?action=mail&p=$i\">$i </a>";
        }
        $mailUser->closeCursor();
        ?>
    </p>
<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>