<?php ob_start(); ?>

<h1 class="h1Title titleBook">Livre D'Or</h1>

<div class="textBook">
    <h3>
        <p>Ici vous pouvez exprimer votre avie général sur toutes mes créations. <br>
            Alors n ' hésitez pas à écrire un commentaire! <br>
            Merci.
        </p>
    </h3>
</div>

<div class="row">
    <div class="commentDropUsers col-xs-12 col-sm-12 col-md-12 col-lg-12">

        <form action="index.php?action=commentBook" method="post">

            <table>
                <tr>
                    <td>
                        <div class="nameBook">
                            <label for="pseudo">Nom :</label><br>
                            <input required type="text" name="lastnameBook" class="lastnameBook"
                                   placeholder="votre Nom"><br><br>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="prénomBook">
                            <label for="pseudo">Prénom :</label><br>
                            <input required type="text" name="firstnameBook" class="firstnameBook"
                                   placeholder="Votre Prénom"><br><br>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="messageBook">
                            <label for="message">Commentaire :</label>
                            <textarea required name="contentBook" class="commentBook"
                                      placeholder="Votre Commentaire"></textarea>


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
    </div>
</div>
<!-- affichage des commentaires -->
<hr>
<div class="contentVisitorBook">
    <?php
    while ($commentBook = $commentUser->fetch()) {

        ?>
        <div class="commentBookUser">

            <div class="datesBook">
                <p><?= $commentBook['date_fr'] ?></p>
            </div>

            <div class="nomBook">
                <p><?= $commentBook['lastname'] ?> <?= $commentBook['firstname'] ?></p>
            </div>

            <div class="contentBook">
                <p><?= $commentBook['content'] ?></p>
            </div>

            <hr>

            <div class="report reportBook">
                <button>
                    <a href="index.php?action=reportCommentBook&idVisitorBook=<?= $commentBook['idVisitorBook'] ?>&idUsers=<?= $commentBook['idUsers'] ?>">Signaler
                        ce commentaire</a>
                </button>
            </div>
        </div>
        <?php
    }
    ?>
    <p id="numberPages">Pages : <?php
        for ($i = 1; $i <= $numPage; $i++) {
            echo "<a href=\"index.php?action=book&p=$i\">$i </a>";
        }
        $commentUser->closeCursor();
        ?>
    </p>


</div>


<?php $content = ob_get_clean(); ?>

<?php require 'templates/template.php'; ?>
