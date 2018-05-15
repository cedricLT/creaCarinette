$(document).ready(function () { // on s'assure que le document est chargé


    var $mdp1 = $('#newMdp'),
        $mdp2 = $('#newMdp2'),
        $pop = $('#pop'),
        $btn_submit = $('#btn_submit');




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

