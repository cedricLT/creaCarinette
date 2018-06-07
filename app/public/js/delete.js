var delete_btns = $('.delete_btn'),
    delete_cancel_btns = $('.delete_cancel');


delete_btns.each(function (index, btn) {
    btn.addEventListener('click', function (e) {
        $warning_container = $(e.target).parent().find('div.warning_container');
        $warning_container[0].style.display = 'block';
    });
});

delete_cancel_btns.each(function (index, btn) {
    btn.addEventListener('click', function (e) {
        $warning_container = $(e.target).parent().parent();
        $warning_container[0].style.display = 'none';
    });
});