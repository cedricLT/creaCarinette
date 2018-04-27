<!DOCTYPE html>
<?php ob_start(); ?>

<h1 class="h1Title">Creations Crochet</h1>

<?php $donner = $getCrochet ?>
<div class="blockCrochet">
    <p class="DateAdd">Ajouté le :<?= $donner['dates_fr'] ?></p>
    <h3><?= $donner['title'] ?></h3>
    <div class="creationIMG">
        <img src="<?= $donner['img'] ?>" alt="Créa-carinette crochet tricot">
    </div>
    <div class="creationText">
        <P><?= $donner['content'] ?></P>
    </div>
</div>

<div class="commentCrochet">
    <div class="commentDropUsers">
        <h4>Ecrire un commentaire :</h4>
        <form action="index.php?action=commentCrochet&idItem=<?= htmlspecialchars($donner['idItem']) ?>"
              method="post">
            <table>
                <tr>
                    <td>
                        <div class="pseudo">
                            <label for="pseudo">Pseudo :</label>
                            <input required type="text" name="firstname" class="membrePseudo"/>
                        </div>


                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="message">
                            <label for="message">Commentaire :</label>
                            <textarea required name="content" class="comment"></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" class="submit_btn" value="Envoyer"/>
                    </td>
                </tr>

            </table>
        </form>
    </div>
    <div class="commentItemCrochet">
        <?php
        while ($comment = $commentUserCrochet->fetch()) {
            ?>
            <table>
                <tr>
                    <td>
                        <div class="commentDates">
                            <p>le : <?= $comment['dates'] ?></p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="commentPseudo">
                            <p>de : <?= $comment['firstname'] ?></p>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="commentText">
                            <p>commentaire : <?= $comment['content'] ?></p>
                        </div>
                    </td>
                </tr>
            </table>
            <div class="report">

                <button><a href= "index.php?action=reportCommentCrochet&idItem=<?= $comment['idItem'] ?>&idPost=<?= $comment['idPost'] ?>">Signaler le commentaire</a></button>
            </div>
            <?php
        }
        $commentUserCrochet->closeCursor();
        ?>

    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require 'templates/template.php'; ?>