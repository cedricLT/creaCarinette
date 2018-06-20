<!--page création d'un nouvel item Crochet admin-->
<?php ob_start(); ?>
<div class="creationItemCrochet">


    <div class="titleCrochet">
        <h1>Création d'un nouvel Article
            <?php
            if ($_GET['type'] === 'crochet'){ ?>
            Crochet</h1>
    </div>

    <br>
    <hr>
    <br>
    <form action="indexAdmin.php?action=postArticle" method="post" enctype="multipart/form-data">
        <div class="creationTitre">


            <input type="radio" id="crochet" name="article" value="crochet" checked hidden>

            <?php }
            else if ($_GET['type'] === 'tricot') {
            ?>
            Tricot</h1>
        </div>

        <br>
        <hr>
        <br>
        <form action="indexAdmin.php?action=postArticle" method="post" enctype="multipart/form-data">
            <div class="creationTitre">
                <input type="radio" id="tricot" name="article" value="tricot" checked hidden>
                <?php }
                else if ($_GET['type'] == 'publication') {
                ?> Publication</h1>
            </div>

            <br>
            <hr>
            <br>
            <form action="indexAdmin.php?action=postArticle" method="post" enctype="multipart/form-data">
                <div class="creationTitre">

                    <input type="radio" id="publication" name="article" value="publication" checked hidden>
                    <?php }
                    else { ?>
                    </h1>
                </div>

                <br>
                <hr>
                <br>
                <form action="indexAdmin.php?action=postArticle" method="post" enctype="multipart/form-data">
                    <div class="creationTitre">

                        <ul>
                            <li>
                                <input type="radio" id="crochet" name="article" value="crochet" checked>
                                <label for="crochet">Article Crochet</label>
                            </li>
                            <li>
                                <input type="radio" id="tricot" name="article" value="tricot">
                                <label for="tricot">Article Tricot</label>
                            </li>
                            <li>
                                <input type="radio" id="publication" name="article" value="publication">
                                <label for="publication">Publication</label>
                            </li>
                        </ul>
                        <?php }
                        ?>
                        <br><br>
                        <label for="titre">Titre :</label> <br/>
                        <input type="text" name="title" value=" "/>

                    </div>

                    <br><br>

                    Selectionner une image :
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <br><br>

                    <div class="img">
                        <img id="blah" src="#" alt="image"/>
                    </div>

                    <br><br>

                    <textarea id="elm1" name="area"></textarea>

                    <div class="submitBtn">
                        <input type="submit" id="envoyer" name="submit" value="Publier"/>
                    </div>
                </form>
</div>
<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>
