<!--page création d'un nouvel item Crochet admin-->
<?php ob_start(); ?>
<div class="creationItemCrochet">
    <div class="titleCrochet">
        <h1>Création d'un nouvel Article Tricot</h1>
    </div>

    <br>
    <hr>
    <br>
    <form action="indexAdmin.php?action=creatItemTricot" method="post" enctype="multipart/form-data">
        <div class="creationTitre">
            <label for="titre">Titre :</label> <br/>
            <input required type="text" name="title"/>
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