<!DOCTYPE html>

<?php ob_start(); ?>

<h1 class="h1Title">Formulaire de Contact</h1>
<div class="container">
    <div class="row">
        <div class="contactFormulaire col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <form action="index.php?action=contactMail" onsubmit="return verifForm(this)" method="post">
                <table>

                    <tr>
                        <td>
                            <div class="nomInput">
                                <label for="nom">Nom :</label><br>
                                <input required type="text" class="nom" name="name" placeholder="Votre Nom"/><br><br>

                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="prenomInput">
                                <label for="prenom">Prénom :</label><br>
                                <input required type="text" class="prenom" name="prenom"
                                       placeholder="Votre prénom"/><br><br>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="emailInput">
                                <label for="email">Email :</label><br>
                                <input required type="text" id="mail" class="email" name="email" onsubmit="verifMail(this)"
                                       placeholder="Votre Email"/><br><br>
                            </div>
                            <div id="popMail">
                                <p>Votre mail n'est pas valide !</p>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>

                            <div class="messageT ">
                                <label for="message">Votre Message :</label>
                                <textarea required class="messageTexte" name="message"></textarea>
                            </div>
                            
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="submit" id="submint_bt" class="submint_btContact" name="envoi"
                                   value=" Envoyer "  />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require 'templates/template.php'; ?>
