$(document).ready(function() {
    var videoId = '';
    $(document).on('click', '.number-translate', function() {
        videoId = $(this).attr('data-id');
        $(".toggle-video-"+videoId + " td").slideToggle("fast");
        $(this).find('.icon-down').toggleClass('d-none');
        $(this).find('.icon-up').toggleClass('d-none');
    });

    $(document).on('click', ".show-title:not('.not-trans')", function () {
        $('.sk-loading-full').removeClass('d-none');
        var videoId = $(this).attr('data-video');
        var langId = $(this).attr('data-lang');
        $(".show-title").removeClass('show');
        $(this).addClass('show');
        $('.sk-loading-full').removeClass('d-none');
        $.ajax({
            url: "captions/getTitleDes/"+videoId+"/"+langId,
            type: "GET",
            success: function(data) {
                $('.sk-loading-full').addClass('d-none');
                $('#translate-video').attr('data-video', data.videoId);
                $('#translate-video').attr('data-language', data.codeYT);
                $('.video-title-default').val(data.titleDefault);
                $('.video-description-default').val(data.descriptionDefault);
                $('.video-title-select').val(data.titleLanguage);
                $('.video-description-select').val(data.descriptionLanguage);
                $('.lang-select').text(data.language);
                if (data.enableGGTrans == "") {
                    $('.btn-gg-trans').addClass('d-none');
                } else {
                    $('.btn-gg-trans').removeClass('d-none');
                }
                $('.sk-loading-full').addClass('d-none');
                vailTitle();
                vailDescription();
                $("#myModal").modal();
                $(".btn-download-caption").attr("href",data.path);
            }
        });
    });

    $(document).on('click', '.btn-upload', function() {
        $('.sk-loading-full').removeClass('d-none');
        var videoId =  $('#translate-video').attr('data-video');
        var locale =  $('#translate-video').attr('data-language');
        var title = $('.video-title-select').val();
        var description = $('.video-description-select').val();
        if (title.length > 100) {
            $('.sk-loading-full').addClass('d-none');
            skAlert("error","タイトルは100文字以内で入力してください。");
            return;
        }
        if (description.length > 5000) {
            $('.sk-loading-full').addClass('d-none');
            skAlert("error","説明は5000文字以内で入力してください。");
            return;
        }
        $.ajax({
            url: "business/publishtitle",
            type: "POST",
            data: {
                "videoId": videoId,
                "locale": locale,
                "title": title,
                "description": description,
            },
            success: function() {
                $('.sk-loading-full').addClass('d-none');
                $('#myModal').modal('hide');
                skAlert("success","データを更新しました。");
                $(".show-title.show").text("公開済み");
            },
            error: function(data) {
                skAlert("error","公開権限がないため、公開できません。");
                $('.sk-loading-full').addClass('d-none');
            }
        });
    });

    $(document).on('click', ".control-balloon-selector ul li:not('.not-change')", function(){
        let value = $(this).attr('data-video');
        if (confirm('翻訳のステータスを変更してもよろしいでしょうか？')) {
            let idTransLanguage = $(this).attr('data-id');
            let statusTransLanguage = $(this).attr('data-value');
            $('.sk-loading-full').removeClass('d-none');
            $.ajax({
                url: 'translation/change_status',
                type: "POST",
                data: {
                    'id': idTransLanguage,
                    'status': statusTransLanguage
                },
                success: function() {
                    $(".control-balloon-selector ul li[data-video='"+ value + "']").removeClass('active');
                    $(".control-balloon-selector ul li[data-video='"+ value + "'][ data-id='"+idTransLanguage+"'][ data-value='"+statusTransLanguage+"']").addClass('active');
                    var parent = $(".control-balloon-selector ul li[data-video='"+ value + "']").closest('.item-request-video');
                    var countCompleted = parent.find(".control-balloon-selector .active[data-value=2]").length;
                    var countLanguage = parent.find(".control-balloon-selector .active").length;
                    if (countCompleted == countLanguage) {
                        parent.find(".status-request").html('<i class="fas fa-check text-primary"></i>');
                    } else {
                        parent.find(".status-request").html('<i class="fas fa-times text-danger"></i>');
                    }
                    skAlert('success', 'ステータスを変更しました。');
                    $('.sk-loading-full').addClass('d-none');
                },
            });
        }
    });

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
    });

    function loadMore(page) {
        var languageSelect = $('select[name="slt-languages"]').val();
        var numberRequest = $('.sk-slt-number').val();
        var translatorName = $(".user-search").val();
        $('.sk-loading-full').removeClass('d-none');
        $.ajax({
            url: "/translation/getMoreData",
            method: "GET",
            data: {
                "page": page,
                "languageSelect": languageSelect,
                "numberRequest": numberRequest,
                "translatorName": translatorName,
            },
            success: function(data) {
                $('.card-data-request').html(data);
                $('.sk-loading-full').addClass('d-none');
            }
        });
    }
    $(document).on("click", ".btn-gg-trans", function() {
        $('.sk-loading-full').removeClass('d-none');
        var code = $("#translate-video").attr('data-language');
        var title = $(".video-title-default").val();
        var description = $(".video-description-default").val();
        $.ajax({
            url: "captions/ggTransTitle",
            type: "POST",
            data: {
                "code": code,
                "title": title,
                "description": description,
            },
            success: function(data) {
                $(".video-title-select").val(data.title);
                $(".video-description-select").val(data.description);
                vailTitle();
                vailDescription();
                $('.sk-loading-full').addClass('d-none');
            },
            error: function(data) {
                $('.sk-loading-full').addClass('d-none');
                skAlert("error","GoogleAPIで翻訳するため、翻訳設定を行ってください。");
            }
        });
    });

    $(document).on("keyup", ".video-title-select", function() {
        vailTitle();
    });

    $(document).on("keyup", ".video-description-select", function() {
        vailDescription();
    });
    
    function vailTitle() {
        length = $(".video-title-select").val().length;
        $(".title-limit .current").text(length);
        if (length > 100) {
            $(".title-limit").css("color", "#F00");
        } else {
            $(".title-limit").css("color", "#b7b2b2");
        }
    }

    function vailDescription() {
        length = $(".video-description-select").val().length;
        $(".description-limit .current").text(length);
        if (length > 5000) {
            $(".description-limit").css("color", "#F00");
        } else {
            $(".description-limit").css("color", "#b7b2b2");
        }
    }
});