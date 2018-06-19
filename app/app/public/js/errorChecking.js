// verif mot de passe coté admin

$(document).ready(function () { // on s'assure que le document est chargé


    var $mdp1 = $('#newMdp'),
        $mdp2 = $('#newMdp2');

    $mdp2.keyup(function () {// si la confirmation est différente du mot de passe
        if ($(this).val() != $mdp1.val()) {
            $(this).css({ // on rend le champ rouge
                borderColor: 'red',
                color: 'red'

            });
        }
        else {// si tout est bon, on le rend vert
            $(this).css({
                borderColor: 'green',
                color: 'green'
            });
            $('#pop').css({
                display: 'block'
            })

        }

    });

});



/*===================================== vérif de mail formulaire de contact  ===============================================*/

    function surligne(champ, erreur)
    {
        if(erreur)
            champ.style.backgroundColor = "red";
        else
            champ.style.backgroundColor = "green";
    }

    function verifMail(champ)
    {
        var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
        if(!regex.test(champ.value))
        {
            surligne(champ, true);
            return false;
        }
        else
        {
            surligne(champ, false);
            return true;
        }
    }

    function verifForm(f)
    {
        var mailOk = verifMail(f.mail);

        if( mailOk){
            return true;

        }


        else
        {
            alert("Votre mail n'est pas valide .\nMerci de ressaisir votre mail.");
            return false;
        }
    }




