var modifImg_btns = $('.modifImg')
    delete_cancel_btns = $('.delete_cancel');


modifImg_btns.each(function (index, btn) {
    btn.addEventListener('click', function (e) {
        $modif = $(e.target).parent().parent().find('div.modif');
        $modif[0].style.display = 'block';
    });
});

delete_cancel_btns.each(function (index, btn) {
    btn.addEventListener('click', function (e) {
        $warning_container = $(e.target).parent().parent();
        $warning_container[0].style.display = 'none';
    })
});