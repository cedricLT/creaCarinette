<!DOCTYPE html>
<html lang="fr">
<head>
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
        });
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="app/public/css/styleAdmin.css">
</head>
<body>
<a href="indexAdmin.php">Retour au tableau de bord</a>
<?= $content ?>
</body>
<script src="app/public/js/uploadImg.js"></script>
<script src="app/public/js/img.js"></script>
</html>

