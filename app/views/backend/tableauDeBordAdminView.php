<!--page tableau de bord admin-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="app/public/css/styleAdmin.css">
</head>
<body>
<div class="container">
    <div class="deconnexion">
        <button><a href="indexAdmin.php?action=deconnexion">Déconnexion</a></button>
    </div>

    <br>
    <div class="titleTdb">
        <h1>Bienvenue dans votre Tableau de Bord <?= $_SESSION['firstname'] ?></h1>
    </div>
    <br>
    <br>
    <div class="blockAdmin">
        <div class="articlesTdb">
            <h2>Articles</h2>
            <br>
            <div class="articles">
                <ul>
                    <?php $itemC = $nbrItemCrochet->fetch() ?>
                    <li>
                        <button><a href="indexAdmin.php?action=crochetAdmin"><?= $itemC[0] ?> Articles Crochets</a>
                        </button>
                    </li>
                    <br>
                    <?php $itemT = $nbrItemTricot->fetch() ?>
                    <li>
                        <button><a href="indexAdmin.php?action=tricotAdmin"><?= $itemT[0] ?> Articles Tricots</a>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <br>
        <hr>
        <br>
        <div class="commentairesTdb">
            <h2>Commentaires</h2>
            <br>
            <div class="commentaires">
                <ul>
                    <?php $comment = $nbrComment->fetch() ?>
                    <li>
                        <button><a href="indexAdmin.php?action=deleteComment"><?= $comment[0] ?> Commentaire(s)</a>
                        </button>
                    </li>
                    <br>
                    <?php $commentReport = $nbrCommentReport->fetch() ?>
                    <li>
                        <button><a href="indexAdmin.php?action=reportComment"><?= $commentReport[0] ?> Commentaire(s)
                                Signalé(s)</a>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <br>
        <hr>
        <br><br>

        <div class="bookTdb">
            <h2>Livre d'or</h2>
            <br>
            <div class="book">
                <ul>
                    <?php $commentBook = $nbrCommentBook->fetch() ?>
                    <li>
                        <button><a href="indexAdmin.php?action=visitorBook"><?= $commentBook[0] ?> message(s)</a>
                        </button>
                    </li>
                    <br>
                    <?php $commentReportBook = $nbrReportBook->fetch() ?>
                    <li>
                        <button><a href="indexAdmin.php?action=reportVisitorBook"><?= $commentReportBook[0] ?>
                                Message(s)
                                signalé(s)</a></button>
                    </li>
                </ul>
            </div>
        </div>
        <br>
        <hr>
        <br><br>
        <div class="emailTdb">
            <h2>E-mail</h2>
            <br>
            <div class="email">
                <ul>
                    <?php $mail = $nbrMail->fetch() ?>
                    <li>
                        <button><a href="indexAdmin.php?action=mail"><?= $mail[0] ?> E-mail(s)</a></button>
                    </li>
                </ul>

            </div>
        </div>
        <br>
        <hr>
        <br><br>
        <div class="parametreTdb">
            <h2>Vos Paramètres</h2>
            <br>
            <div class="parametre">
                <ul>
                    <li>
                        <button><a href="indexAdmin.php?action=newMdp&idUsers=<?= $_SESSION['idUsers'] ?>">Mot de
                                passe</a>
                        </button>
                    </li>
                    <br>
                    <li>
                        <button><a href="indexAdmin.php?action=newName&idUsers=<?= $_SESSION['idUsers'] ?>">Nom
                                d'utilisateur</a>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>