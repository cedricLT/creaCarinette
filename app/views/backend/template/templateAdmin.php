<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <script src="app/public/tinymce/js/tinymce/tinymce.min.js"></script>

    <script> tinymce.init({
            selector: "textarea#elm1",
            language: "fr_FR",
            theme: "modern",
            width: "auto",
            height: 500,
            plugins: ['advlist autolink lists link image charmap print preview anchor textcolor', 'searchreplace visualblocks code fullscreen', "emoticons template paste textcolor"],
            //content_css: "tinymce/skins/lightgray/content.min.css",
            toolbar: "insert |formatselect | link | insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [{title: 'Bold text', inline: 'b'}, {
                title: 'Red text',
                inline: 'span',
                styles: {color: '#ff0000'}
            }, {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}}, {
                title: 'Example 1',
                inline: 'span',
                classes: 'example1'
            }, {
                title: 'Example 2',
                inline: 'span',
                classes: 'example2'
            }, {title: 'Table styles'}, {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}]
        });
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="app/public/css/styleAdmin.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="btnAdmin col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="deconTemp col-xs-12 col-sm-8 col-md-9 col-lg-10">
                <button><a href="indexAdmin.php?action=deconnexion">Déconnexion</a></button>
            </div>
            <br>
            <div class="backTdb col-xs-12 col-sm-4 col-md-3 col-lg-2">
                <button><a href="indexAdmin.php?action=tdbAdmin">Retour au tableau de bord</a></button>
            </div>

        </div>
    </div>
    <br>
    <?= $content ?>
</div>

<script src="app/public/js/uploadImg.js"></script>
<script src="app/public/js/img.js"></script>
<script src="app/public/js/errorChecking.js"></script>
</body>
</html>

