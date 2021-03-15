$(document).ready(function() {
    function checkValidateStep(step) {
        var nextStep = true;
        switch (step) {
            case "0":
                var language = $('.item-lang .form-check-input:checked').length;
                var countVideo = $("input[name='video_id[]']").length;
                var name = $("input[name='request_name']").val();
                if ($('.languages-choose').data('number') == 0 && language < 1) {
                    nextStep =  false;
                }
                if ($('.languages-choose').data('number') != 0 && language != $('.languages-choose').data('number')) {
                    nextStep =  false;
                }
                if (countVideo == 0 || name == "") {
                    nextStep =  false;
                }
                break;
            default:
                break;
        }
        return nextStep;
    }

    // next, prev step
    $(document).on('click', '.btn.next-step', function() {
        var step = $(this).attr('data-step');
        var next = parseInt(step) + 1;
        var vali = checkValidateStep(step);
        var stepId = $(this).attr('data-step-id');
        if (!vali) {
            skAlert('error', '必須項目を全て入力してください');
            return false;
        }
        if ($(this).hasClass("btn-step-2")) {
            redirectStep(step, stepId);
        } else if ($(this).hasClass("btn-step-3")) {
            redirectStep(step, stepId);
        }
    });

    function redirectStep(step, stepId) {
        $('.sk-loading-full').removeClass('d-none');
        var package = $(".slt-package").val();
        var languages = [];
        for (let index = 0; index < $('.item-lang .form-check-input:checked').length; index++) {
            let language = $('.item-lang .form-check-input:checked').eq(index);
            languages.push(language.val());
        }
        $.ajax({
            url: "ajax/request/"+stepId,
            data: {
                'languages': languages,
                'package': package,
                'dataVideo': getInfoVideo(),
                'requestName': $("input[name='request_name']").val(),
                'step': step,
                'stepId': stepId
            },
            method: "GET",
            success: function(data) {
                $('.sk-loading-full').addClass('d-none');
                $('#'+data.stepId).html(data.view);

                var next = parseInt(data.step) + 1;
                $('.step-request').eq(data.step).addClass('done');
                $('.step-request').eq(data.step).removeClass('active');
                $('.step-request').eq(next).addClass('active');
                $('.sk-step').removeClass('active');
                $('#'+data.stepId).addClass('active');
            }
        });
    }

    $(document).on('click', '.btn.prev-step', function() {
        var step = $(this).attr('data-step'); // s1
        var prev = parseInt(step) - 1;
        $('.step-request').eq(step).removeClass('active');
        $('.step-request').eq(prev).removeClass('done');
        $('.step-request').eq(prev).addClass('active');

        var stepId = $(this).attr('data-step-id');
        $('.sk-step').removeClass('active');
        $('#'+stepId).addClass('active');
    });
    // hien thong tin video step 1
    $('#input-link').on("keypress", function(e) {
        if (e.keyCode == 13) {
            addVideoTranslate();
        }
    });
    $('.insert-link').on("click", function() {
        if ($("#input-link").val().trim() == "") {
            skAlert("error", "YoutubeのURLを入れてください。");
        } else {
            addVideoTranslate();
        }
    });
    function addVideoTranslate() {
        $('.sk-loading-full').removeClass('d-none');
        var linkVideo = $('#input-link').val();
        $.ajax({
            url: "ajax/youtube/api/video",
            data: {linkVideo: linkVideo},
            method: "POST",
            success: function(data) {
                $('.sk-loading-full').addClass('d-none');
                $('#input-link').val('');
                var videoExists = getIdVideoInsert();
                if ($.inArray(data.videoId, videoExists) == "-1") {
                    $('.sk-label-linkyt').removeClass('d-none');
                    $('.show-data').append(data.view);
                    localStorage.removeItem("refresh_token");
                }
            },
            error: function(error) {
                $('.sk-loading-full').addClass('d-none');
                $('#input-link').val('');
                skAlert('error', 'URLが正しくない又は制限されているため、取得できません。');
            }
        });
    }
    $('.list-video-youtube').on('click', '.del-data', function() {
        var element = $(this).closest('.data-get-link').remove();
        if ($('.show-data .group-link').length == 0) {
            $('.sk-label-linkyt').addClass('d-none');
        }
    });
    // step 2
    $(document).on('click', '.toggle-content .action', function() {
        $(this).closest('.ext-item').toggleClass('hide');
    });
    $(document).on('click', '.slt-caption', function() {
        if (!$(this).hasClass('selected')) {
            $('.slt-caption').removeClass('selected');
            $(this).addClass('selected');
        }
    });

    $(document).on('click', '#ckb-captions', function(e) {
        if ($(this).prop('checked')) {
            e.preventDefault();
            $("#caption-modal").modal();
        } else {
            $('.add-file-captions').prop('checked', false).change();
            $('.caption-file').val('').change();
        }
    });

    $(document).on('click', '.add-file-captions', function(e) {
        var id = $(this).attr('data-id');
        e.preventDefault();
        $("#caption-file-"+id).click();
    });

    $(document).on('click', '#checkout-button', function() {
        $('.sk-loading-full').removeClass('d-none');
        var terms = $("#accept-terms").prop('checked');
        if (!terms) {
            $('.sk-loading-full').addClass('d-none');
            skAlert('error', '規約を見て同意してください。');
            return false;
        }
        createRequest();
    })

    function createRequest() {
        var package = $(".slt-package").val();
        var languages = [];
        for (let index = 0; index < $('.item-lang .form-check-input:checked').length; index++) {
            let language = $('.item-lang .form-check-input:checked').eq(index);
            languages.push(language.val());
        }
        var formData = new FormData();
        formData.append("name", $("input[name='request_name']").val());
        formData.append("languages", languages);
        formData.append("package", package);
        formData.append("videoId", getIdVideoInsert());
        formData.append("videoTransTitle", getVideoCheckedTransTitle());
        formData.append("requestType", $('.request-type').val());
        var autoUpload = $('#auto-upload').prop("checked") ? 1 : 0;
        formData.append("autoUpload", autoUpload);
        $(".caption-file").each(function(i, element) {
            if (element.files.length > 0) {
                formData.append("captionFiles["+$(element).attr("data-id")+"]", element.files[0]);
            }
        });
        
        formData.append("wordBook", getWordBook());
        formData.append("accessToken", localStorage.getItem("refresh_token"));

        $.ajax({
            url: "ajax/request/store",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                createSession(data);
            }
        })
    }

    function createSession(requestId) {
        var dataStripe = $('#btn-payment').attr('data-stripe');
        if (dataStripe == "true") {
            $('#btn-payment').click();
        } else {
            var package = $(".slt-package").val();
            var languages = [];
            for (let index = 0; index < $('.item-lang .form-check-input:checked').length; index++) {
                let language = $('.item-lang .form-check-input:checked').eq(index);
                languages.push(language.val());
            }
            $.ajax({
                url: "ajax/stripe/create-session",
                data: {
                    videoId: getIdVideoInsert(),
                    languages: languages,
                    package: package,
                    requestId: requestId,
                },
                method: "POST",
                success: function(data) {
                    var stripe = Stripe(data.stripePublishKey);
                    var checkoutButton = document.getElementById('btn-payment');
                    checkoutButton.addEventListener('click', function() {
                        stripe.redirectToCheckout({
                        sessionId: data.sessionId
                        }).then(function (result) {});
                    });
                    $('#btn-payment').attr('data-stripe', 'true');
                    $('#btn-payment').click();
                },
                error: function(data) {
                    $('.sk-loading-full').addClass('d-none');
                    skAlert('error', '必須項目を全て入力してください');
                }
            })
        }
    }

    function getIdVideoInsert() {
        var videos = [];
        $("input[name='video_id[]").each(function(index, element) {
            videos.push($(element).val());
        });
        return videos;
    }

    function getInfoVideo() {
        var videos = [];
        $('.data-get-link.group-link').each(function(index, element) {
            var title = $(element).find('.input-title').text();
            var id = $(element).find('.input-id').val();
            var duration = $(element).find('.input-id').attr('data-time');
            var thumbnail = $(element).find('.input-id').attr('data-thumbnail');

            videos.push({
                'id': id,
                'title': title,
                'duration': duration,
                'thumbnail': thumbnail
            });
        });

        return videos;
    }

    $(document).on('change', '.caption-file', function() {
        var fileTypes = ['sbv'];
        var isSuccess = false;
        let id = $(this).attr('id');
        let idVideo = $(this).attr('data-id');
        let input = document.querySelector("#"+id);
        if (input.files && input.files[0]) {
            extension = input.files[0].name.split('.').pop().toLowerCase()
            isSuccess = fileTypes.indexOf(extension) > -1;
            if (isSuccess) {
                $("#captions"+idVideo).prop('checked', true).change();
                $(this).next().text(input.files[0].name);
            } else {
                $("#captions"+idVideo).prop('checked', false).change();
                $(this).next().text($(this).next().attr('data-title'));
                skAlert('error', 'sbvファイルではありません');
                $(this).val('');
            }
        } else {
            $("#captions"+idVideo).prop('checked', false).change();
            $(this).next().text($(this).next().attr('data-title'));
        }
    });
    $(document).on('change', '.add-file-captions', function() {
        let length = $('.add-file-captions:checked').length;
        if (length > 0) {
            $('#ckb-captions').prop('checked', true);
        } else {
            $('#ckb-captions').prop('checked', false);
        }
    })
    $(document).on('click', '#ckb-trans-title', function() {
        let check = $(this).prop('checked');
        if (check) {
            $('.ckb-trans-title-video').prop('checked', true);
        } else {
            $('.ckb-trans-title-video').prop('checked', false);
        }
    })
    $(document).on('change', '.ckb-trans-title-video', function() {
        let length = $('.ckb-trans-title-video:checked').length;
        if (length > 0) {
            $('#ckb-trans-title').prop('checked', true);
        } else {
            $('#ckb-trans-title').prop('checked', false);
        }
    })
    $(document).on('click', '#access-youtube', function(e) {
        e.preventDefault();
        var hasToken = $(this).prop('checked');
        if (hasToken) {
            $("#popup-login-gg").click();
            var interval = setInterval(function(){
                let check = $('#access-youtube').prop('checked');
                let accessToken = localStorage.getItem("refresh_token");
                if (!check && accessToken != null) {
                    $('#access-youtube').prop('checked', true);
                }
                if (check) {
                    clearInterval(interval);
                }
            }, 1000);
        }
    })

    function getVideoCheckedTransTitle() {
        var ids = [];
        $(".ckb-trans-title-video:checked").each(function(i, ele) {
            ids.push($(ele).attr('data-id'));
        })
        return ids;
    }

    function getWordBook() {
        if ($("#use-wordbook").prop('checked')) {
            return $("#use-wordbook").attr('data-id');
        }
        return null;
    }
    $('.slt-package').change(function() {
        $('.sk-loading-full').removeClass('d-none');
        $.ajax({
            url: 'ajax/request/package/'+$(this).val(),
            method: "GET",
            success: function(data) {
                $('.package-language').html(data);
                $('.sk-loading-full').addClass('d-none');
            }
        });
    });
    $(document).on('click', '.form-check-label', function(event) {
        event.preventDefault();
        var language_selected = $('.item-lang .form-check-input:checked').length;
        var setting_package = $('.languages-choose').data('number');
        var input = $(this).find('input');
        if (setting_package == 0) input.prop("checked", !input.prop("checked"));
        else {
            if (input.prop("checked") == true)
                input.prop("checked", false);
            if (language_selected < setting_package && input.prop("checked") == false) {
                input.prop("checked", !input.prop("checked"));
            }
        }
        
    });
});