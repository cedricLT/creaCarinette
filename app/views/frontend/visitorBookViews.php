<!DOCTYPE html>
<?php ob_start(); ?>

<h1 class="h1Title">Livre D'Or</h1>

<div class="commentCrochet">
    <div class="commentDropUsers">
        <h4>Ecrire un commentaire :</h4>
        <form action="index.php?action=commentBook" method="post">

            <table>
                <tr>
                    <td>
                        <div class="name">
                            <label for="name">Nom :</label>
                            <input required type="text" name="lastnameBook" class="lastnameBook">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="pseudo">
                            <label for="pseudo">Prénom :</label>
                            <input required type="text" name="firstnameBook" class="firstnameBook"/>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="message"><label for="message">Commentaire :</label>
                            <textarea required name="contentBook" class="commentBook"></textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" class="submit_btn" value="Poster"/>
                    </td>
                </tr>

            </table>
        </form>

        <div class="contentVisitorBook">
            <?php
            if (!(empty($commentUser))) {
                $newComment = $commentUser->fetchAll();


                foreach ($newComment as $commentBook) {
                    ?>
                    <table>
                        <tr>
                            <td>
                                <div class="dates">
                                    <p>Le :<?= $commentBook['date_fr'] ?></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="nom">
                                    <p>nom : <?= $commentBook['lastname'] ?></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="prenom">
                                    <p>Prénom : <?= $commentBook['firstname'] ?></p>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="message">
                                    <p>Commentaire : <?= $commentBook['content'] ?></p>
                                </div>
                            </td>
                        </tr>
                    </table>

                    <div class="report">
                        <button>
                            <a href="index.php?action=reportCommentBook&idVisitorBook=<?= $commentBook['idVisitorBook'] ?>&idUsers=<?= $commentBook['idUsers'] ?>">Signaler
                                le commentaire</a>
                        </button>
                    </div>
                <?php }
            }

            ?>


        </div>
    </div>

    <?php $content = ob_get_clean(); ?>

    <?php require 'templates/template.php'; ?>
