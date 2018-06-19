<?php ob_start(); ?>
    <div class="titleCrochet">
        <h1>Vos E-mail <?= $_SESSION['firstname'] ?></h1>
    </div>
    <div class="nbrArticles">

    </div>
    <hr>

    <div class="row hidden" id="emails_list">

    </div>
    <div class="loader">
        <img src="https://media.giphy.com/media/y1ZBcOGOOtlpC/giphy.gif" alt="gif Titoune&Laine création crochet, tricot">
    </div>
    <script src="app/public/js/ajax.js"></script>

<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>