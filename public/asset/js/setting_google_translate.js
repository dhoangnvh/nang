$(document).ready(function() {
    $('#custom-file-input').change(function() {
        readURL();
    });

    function readURL() {
        let input = document.querySelector('#custom-file-input');
        if (input.files && input.files[0]) {
            $('.custom-file-label').text(input.files[0].name);
        }
    }
});