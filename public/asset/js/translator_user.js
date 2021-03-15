$(document).ready(function() {
    $(document).on('click', '.pagination .page-item', function() {
        if ($(this).hasClass("disabled")) {
            return false;
        }
        var page = $(this).attr('data-page');
        loadMore(page);
    });
    $('.sk-slt-number').change(function() {
        var page = 1;
        loadMore(page);
    });
    $('select[name="slt-languages"]').change(function() {
        var page = 1;
        loadMore(page);
    });
    $(".user-search").change(function() {
        var page = 1;
        loadMore(page);
    })

    function loadMore(page) {
        var languageSelect = $('select[name="slt-languages"]').val();
        var numberTranslator = $('.sk-slt-number').val();
        var name = $(".user-search").val();
        $('.sk-loading-full').removeClass('d-none');
        $.ajax({
        url: "/business/translators/getMoreData",
        method: "GET",
        data: {
            "page": page,
            "languageSelect": languageSelect,
            "numberTranslator": numberTranslator,
            "name": name,
        },
        success: function(data) {
            $('.card-data-request').html(data);
            $('.sk-loading-full').addClass('d-none');
        }
        });
    }
    
})