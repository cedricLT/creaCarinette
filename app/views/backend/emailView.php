<!DOCTYPE html>
<?php ob_start(); ?>

<?php $mail = $nbrMail->fetch() ?>

<h1>Vos E-mail <?= $_SESSION['firstname'] ?></h1>

<h3>Vous avez <?= $mail[0] ?> E-mail</h3>

<?php
while ($mail = $mailUser->fetch()) {
    ?>
    <h4>Vous avez reçue un mail de <?= $mail['firstname'] ?></h4>

    <p>Le :<?= $mail['date_fr'] ?></p>

    <p><?= $mail['lastname'] ?> <?= $mail['firstname'] ?>  <?= $mail['mail'] ?></p>


    <p><?= $mail['content'] ?></p>

    <a href="indexAdmin.php?action=deleteMail&idContact=<?= $mail['idContact'] ?>">Supprimer ce mail</a>


    <?php
}
$mailUser->closeCursor();
?>

<?php $content = ob_get_clean(); ?>
<?php require 'template/templateAdmin.php'; ?>