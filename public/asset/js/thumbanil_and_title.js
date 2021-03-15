$(document).ready(function() {
    $('#custom-file-input').change(function() {
        readURL();
    });

    function readURL() {
        let input = document.querySelector('#custom-file-input');
        if (input.files && input.files[0]) {
            $('.custom-file-label').text(input.files[0].name);
            var reader = new FileReader();
            reader.onload = function(e) {
                $('img.bg-img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $('button[type=submit]').click(function() {
        $('.sk-loading-full').removeClass('d-none');
    })
});