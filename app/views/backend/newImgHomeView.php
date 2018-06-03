<!--page changement photos homeViews-->
<?php ob_start(); ?>
<div class="titleCrochet">
    <h1>Changer l'image principal de votre page d'accueil</h1>
</div>
<?php $img = $imgHome->fetch() ?>
<div class="imgHome">
    <img src="<?= $img['img'] ?>" alt="Titoune&Laine création, tricot, crochet, laine">
</div>
<hr>
<br><br>

<div class="titleNewImg">
    <h4>Votre nouvelle image</h4>
</div>
<br>
<form action="indexAdmin.php?action=newImgHome" method="post" enctype="multipart/form-data">

    <input type="file" name="fileToUpload" id="fileToUpload" class="filesImg">
    <br><br>
    <div class="img">
        <img id="blah" src="#" alt="image"/>

        <br><br>
        <div class="sub_btn">
            <input type="submit" value="Envoyer" name="submit" id='upload' class="submit">
        </div>
    </div>
</form>

<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>