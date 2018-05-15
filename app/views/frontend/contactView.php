<!DOCTYPE html>

<?php ob_start(); ?>
<div class="contactFormulaire">
    <h1 class="h1Title">Formulaire de Contact</h1>
    <form id="contact" action="index.php?action=contactMail" method="post">
        <table>

            <tr>
                <td>
                    <div class="nom">
                        <label for="nom">Nom :</label><br>
                        <input required type="text" id="nom" class="nom" name="name"  placeholder="Votre Nom"/><br><br>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="prenom">
                        <label for="prenom">Prénom :</label><br>
                        <input required type="text" id="prenom" class="prenom" name="prenom" placeholder="Votre prénom"/><br><br>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="email">
                        <label for="email">Email :</label><br>
                        <input required type="text" id="email" class="email" name="email" placeholder="Votre Email"/><br><br>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="message">
                        <label for="message">Votre Message :</label>
                        <textarea required id="message" class="message" name="message" cols="70" rows="8"></textarea>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <input type="submit" id="submint_bt" class="submint_bt" name="envoi" value=" Envoyer "/>
                </td>
            </tr>
    </form>
    </table>
</div>
<?php $content = ob_get_clean(); ?>
<?php require 'templates/template.php'; ?>
