// //script pour le slider
// $("#slideshow > div:gt(0)").hide();
//
// setInterval(function() {
//     $('#slideshow > div:first')
//         .fadeOut(1000)
//         .next()
//         .fadeIn(1000)
//         .end()
//         .appendTo('#slideshow');
// }, 3000);

//script pour le menu templateMenu.php

jQuery(function($){
    $('.navbar-toggle').click(function(){
        $('.navbar-collapse').toggleClass('right');
        $('.navbar-toggle').toggleClass('indexcity');
    });
});