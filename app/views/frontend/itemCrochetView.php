<?php ob_start(); ?>
<h1 class="h1Title">Creations Crochet</h1>


<?php $donner = $getCrochet ?>
<div class="row">
    <div class="blockCrochetItemC col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="titleItemC col-xs-12 col-sm-12">
            <h3><?= $donner['title'] ?></h3>
        </div>
        <div class="creationIMGItemC col-xs-12 col-sm-4 col-md-6">
            <a href="<?= $donner['img'] ?>"><img src="<?= $donner['img'] ?>" alt="Titoune&laine crochet tricot"></a>
        </div>
        <div class="creationTextItemC col-xs-12 col-sm-8 col-md-5">
            <P><?= $donner['contents'] ?></P>
        </div>
    </div>
</div>
<hr>
<!--====================== commentaires ============================================-->

<div class="commentDropUsers">
    <h4>Ecrire un commentaire :</h4>
    <form action="index.php?action=commentCrochet&idItem=<?= htmlspecialchars($donner['idItem']) ?>"
          method="post">
        <table>
            <tr>
                <td>
                    <div class="pseudo">
                        <label for="pseudo">Pseudo :</label>
                        <input required type="text" name="firstname" class="membrePseudo" placeholder="Votre pseudo"/>
                    </div>


                </td>
            </tr>
            <tr>
                <td>
                    <div class="message">
                        <label for="message">Commentaire :</label>
                        <textarea required name="content" class="comment" placeholder="Votre commentaire"></textarea>
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
    <hr>
</div>


<!-- affichage des commentaires -->

<div class="commentReponse">


    <?php


    function displayChildren($idParent, $orderedComment, $offset){
    if (array_key_exists($idParent, $orderedComment)){
    foreach ($orderedComment [$idParent]['children'] as $child) {
    ?>


    <div class="commentCrochet child<?= $offset ?>">
        <div class="commentItemCrochet">
            <div class="commentDates" id="ancre<?= $child['idPost'] ?>">
                <p><?= $child['dates'] ?></p>
            </div>

            <div class="commentPseudo">
                <p><?= $child['firstname'] ?></p>
            </div>

            <div class="commentText">
                <p><?= $child['content'] ?></p>
            </div>
        </div>
        <hr>
        <!-- bnt modal -->
        <div class="row">
            <div class="tbn col-xs-12 col-sm-12 col-md-12 col-lg-12">


                <?php if ( $child['idParent'] <= 0) { ?>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?= $child['idPost'] ?>">
                        Répondre
                    </button>

                <?php
                }
                ?>


                <div class="report">

                    <button>
                        <a
                                href="index.php?action=reportCommentCrochet&idItem=<?= $child['idItem'] ?>&idPost=<?= $child['idPost'] ?>#ancre">Signaler
                            ce commentaire</a>
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?= $child['idPost'] ?>" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="exampleModalLabel">Répondre au commentaire</h4>
                    </div>
                    <div class="modal-body">


                        <form action="index.php?action=repCommentCrochet&idItem=<?= $child['idItem'] ?>&idPostParent=<?= $child['idPost'] ?>"
                              method="post">

                            <label for="pseudo">Pseudo :</label>
                            <input required type="text" name="repPrenom" class="repPseudo" placeholder="Votre pseudo">
                            <label for="message">Commentaire :</label>
                            <textarea required name="content" class="comments">

                            </textarea>

                            <div class="btnRep">
                                <input type="submit" class="submit_btn" value="Envoyer"/>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">annuler</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
displayChildren($child['idPost'], $orderedComment, $offset+1);
}

}
}
$offset = 0;
$root = 0;
displayChildren($root, $orderedComment, $offset);
?>

<?php $content = ob_get_clean(); ?>

<?php require 'templates/template.php'; ?>
