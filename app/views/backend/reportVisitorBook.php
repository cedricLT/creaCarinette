<!DOCTYPE html>
<html lang="fr">
<head>
</head>
<body>
<h1>Message Signalé du livre d'or</h1>

<?php
while ($report = $reportCoomentBook->fetch()) {
    ?>

    <p>Le :<?= $report['postDate'] ?></p>
    <p>nom :<?= $report['lastname'] ?></p>
    <p>Prénom : <?= $report['firstname'] ?></p>
    <p>Message :<br><?= $report['content'] ?></p>

    <?php
}
?>
</body>
</html>