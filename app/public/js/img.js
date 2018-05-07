function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
            $('.img').css('display', 'block');

        }

        reader.readAsDataURL(input.files[0]);

    }
}

$("#fileToUpload").change(function() {
    readURL(this);
});

