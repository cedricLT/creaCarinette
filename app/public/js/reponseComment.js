var submit_btns = $('.submit_btn'),
    submit_cancel_btns = $('.submit_cancel');


submit_btns.each(function (index, btn) {
    btn.addEventListener('click', function (e) {
        $reponseUser = $(e.target).parent().find('div.reponseUser');
        $reponseUser[0].style.display = 'block';
    });
});

submit_cancel_btns.each(function (index, btn) {
    btn.addEventListener('click', function (e) {
        $reponseUser = $(e.target).parent() .parent() .parent();
        $reponseUser[0].style.display = 'none';
    });
});
