<?php ob_start(); ?>


<h1>Modification de votre image</h1>

<?php $look = $ImgPublis->fetch() ?>
<?php
if ( $look ['img'] !== null ){
    ?><img src="<?= $look ['img'] ?>" alt="titoune&laine">
    <?php
}
?>


<form action="indexAdmin.php?action=newImgPublis&idPublication=<?= $look ['idPublication'] ?>" method="post" enctype="multipart/form-data">


    <input type="file" name="fileToUpload" id="fileToUpload" accept='image/*' onchange='openFile(event)'>
    <br>
    <img id='output'>
    <br>
        <input type="submit" value="Envoyer" name="submit" id='upload'>



</form>


<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>