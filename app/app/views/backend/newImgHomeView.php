<!--page changement photos homeViews-->
<?php ob_start(); ?>
<div class="titleCrochet">
    <h1>Changer l'image principal de votre page d'accueil</h1>
</div>
<?php $img = $imgHome->fetch() ?>
<div class="imgHome">
    <img src="<?= $img['img'] ?>" alt="Titoune&Laine création, tricot, crochet, laine">
</div>

<div class="btnImgPublication">
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal"
            data-target="#myModal">Modifier l'image
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Sélectionner une image:</h4>
            </div>
            <div class="modal-body">
                <form action="indexAdmin.php?action=newImgHome" method="post" enctype="multipart/form-data">

                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <br><br>
                    <div class="img">
                        <img id="blah" src="#" alt="image"/>
                        <br><br>
                        <div class="sub_btn">
                            <input type="submit" value="Envoyer" name="submit" id='upload' class="submit">
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
            </div>
        </div>
    </div>
</div>


<form action="indexAdmin.php?action=newImgHome" method="post" enctype="multipart/form-data">


</form>

<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>