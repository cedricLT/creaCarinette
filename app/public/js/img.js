var openFile = function(event,  id) {
    var input = event.target;
    var reader = new FileReader();
    if (input.files && input.files[0]) {
        $('.subBtn').css('display', 'block');
        reader.onload = function () {
            var dataURL = reader.result;
            var output = document.getElementById('output' + id);
            output.src = dataURL;
        };
    }
    reader.readAsDataURL(input.files[0]);

};

function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
            $('.img').css('display', 'block');

        }

        reader.readAsDataURL(input.files[0]);

    }
}

$("#fileToUpload").change(function () {
    readURL(this);
});
