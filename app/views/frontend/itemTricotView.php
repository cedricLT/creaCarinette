<!DOCTYPE html>

<?php ob_start(); ?>

<h1 class="h1Title">Créations Tricot</h1>

<?php $donner = $lookItem ?>
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
<!--====================== commentaires ============================================-->
<div class="commentDropUsers">
    <h4>Ecrire un commentaire :</h4>
    <form action="index.php?action=commentTricot&idItem=<?= htmlspecialchars($donner['idItem']) ?>"
          method="post">
        <table>
            <tr>
                <td>
                    <div class="pseudo"><label for="pseudo">Pseudo :</label>
                        <input required type="text" name="firstname" class="membrePseudo"/>
                    </div>


                </td>
            </tr>
            <tr>
                <td>
                    <div class="message"><label for="message">Commentaire :</label>
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
    <!-- affichage des commentaire -->
    <div class="commentReponse">

        <?php


        function displayChildren($idParent, $orderedComment){
        if (array_key_exists($idParent, $orderedComment)){
        foreach ($orderedComment [$idParent]['children'] as $child) {

        ?>
        <div class="commentCrochet">
            <div class="commentItemCrochet">
                <div class="commentDates">
                    <p>le : <?= $child['dates'] ?></p>
                </div>

                <div class="commentPseudo">
                    <p>de : <?= $child['firstname'] ?></p>
                </div>

                <div class="commentText">
                    <p>commentaire : <?= $child['content'] ?></p>
                </div>

                <?= $child['idParent'] ?>
            </div>
            <div class="report">

                <button>
                    <!--<a href="index.php?action=reportCommentCrochet&idItem=<?= $child['idItem'] ?>&idPost=<?= $child['idPost'] ?>">Signaler
                        le commentaire</a>-->
                </button>

            </div>


            <div class="formComment">

                <input type="submit" class="submit_btn" value="Répondre"/>

                <div class="reponseUser">
                    <h2>Réponse</h2>

                    <form action="index.php?action=repCommentTricot&idItem=<?= $child['idItem'] ?>&idPostParent=<?= $child['idPost'] ?>"
                          method="post">

                        <label for="pseudo">Pseudo :</label>
                        <input required type="text" name="repPrenom" class="repPseudo"/>

                        <label for="message">Commentaire :</label>
                        <textarea required name="content" class="comment"></textarea>

                        <div class="btnRep">
                            <input type="submit" class="submit_btn" value="Envoyer"/>
                    </form>

                    <input type="submit" class="submit_cancel" value="Annuler"/>


                </div>

            </div>


        </div>

    </div>
    <?php
    displayChildren($child['idPost'], $orderedComment);
    }

    }
    }
    $root = 0;
    displayChildren($root, $orderedComment);
    ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require 'templates/template.php'; ?>
