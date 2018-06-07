// function readURL(input) {
//
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();
//
//         reader.onload = function(e) {
//             $('#blah').attr('src', e.target.result);
//             $('.img').css('display', 'block');
//
//         }
//
//         reader.readAsDataURL(input.files[0]);
//
//     }
// }
//
// $("#fileToUpload").change(function() {
//     readURL(this);
// });


var openFile = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
        var dataURL = reader.result;
        var output = document.getElementById('output');
        output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
};
