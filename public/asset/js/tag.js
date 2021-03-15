$(document).ready(function() {

    function getArrayTag(element) {
        var tags=[];
        element.each(function(i, obj) {
            tags.push(element.eq(i).html());
        });
        return tags;
    }
    // get tag video
    $('.btn-get-tag').click(function() {
        $('.sk-loading-full').removeClass('d-none');
        let link_youtube = $('#link-youtube').val();
        let delete_text = getArrayTag($('.del-text .item .val'));
        let index = $('.result .sk-custom-tags').data('index');
        $.ajax({
            url: "update/tags/fromurl",
            method: "GET",
            data: {
                link_youtube: link_youtube,
                delete_text: delete_text,
                index: index
            },
            success: function(result) {
                $('.sk-loading-full').addClass('d-none');
                var html_input_tag = "";
                var data = result.data;
                for (property in data) {
                    html_input_tag += '<div class="item"><span class="val">'+ data[property] +'</span><div class="del">×</div></div>';
                }
                html_input_tag += '<input type="text" class="tag">';
                $('.result .sk-tag-items').html(html_input_tag);
                checkLengthTagAvaiable(result.index);
            }
        })
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // update tag video
    $('.btn-upload-tag').click(function() {
        $('.sk-loading-full').removeClass('d-none');
        $.ajax({
            url: "update/tags/upload",
            type: "POST",
            data: {
                tags: getArrayTag($('.result .item .val')),
                tag_common: getArrayTag($('.keep-tag .item .val')),
                video_upload: $('#link-upload').val()
            },
            success: function(result) {
                $('.sk-loading-full').addClass('d-none');
                if (result.status) {
                    skAlert(result.status, result.message);
                }
            }
        })
    });
    // lưu tag common của channel
    $('.btn-save-common').click(function() {
        $('.sk-loading-full').removeClass('d-none');
        $.ajax({
            url: "update/tags/savecommon",
            type: "POST",
            data: {
                tags: getArrayTag($('.keep-tag .item .val')),
            },
            success: function(result) {
                $('.sk-loading-full').addClass('d-none');
                if (result.status == "error") {
                    skAlert(result.status, result.message);
                }
            }
        })
    });

    function getLengthResult(index) {
        var temp = [];
        result = getArrayTag( $('.sk-custom-tags[data-index='+index+']').find('.item .val'));
        for (let index = 0; index < result.length; index++) {
            let str = result[index];
            if (str.indexOf(" ") >= 0) {
                str = '"' + str + '"';
            }
            temp.push(str);
        }
        return temp.join(",").length;
    }

    function checkLengthTagAvaiable() {
        resultLength = getLengthResult('tag-result');
        tagCommonLength = getLengthResult('tag-common');
        temp = (tagCommonLength > 0) ? 1 : 0; // thêm 1 dấu ; khi tag common tồn tại (nếu chuỗi)
        maxLengthResult = parseInt(500) - parseInt(tagCommonLength) - parseInt(temp) ;

        $('.sk-custom-tags[data-index=tag-common]').find('.text-limit .current').html(tagCommonLength);

        $('.sk-custom-tags[data-index=tag-result]').find('.text-limit .current').html(resultLength );
        $('.sk-custom-tags[data-index=tag-result]').find('.text-limit .total').html(maxLengthResult );
        
        // maxLengthOfIndex = $('.sk-custom-tags[data-index='+index+']').find('.text-limit .total').html();
        if (resultLength > parseInt(maxLengthResult)) {
            $('.sk-custom-tags[data-index=tag-result]').find('.sk-tag-block').addClass('error');
        } else {
            $('.sk-custom-tags[data-index=tag-result]').find('.sk-tag-block').removeClass('error');
        }
        if (tagCommonLength > parseInt(500)) {
            $('.sk-custom-tags[data-index=tag-common]').find('.sk-tag-block').addClass('error');
        } else {
            $('.sk-custom-tags[data-index=tag-common]').find('.sk-tag-block').removeClass('error');
        }
    }

    // thêm tag, thay đổi giá trị tag trước
    $(document).on('keydown', '.tag', function(e) {
        element = $(this).closest('.sk-group-tags');
        switch (e.keyCode) {
            case 9:
                if ($(this).val().trim() != "") {
                    $('<div class="item"><span class="val">'+ $(this).val() +'</span><div class="del">×</div></div>').insertBefore(element.find('.sk-tag-items .tag'));
                    $(this).val("");
                    checkLengthTagAvaiable();
                }
                break;
            case 13:
                if ($(this).val().trim() != "") {
                    $('<div class="item"><span class="val">'+ $(this).val() +'</span><div class="del">×</div></div>').insertBefore(element.find('.sk-tag-items .tag'));
                    $(this).val("");
                    checkLengthTagAvaiable();
                }
                break;
            case 8:
                if ($(this).val() == "") {
                    var tag = element.find('.sk-tag-items .item').last().find('span').html();
                    if (tag !== undefined) {
                        element.find('.sk-tag-items .item').last().remove();
                        $(this).val(tag+" ");
                    }
                }
                checkLengthTagAvaiable()
                break;
            default:
                break;
        }        
    })
    // thay đổi chiều dài của input nhập tag
    function resizeInput() {
        var font_family = $(this).css('font-family');
        var font_size = $(this).css('font-size');
        
        text = document.createElement("span"); 
        $('.sk-tag-text').html(text);

        text.style.font = font_family; 
        text.style.fontSize = font_size; 
        text.style.height = 'auto'; 
        text.style.width = 'auto'; 
        text.style.position = 'absolute'; 
        text.style.whiteSpace = 'no-wrap'; 
        text.style.opacity = 0; 
        text.innerHTML = $(this).val(); 

        width = Math.ceil(text.clientWidth) + 30;
        $(this).css('width', width+'px');
    }
    // bắt sự kiện thay đổi nội dung trong input tag
    // $('.tag').keyup(resizeInput).each(resizeInput);
    $('.tag').each(resizeInput);
    $(document).on('keyup', '.tag', resizeInput);
    $(document).on('change', '.tag', resizeInput);
    $(document).on('change', '.tag', function() {
        $(this).val("");
    });
    // xóa tag
    $(document).on('click', '.del', function() {
        $(this).parent().remove();
        checkLengthTagAvaiable();
    })
    // tự động focus vào input khi click vào khu vực tag
    $('.sk-tag-block').click(function(e) {
        if ($(e.target).closest('.sk-tag-items item').length == 0) {
            $(this).find('.tag').focus();
        }
    })
})