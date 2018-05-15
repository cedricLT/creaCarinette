<!--page tableau de bord admin-->
<!DOCTYPE html>
<html lang="fr">
<head>
</head>
<body>
<a href="indexAdmin.php?action=deconnexion">Déconnexion</a>
<h1>Bienvenue dans votre Tableau de Bord <?= $_SESSION['firstname'] ?></h1>
<div class="articles">
    <h2>Articles</h2>
    <ul>
        <?php $itemC = $nbrItemCrochet->fetch() ?>
        <li><a href="indexAdmin.php?action=crochetAdmin"><?= $itemC[0] ?> Articles Crochets</a></li>

        <?php $itemT = $nbrItemTricot->fetch() ?>
        <li><a href="indexAdmin.php?action=tricotAdmin"><?= $itemT[0] ?> Articles Tricots</a></li>
    </ul>
</div>
<div class="commentaires">
    <h2>Commentaires</h2>
    <ul>
        <?php $comment = $nbrComment->fetch() ?>
        <li><a href="indexAdmin.php?action=deleteComment"><?= $comment[0] ?> Commentaires par Articles</a></li>

        <?php $commentReport = $nbrCommentReport->fetch() ?>
        <li><a href="indexAdmin.php?action=reportComment"><?= $commentReport[0] ?> Commentaires Signalés</a></li>
    </ul>
</div>
<div class="book">
    <h2>Livre d'or</h2>
    <ul>
        <?php $commentBook = $nbrCommentBook->fetch() ?>
        <li><a href="indexAdmin.php?action=visitorBook"><?= $commentBook[0] ?> message(s)</a></li>

        <?php $commentReportBook = $nbrReportBook->fetch() ?>
        <li><a href="indexAdmin.php?action=reportVisitorBook"><?= $commentReportBook[0] ?> Message(s) signalé(s)</a></li>
    </ul>

</div>
<div class="email">
    <h2>E-mail</h2>
    <ul>
        <?php $mail = $nbrMail->fetch() ?>
        <li><a href="indexAdmin.php?action=mail"><?= $mail[0] ?> E-mail</a></li>
    </ul>

</div>

<div class="parametre">
    <h2>Vos Paramètres</h2>
    <ul>
        <li><a href="indexAdmin.php?action=newMdp&idUsers=<?= $_SESSION['idUsers'] ?>">Mot de passe</a></li>
        <li><a href="indexAdmin.php?action=newName&idUsers=<?= $_SESSION['idUsers'] ?>">Nom d'utilisateur</a></li>
    </ul>

</div>
</body>
</html>