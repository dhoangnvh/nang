$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".slt-lang-add").on('click', '.btn-lang', function() {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            var id = $(this).data("id");
            $(".val-lang").find(".form-group[data-id='" + id + "']").remove();
        } else {
            $(this).addClass("active");
            var lang = $(this).data('id');
            var content = $(this).html();
            addTranslateMessage(lang, '', content);
            activeBtnLanguage(lang);
        }
    });

    // delete text
    $(document).on('click', '.delete-row', function() {
        $('.sk-loading-full').removeClass('d-none');
        var index = $(this).index('.delete-row');
        let idText = $('.translate-key tbody tr td').eq(index).attr("data-id");
        $.ajax({
            url: 'request/wordbook/delete',
            type: "GET",
            data: {
                'id': idText
            },
            success: function() {
                $('.translate-key tbody tr').eq(index).remove();
                $('.translate-mess tbody tr').eq(index).remove();
                $('.translate-action tbody tr').eq(index).remove();

                if ($('.translate-mess tbody tr').length == 0) {
                    $('.translate-mess tbody').append("<tr class='no-data'><td class='text-left bg-white border-0' colspan='8'>データがありません。</td></tr>");
                }
                skAlert('success', '単語を削除しました。');
                $('.sk-loading-full').addClass('d-none');
            },
            error: function(request, status, error) {
                skAlert('error', request.responseJSON.errors.title_book[0]);
                $('.sk-loading-full').addClass('d-none');
            }
        });
    })

    $(document).on('click', '.edit-row', function() {
        $('.val-lang').html("");
        $('.btn-lang').removeClass("active");
        var index = $(this).index('.edit-row');
        $(".translate-mess tbody tr:eq(" + index + ") td").each(function(key, element) {
            txtKey = $(".translate-mess thead tr th").eq(key).text();
            txtId = $(element).attr('data-id');
            txtMess = element.innerText;
            if (txtMess.trim() !== "") {
                addTranslateMessage(txtId, txtMess, txtKey);
                activeBtnLanguage(txtId);
            }
        })
        $('#inputText').val($('.translate-key tbody tr td').eq(index).text());
        $('#inputText').attr("data-id", $('.translate-key tbody tr td').eq(index).data("id"));
    })

    function addTranslateMessage(lang, value, content) {
        var html = '<div class="form-group" data-id="' + lang + '">' +
            '<label>' + content + '</label>' +
            '<input type="text" class="form-control textLanguage" data-id="' + lang + '" name="language[' + lang + ']" value="' + value + '">' +
            '</div>';
        $(".val-lang").append(html);
    }

    function activeBtnLanguage(lang) {
        $('.btn-lang[data-id="' + lang + '"]').addClass("active");
    }

    //switch word book
    $('.itemWordBook').click(function() {
        $('.sk-loading-full').removeClass('d-none');
        let nameWordBook = $(this).html();
        let wordBookId = $(this).attr('data-id');
        $('#dropdownMenuButton').html(nameWordBook);
        $('#dropdownMenuButton').attr("data-idWordBook", wordBookId);
        $('#title-book').val($(this).html());
        $('#title-book-hidden').val($(this).attr('data-id'));
        $('#inputText').val('');
        $('.btn-lang').removeClass('active');
        $('.val-lang').html('');
        if ($(this).attr('data-status') == 1) {
            $('.custom-control-input').attr("checked", true);
        } else {
            $('.custom-control-input').attr("checked", false);
        }
        $.ajax({
            url: 'request/wordbook/switchbook/' + wordBookId,
            type: "GET",
            success: function(data) {
                $('.table-translate').html(data);
                if($('#status-hidden').val() == 0){
                   $('#switch1').prop( "checked", false );
                }else{
                    $('#switch1').prop( "checked", true );
                }
                $('.sk-loading-full').addClass('d-none');
            },
        });
    });

    $('#confirm').on('click', function() {
        $('.sk-loading-full').removeClass('d-none');
        if ($('.title-book input').val() == '') {
            skAlert('error', '単語は空白または重複しています。');
            $('.sk-loading-full').addClass('d-none');
        }else {
            let idText = $('#inputText').attr("data-id");
            let status = '';
            if ($('#switch1').is(':checked') == true) {
                status = 1;
            } else {
                status = 0;
            }
            let objectText = {};
            $.each($('.textLanguage'), function(i, text) {
                objectText[$(text).data('id')] = $(text).val();
            });
            $.ajax({
                data: {
                    'name_book': $('.title-book input').val(),
                    'text_translate': $('#inputText').val(),
                    'text_translate_id': idText,
                    'book_id': $('#title-book-hidden').val(),
                    'status': status,
                    'objectText': objectText
                },
                url: "request/wordbook/translate",
                type: "POST",
                success: function(data) {
                    skAlert('success', 'データを保存しました。');
                    $('#dropdownMenuButton').html($('.title-book input').val());
                    $('#inputText').val('');
                    $('#inputText').attr('data-id','');
                    $('.btn-lang').removeClass('active');
                    $('.val-lang').html('');
                    $('.table-translate').html(data);
                    $('.sk-loading-full').addClass('d-none');
                    if($('#status-hidden').val() == 1){
                        $('#switch1').prop( "checked", true );
                    }
                    $('.dropdown-menu .dropdown-item[data-id=' + $('#dropdownMenuButton').attr('data-idwordbook') + ']').html($('.title-book input').val());
                },
                error: function(request, status, error) {
                    if(request.responseJSON.errors.name_book == undefined){
                        skAlert('error', request.responseJSON.errors.text_translate[0]);
                    }else{
                        skAlert('error', request.responseJSON.errors.name_book[0]);
                    }
                    $('.sk-loading-full').addClass('d-none');
                }
            });
        }
    });

    $('#confirm_create').click(function() {
        if ($('.title-book input').val() == '') {
            skAlert('error', '単語は空白または重複しています。');
        } else if ($('#inputText').val() == '') {
            skAlert('error', 'input text not null');
        } else if ($('.btn-lang').hasClass('active') == false) {
            skAlert('error', '翻訳言語が入力されていません。');
        } else {
            $("#form-custom")[0].submit();
        }
    });

    $(".btn-del-book").click(function() {
        $('.sk-loading-full').removeClass('d-none');
        var bookActive = $('#dropdownMenuButton').attr("data-idWordBook");
        $.ajax({
            url: "/request/delete/wordbook/" + bookActive,
            type: "GET",
            success: function(data) {
                location.reload();
            }
        });
    });

})
