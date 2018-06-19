$(document).ready(function () {
    $.ajax({
        url: 'indexAdmin.php?api=emails',
        dataType: 'json',
        type: 'GET',
        success: function (emails) {
            var emails_list_container = $('#emails_list');

            emails.forEach(function (email) {
                var email_div = '<div class="mailAdmin col-xs-12 col-sm-9 col-md-9 col-lg-9"><div class="dates"> <p>' + email.date_fr + '</p> </div> <div class="destinat"> <h4>Vous avez reçue un mail de '+ email.mail +'</h4> </div> <div class="expediteur"> <p>' + email.lastname + ' ' + email.firstname + ' </p> </div> <br><br> <div class="messageExpediteur"> <p>' + email.content + '</p> </div> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal'+ email.idContact +'"> Supprimer ce mail </button> <!-- Modal --> <div class="modal fade" id="exampleModal'+ email.idContact +'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> <div class="modal-dialog" role="document"> <div class="modal-content"> <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> <h4 class="modal-title" id="exampleModalLabel">confirmation de suppression </h4> </div> <div class="modal-body"> <div class="suppre"> <a href="indexAdmin.php?action=deleteMail&idContact='+ email.idContact +'">Supprimer ce mail</a> </div> </div> <div class="modal-footer"> <button type="button" class="btn btn-secondary" data-dismiss="modal">annuler</button> </div> </div> </div> </div> </div>';


                emails_list_container.append(email_div)
            });

            $('.nbrArticles').append(' <h2>Vous avez ' + emails.length + ' emails</h2>')
            $('.loader').addClass('hidden')
            emails_list_container.removeClass('hidden')
        },
        error: function (e) {
            console.log('erreur');
        }
    })
});