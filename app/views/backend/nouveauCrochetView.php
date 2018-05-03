<!--page création d'un nouvel item Crochet admin-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <!--<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({selector: 'textarea'});</script>-->
    <script src="app/public/tinymce/js/tinymce/tinymce.min.js"></script>

    <script> tinymce.init({
            selector: "textarea#elm1",
            language:"fr_FR",
            theme: "modern",
            width: "auto",
            height: 500,
            plugins: [ "emoticons template paste textcolor"],
            //content_css: "tinymce/skins/lightgray/content.min.css",
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
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
        }); </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="app/public/css/styleAdmin.css">

</head>
<body>

<div class="creationItemCrochet">
    <h1>Création d'un nouvel Article Crochet</h1>


    <form action="indexAdmin.php?action=creatItemCrochet" method="post" enctype="multipart/form-data" >
        <div class="creationTitre">
            <label for="titre">Titre :</label> <br/>
            <input required type="text" name="title"/>
        </div>
        <br><br>
        Selectionner une image :
        <input type="file" name="fileToUpload" id="fileToUpload"><br><br>

        <textarea id="elm1" name="area"></textarea>

        <div class="submitBtn">
            <input type="submit" id="envoyer" name="submit" value="Publier"/>
        </div>
    </form>
</div>

</body>
</html>
