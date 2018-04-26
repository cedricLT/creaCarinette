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
                        <div class="pseudo">
                            <label for="pseudo">Prénom :</label>
                            <input required type="text" name="firstnameBook" class="firstnameBook"/>
                        </div>


                    </td>
                </tr>
                <tr>
                    <div class="name">
                        <label for="name">Nom :</label>
                        <input required type="text" name="lastnameBook" class="lastnameBook">
                    </div>
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
            if(!(empty($commentUser))) {
            $newComment = $commentUser->fetchAll();


             foreach ($newComment as $commentBook){?>

                <p>Le :<?= $commentBook['date_fr'] ?></p>
                <p>nom : <?= $commentBook['lastname'] ?></p>
                <p>Prénom : <?= $commentBook['firstname'] ?></p>
                <p>Commentaire : <?= $commentBook['content'] ?></p>

            <?php }}

             ?>


        </div>
    </div>

    <?php $content = ob_get_clean(); ?>

    <?php require 'templates/template.php'; ?>
