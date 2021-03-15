// ký tự cho phép, thời gian kết thúc video
var keyAllow = [48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 8, 46, 37, 39, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 190]; //0-9, number 0-9, del, backspace, .
var keyDoubleDot = 186;
var durationVideo = "99:00:00:000";
// api video youtube
var player, seconds = 0;
function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        playerVars: { 'autoplay': 1, 'controls': 0 },
        events: {
        'onReady': onPlayerReady
        }
    });
}

function onPlayerReady(event) {
    event.target.playVideo();
    // player.pauseVideo();
}
// nhảy thời gian
function seek(seconds){
    if(player){
        if (player.getCurrentTime() != seconds) {
            player.seekTo(seconds, true);
        }
    }
}
// set size textarea
$('textarea').each(function () {
    this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
}).on('input', function () {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
});

$(document).ready(function() {
    // tạm dừng video
    setTimeout(() => {
        if(player) {
            player.pauseVideo();
        } else {
            onYouTubeIframeAPIReady();
            setTimeout(() => {
                if(player) {
                    player.pauseVideo();
                }
            }, 2000);
        }
    }, 3000);
  
    function showCaption(caption) {
        $(".fake-caption").html(caption.replace(/\n/g,"<br>"));
        $(".sk-fake-caption").removeClass("d-none");
    }

    $('.items-trans').on('click', '.action .close', function() {
        if ($(".close").length > 1) {
            index = $(this).index('.close');
            removeContentCaption(index);
            autoSaveCaptionMyChannel();
            $(this).closest('.item-translate').remove();
            validateTime(index, "del");
            $(".resizable").eq(index).remove();
        }
    });
    // vali time
    $('.items-trans').on('click', '.action .add', function() {
        var index = $(this).index(".add");
        var time1 = $(".end").eq(index).find("input").val();
        var time2 = $(".start").eq(index + 1).find("input").val();
        time2 = time2 ?? durationVideo;
        var current = time1.split(":");
        var after = time2.split(":");
        var miliSecondCurrent = time1.split(".")[1];
        var miliSecondAfter = time2.split(".")[1];
        if (isNaN(current[0]) || isNaN(current[1]) || isNaN(current[2]) || isNaN(after[0]) || isNaN(after[1]) || isNaN(after[2])) {
            return false;
        }
        var timeCurrent = new Date();
        timeCurrent.setHours(current[0]);
        timeCurrent.setMinutes(current[1]);
        timeCurrent.setSeconds(current[2]);
        var timeAfter = new Date();
        timeAfter.setHours(after[0]);
        timeAfter.setMinutes(after[1]);
        timeAfter.setSeconds(after[2]);

        var timeDiff = parseInt(time2.replaceAll(":", "").replaceAll(".", "")) - parseInt(time1.replaceAll(":", "").replaceAll(".", ""));
        if (timeDiff <= 12) {
            return false;
        }
        if (timeDiff <= 200) {
            startNext = ("0" + timeCurrent.getHours()).slice(-2) + ":" + ("0" + timeCurrent.getMinutes()).slice(-2) + ":" + ("0" + timeCurrent.getSeconds()).slice(-2) + "." + miliSecondCurrent;
            endNext = ("0" + timeAfter.getHours()).slice(-2) + ":" + ("0" + timeAfter.getMinutes()).slice(-2) + ":" + ("0" + timeAfter.getSeconds()).slice(-2) + "." + miliSecondAfter;
            dataTimeS = timeCurrent.getHours() * 3600 + timeCurrent.getMinutes() * 60 + timeCurrent.getSeconds() + miliSecondCurrent;
            dataTimeE = timeAfter.getHours() * 3600 + timeAfter.getMinutes() * 60 + timeAfter.getSeconds() + miliSecondAfter;
        } else {
            startNext = ("0" + timeCurrent.getHours()).slice(-2) + ":" +("0" +  timeCurrent.getMinutes()).slice(-2) + ":" + ("0" + timeCurrent.getSeconds()).slice(-2) + "." + miliSecondCurrent;
            dataTimeS = timeCurrent.getHours() * 3600 + timeCurrent.getMinutes() * 60 + timeCurrent.getSeconds() + miliSecondCurrent;
            endNext2 = timeCurrent;
            endNext2.setSeconds(timeCurrent.getSeconds() + 2);
            endNext = ("0" + endNext2.getHours()).slice(-2) + ":" + ("0" + endNext2.getMinutes()).slice(-2) + ":" + ("0" + endNext2.getSeconds()).slice(-2) + "." + miliSecondCurrent;
            dataTimeE = endNext2.getHours() * 3600 + endNext2.getMinutes() * 60 + endNext2.getSeconds() + miliSecondCurrent;
        }
        
        var html = getHtml(startNext, endNext, dataTimeS/1000, dataTimeE/1000);
        var width = parseInt((parseFloat(dataTimeE) - parseFloat(dataTimeS))/10);
        var barTimeLineHtml = getBarTimeLineHtml(width, parseInt(dataTimeS / 10), "");
        var itemTranslate = $(this).closest('.item-translate');
        $(".resizable").eq(index).after(barTimeLineHtml);
        itemTranslate.after(html);

        $('.items-trans').scrollTop(parseInt($('.items-trans').scrollTop()) + 60);

        resizeTextarea();
        $(".time-line").removeClass('d-none');
        $(".resizable").resizable({
            handles: 'e, w'
        });
        addContentCaption(index);
        autoSaveCaptionMyChannel();
    });
    
    function getBarTimeLineHtml(width, left, text) {
        return '<div class="resizable" style="width: '+width+'px; left: '+left+'px" data-left="'+left+'">'
        + '<div class="moveable">'+text+'</div>'
        + '</div>'
    }
    // vali text time
    $(document).on("keydown", ".time input", function(e) {
        if (keyAllow.indexOf(e.keyCode) != "-1" || (e.shiftKey && e.keyCode == keyDoubleDot)) {
        } else {
            e.preventDefault();
        }
    });

    $(document).on("focusin", ".time input", function(){
        $(this).data('val', $(this).val());
    });

    $(document).on("change", ".time input", function(){
        // trở về giá trị cũ khi sai định dạng
        var index = $(this).closest('.time').index('.time');
        var str = $(this).val();
        var patt1 = /^[0-9]{1,2}:[0-5][0-9]:[0-5][0-9]$/;
        var patt2 = /^[0-9]{1,2}:[0-5][0-9]:[0-5][0-9].[0-9][0-9][0-9]$/;
        if (result = str.match(patt1)) {
            valuInput = result + ".000";
            $(this).val(valuInput);
            changeContentCaption(index);
            autoSaveCaptionMyChannel();
        } else if (result = str.match(patt2)) {
            valuInput = str;
            changeContentCaption(index);
            autoSaveCaptionMyChannel();
        } else {
            valuInput = $(this).attr("data-val");
            $(this).val(valuInput);
        }
        var time = valuInput.split(":");
        var seconds = parseInt(time[0]) * 3600 + parseInt(time[1]) * 60 + parseFloat(time[2]);
        $(this).attr("data-time", seconds)
        // bắt lỗi khi thời gian không đúng
        validateTime(index);
        let start = $(".item-translate").eq(index).find(".time .start input").attr("data-time");
        let end = $(".item-translate").eq(index).find(".time .end input").attr("data-time");
        let width = (parseInt(end) - parseInt(start)) * 100 + "px";
        let left = parseInt(start * 100) + "px";
        $("#timeline-caption .resizable").eq(index).css("width", parseInt(width)).css("left", left);
    });

    function getTimeAndContent() {
        var result = [];
        $(".item-translate").each(function() {
            let start = $(this).find(".start input").data('time');
            let end = $(this).find(".end input").data('time');
            let content = $(this).find(".content textarea").val();
            let obj = {
                "start": start,
                "end": end,
                "content": content
            };
            result.push(obj);
        })
        return result;
    }

    $(document).on("click", ".item-translate", function(e) {
        if (!e.target.closest(".action")) {
            let index = $(this).index(".item-translate");
            let start = $(this).find(".start input").attr('data-time');
            let content = $(this).find(".content textarea").val();
            seek(start);
            showCaption(content);
            $("#timeline-caption .resizable").removeClass("active");
            $("#timeline-caption .resizable").eq(index).addClass("active");
            $(".time-line").scrollLeft(parseInt(start * 100) - 100);
            $('.item-translate').removeClass('active');
            $(this).addClass('active');            
        }
    });

    function validateTime(index, action=null) {
        var endBefore = index > 0 ? $(".end").eq(index - 1).find("input").val() : "00:00:00.000";
        var startCurrent = $(".start").eq(index).find("input").val() ?? endBefore;
        var endCurrent = $(".end").eq(index).find("input").val() ?? startCurrent;
        var startNext = $(".start").eq(index + 1).find("input").val();
        startNext = startNext ?? durationVideo;

        endBefore = parseInt(endBefore.replaceAll(":", ""));
        startCurrent = parseInt(startCurrent.replaceAll(":", ""));
        endCurrent = parseInt(endCurrent.replaceAll(":", ""));
        startNext = parseInt(startNext.replaceAll(":", ""));
        
        if (endBefore > startCurrent) {
            $(".end").eq(index - 1).find("input").addClass('text-danger');
            $(".start").eq(index).find("input").addClass('text-danger');
        } else {
            $(".end").eq(index - 1).find("input").removeClass('text-danger');
        }
        if (startCurrent > endCurrent) {
            $(".start").eq(index).find("input").addClass('text-danger');
            $(".end").eq(index).find("input").addClass('text-danger');
        } else {
            if (startCurrent >= endBefore) {
                $(".start").eq(index).find("input").removeClass('text-danger');
            }
            if (endBefore <= startNext) {
                $(".end").eq(index).find("input").removeClass('text-danger');
            }
        }
        if (endCurrent > startNext) {
            $(".end").eq(index).find("input").addClass('text-danger');
            $(".start").eq(index + 1).find("input").addClass('text-danger');
        } else {
            $(".start").eq(index + 1).find("input").removeClass('text-danger');
        }
    }

    function getHtml(start, end, dataTimeS, dataTimeE) {
        return '<div class="item-translate">'
            + '<div class="time">'
            + '<div class="start">'
            + '<input type="text" class="form-control" name="start[]" value="'+start+'" data-val="'+start+'" data-time="'+dataTimeS+'">'
            + '</div>'
            + '<div class="end">'
            + '<input type="text" class="form-control" name="end[]" value="'+end+'" data-val="'+end+'" data-time="'+dataTimeE+'">'
            + '</div>'
            + '</div>'
            + '<div class="content">'
            + '<textarea class="autofit form-control" name="text[]"></textarea>'
            + '</div>'
            + '<div class="action">'
            + '<div class="close"><i class="fas fa-times-circle"></i></div>'
            + '<div class="add"><i class="fas fa-plus-circle"></i></div>'
            + '</div>'
            + '</div>';
    }

    function resizeTextarea() {
        $('textarea').each(function () {
            this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
        }).on('input', function () {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
    }
    // lưu / upload bản dịch
    $(document).on('click', '.btn-action-draft', function () {
        saveCaption(0);
    });
    $(document).on('click', '.btn-action-upload', function () {
        uploadCaption();
    });

    function saveCaption(status) {
        $('.sk-loading-full').removeClass('d-none');
        var pathname = location.pathname.split('/');
        var youtubeId = pathname[3] ?? "";
        var langId = pathname[4] ?? "";
        var formData = new FormData();
        for (var i = 0; i < $("textarea[name='text[]']").length; i++) {
            formData.append('start[]', $("input[name='start[]']").eq(i).val());
            formData.append('end[]', $("input[name='end[]']").eq(i).val());
            formData.append('text[]', $("textarea[name='text[]']").eq(i).val());
        }
        $.ajax({
            url: "translate_status/store/" + youtubeId + "/" + langId,
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                $('.sk-loading-full').addClass('d-none');
                location.reload();
            }
        });
    };

    function uploadCaption() {
        $('.sk-loading-full').removeClass('d-none');
        var youtubeId = $('.info-video-trans').data('youtube-id');
        var langId = $('.info-video-trans').data('lang-id');
        var formData = new FormData();
        for (var i = 0; i < $("textarea[name='text[]']").length; i++) {
            formData.append('start[]', $("input[name='start[]']").eq(i).val());
            formData.append('end[]', $("input[name='end[]']").eq(i).val());
            formData.append('text[]', $("textarea[name='text[]']").eq(i).val());
        }
        formData.append("youtubeId", youtubeId);
        formData.append("langId", langId);
        $.ajax({
            url: "translate_status/upload",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                $('.sk-loading-full').addClass('d-none');
                skAlert('success', "Youtubeへ反映して公開しました。");
            },
            error: function(data) {
                $('.sk-loading-full').addClass('d-none');
                skAlert('error', "この動画のアップロード権限がありません。");
            }
        });
    };
    // import file
    $(document).on('click', '.btn-import-caption', function() {
        $("#import-file").click();
    });
    $(document).on('change', "#import-file", function() {
        if (this.files.length == 1) {
            $('.sk-loading-full').removeClass('d-none');
            var formData = new FormData();
            formData.append("file", this.files[0]);
            formData.append("youtubeId", $('.info-video-trans').data('youtube-id'));
            formData.append("langId", $('.info-video-trans').data('lang-id'));
            $.ajax({
                url: "translate_status/import",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    location.reload();
                    // $(".items-trans").html(data.listtime);
                    // $("#timeline-caption").html(data.timeline);
                    // $('.sk-loading-full').addClass('d-none');
                    // $(".resizable").resizable({
                    //     handles: 'e, w'
                    // });
                },
                error: function(data) {
                    $('.sk-loading-full').addClass('d-none');
                }
            });
        }
    });
    // google translate
    $(document).on("click", ".btn-gg-trans", function() {
        $('.sk-loading-full').removeClass('d-none');
        var contents = [];
        var code = $(this).attr('data-code');
        var pathname = location.pathname.split('/');
        var youtubeId = pathname[3] ?? "";
        for (let index = 0; index < $("textarea[name='text[]']").length; index++) {
            var content = $("textarea[name='text[]']").eq(index).val();
            contents.push(content);
        }
        $.ajax({
            url: "translate_status/autoTranslate",
            type: "POST",
            data: {
                "contents": contents,
                "code": code,
                "youtubeId": youtubeId,
            },
            success: function(data) {
                for (let index = 0; index < data.length; index++) {
                    var text = data[index];
                    $("textarea[name='text[]']").eq(index).val(text);
                    
                }
                $('.sk-loading-full').addClass('d-none');
            },
            error: function(data) {
                $('.sk-loading-full').addClass('d-none');
                skAlert("error","GoogleAPIで翻訳するため、翻訳設定を行ってください。");
            }
        });
    });
})
// change time 
var mousePosition;
var offset = [0,0];
var div;
var isDown = false;
$(document).ready(function() {
    $(document).on("mousedown", ".moveable", function(e) {
        $(this).addClass("move");
        ele = document.getElementsByClassName("moveable move")[0];
        isDown = true;
        offset = [
            ele.parentElement.offsetLeft - e.clientX,
        ];
    });
    $(document).on("mouseup", function(e) {
        if (isDown) {
            let parent = $(".moveable.move").parent();
            let index = $(".moveable.move").index(".moveable");
            let left = parseInt(parent.css("left"));
            let width = parseInt(parent.css("width"));
            var time = getTime(left, width);
            changeTimeStart(time, index);
            changeTimeEnd(time, index);
        }
        if ($(".moveable.move").length > 0) {
            let index = $(".moveable.move").index(".moveable");
            $(".moveable.move").removeClass("move");
            isDown = false;
            changeContentCaption(index);
            autoSaveCaptionMyChannel();
        }
        if ($(".resizable.ui-resizable-resizing").length > 0) {
            let index = $(".resizable.ui-resizable-resizing").index(".resizable");
            changeContentCaption(index);
            autoSaveCaptionMyChannel();
        }
    });
    $(document).on("mousemove", function(event) {
        event.preventDefault();
        ele = document.getElementsByClassName("moveable move")[0];
        if (isDown) {
            mousePosition = {
                x : event.clientX,
            };
            if (mousePosition.x + offset[0] > 0 && mousePosition.x + offset[0] < parseInt($("#timeline-caption").css("width"))) {
                ele.parentElement.style.left = (mousePosition.x + offset[0]) + 'px';
            }
        }
    });

    $(document).on("resize", ".resizable", function() {
        let index = $(this).index(".resizable");
        let currentLeft = parseInt($(this).attr("data-left"));
        let nextLeft = parseInt($(this).css("left"));
        nextLeft = nextLeft < 0 ? 0 : nextLeft;
        var time = getTime(nextLeft, parseInt($(this).css("width")));
        if (currentLeft != nextLeft) {
            changeTimeStart(time, index);
        }
        else {
            changeTimeEnd(time, index);
        }
    })

    function getTime(left, width) {
        start = left / 100;
        secondS = start % 60;
        minuteS = parseInt(start % 3600 / 60);
        hourS = parseInt(start / 3600);

        end = left / 100 + parseInt(width) / 100;
        secondE = end % 60;
        minuteE = parseInt(end % 3600 / 60);
        hourE = parseInt(end / 3600);

        return {
            "start": start,
            "secondS": secondS,
            "minuteS": minuteS,
            "hourS": hourS,
            "end": end,
            "secondE": secondE,
            "minuteE": minuteE,
            "hourE": hourE
        }
    }

    function changeTimeStart(time, index) {
        start = time["start"];
        secondS = time["secondS"];
        minuteS = time["minuteS"];
        hourS = time["hourS"];
        $(".start").eq(index).find("input").val(('0'+hourS).slice(-2) + ":" + ('0'+minuteS).slice(-2) + ":" + ('0' + secondS.toFixed(3)).slice(-6));
        $(".start").eq(index).find("input").attr("data-time", start);
        $(".resizable").eq(index).attr("data-left", start * 100);
    }

    function changeTimeEnd(time, index) {
        end = time["end"];
        secondE = time["secondE"];
        minuteE = time["minuteE"];
        hourE = time["hourE"];
        $(".end").eq(index).find("input").val(('0'+hourE).slice(-2) + ":" + ('0'+minuteE).slice(-2) + ":" + ('0' + secondE.toFixed(3)).slice(-6));
        $(".end").eq(index).find("input").attr("data-time", end);
    }

    // change value
    $(document).on("keyup", ".content textarea", function() {
        index = $(this).index(".content textarea");
        $(".fake-caption").html($(this).val().replace(/\n/g,"<br>"));
        $(".moveable").eq(index).text($(this).val());
    })

    $(document).on('click', ".resizable", function() {
        let index = $(this).index(".resizable");
        $(".item-translate").eq(index).click();
        var offset_item = $(".item-translate").eq(index).offset();
        var offer_items = $('.items-trans').offset();
        var top = parseInt(offset_item.top) - parseInt(offer_items.top);
        $('.items-trans').scrollTop(top);
        // $(".item-translate").eq(index).find('textarea').focus();
    })

    $(document).on('change', '.content textarea', function() {
        let index = $(this).index(".content textarea");
        changeContentCaption(index);
        autoSaveCaptionMyChannel();
    });

    $(document).on('click', '.scroll-step .ico.fa-backward', function() {
        var scroll = $('.time-line ').scrollLeft();
        var width = $('.scroll-step').css('width');
        var scroll_new = scroll - parseInt(width) / 2;
        $('.time-line ').scrollLeft(parseInt(scroll_new));
    })
    $(document).on('click', '.scroll-step .ico.fa-forward', function() {
        var scroll = $('.time-line ').scrollLeft();
        var width = $('.scroll-step').css('width');
        var scroll_new = parseInt(width) / 2 + scroll;
        $('.time-line ').scrollLeft(parseInt(scroll_new));
    })
})
