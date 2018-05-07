<!DOCTYPE html>

<?php ob_start(); ?>
<div class="contactFormulaire">
    <h1 class="h1Title">Formulaire de Contact</h1>
    <p>ici c est la prise de contact !!!!</p>
    <form id="contact" action="index.php?action=contactMail" method="post">
        <table>

            <tr>
                <td>
                    <div class="nom">
                        <label for="nom">Nom :</label>
                        <input required type="text" id="nom" name="name"/>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="prenom">
                        <label for="prenom">prenom :</label>
                        <input required type="text" id="prenom" name="prenom"/>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="email">
                        <label for="email">Email :</label>
                        <input required type="text" id="email" name="email"/>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="message">
                        <label for="message">Message :</label>
                        <textarea required id="message" name="message" cols="70" rows="8"></textarea>
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