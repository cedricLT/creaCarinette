<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <?php require 'templates/templateHead.php' ?>
    <title>Créa-carinette</title>
</head>
<body>
<div class="homePage">
    <div class="container">
        <?php require 'templates/templateMenu.php' ?>
        <?php require 'templates/templatetitleCrochet.php' ?>
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
                                <div class="pseudo"><label for="pseudo">Pseudo :</label>
                                    <input required type="text" name="firstname" class="membrePseudo"/>
                                </div>


                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="message"><label for="message">Commentaire :</label>
                                    <textarea name="content" class="comment"></textarea>
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
                    <p>le : <?= $comment['dates'] ?></p>
                    <p>de : <?= $comment['firstname'] ?></p>
                    <p>commentaire : <?= $comment['content'] ?></p>
                    <?php
                }
                $commentUserCrochet->closeCursor();
                ?>

            </div>
        </div>
        <?php require 'templates/templateFooter.php' ?>
    </div>
</div>
</body>
</html>