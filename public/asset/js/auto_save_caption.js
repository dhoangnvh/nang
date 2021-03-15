var pathname = location.pathname.split('/');
var youtubeId = pathname[3] ?? "";
var langId = pathname[4] ?? "";
var arrCaptions = [];
var contentCaptions = "";

function changeContentCaption(index) {
    let start = $("input[name='start[]']").eq(index).val();
    let end = $("input[name='end[]']").eq(index).val();
    let text = $("textarea[name='text[]']").eq(index).val().trim().replace(/^\s*\n/gm, "");
    let newObjContent = {
        "start": start,
        "end": end,
        "text": text
    };
    let newContent = start + "," + end + "\n" + text + "\n\n";
    let oldObjContent = arrCaptions[index];
    let oldContent = oldObjContent.start + "," + oldObjContent.end + "\n" + oldObjContent.text + "\n\n";
    contentCaptions = contentCaptions.replace(oldContent, newContent);
    arrCaptions[index] = newObjContent;
}

function removeContentCaption(index) {
    let oldObjContent = arrCaptions[index];
    let oldContent = oldObjContent.start + "," + oldObjContent.end + "\n" + oldObjContent.text + "\n\n";
    contentCaptions = contentCaptions.replace(oldContent, "");
    arrCaptions.splice(index, 1); // xóa 1 phần tử từ vị trí 3
}

function addContentCaption(index) {
    let next = parseInt(index) + 1;
    let start = $("input[name='start[]']").eq(next).val();
    let end = $("input[name='end[]']").eq(next).val();
    let text = $("textarea[name='text[]']").eq(next).val();
    let newObjContent = {
        "start": start,
        "end": end,
        "text": text
    };
    let newContent = start + "," + end + "\n" + text + "\n\n";
    arrCaptions.splice(next, 0, newObjContent); // thêm new object vào vị trí index
    let oldObjContent = arrCaptions[index];
    let oldContent = oldObjContent.start + "," + oldObjContent.end + "\n" + oldObjContent.text + "\n\n";
    let changeContent = oldContent + newContent;
    contentCaptions = contentCaptions.replace(oldContent, changeContent);

}

function autoSaveCaptionMyChannel() {
    var pathname = location.pathname.split('/');
    var youtubeId = pathname[3] ?? "";
    var langId = pathname[4] ?? "";
    $.ajax({
        url: "translate_status/autosave",
        type: "POST",
        data: {
            "contentCaptions": contentCaptions,
            "youtubeId": youtubeId,
            "langId": langId
        },
        success: function (data) {
            $(".btn-download-caption").attr("href", data);
        }
    });
}

function autoSaveCaptionRequest() {
    var pathname = location.pathname.split('/');
    var videoId = pathname[3] ?? "";
    var langId = pathname[4] ?? "";
    $.ajax({
        url: "captions/autosave",
        type: "POST",
        data: {
            "contentCaptions": contentCaptions,
            "videoId": videoId,
            "langId": langId
        },
        success: function (data) {
            $(".btn-download-caption").attr("href", data);
        }
    });
}

$(document).ready(function() {
    for (var i = 0; i < $("textarea[name='text[]']").length; i++) {
        let start = $("input[name='start[]']").eq(i).val();
        let end = $("input[name='end[]']").eq(i).val();
        let text = $("textarea[name='text[]']").eq(i).val();
        let obj = {
            "start": start,
            "end": end,
            "text": text
        };
        arrCaptions.push(obj);
        contentCaptions += start + "," + end + "\n" + text + "\n\n";
    }

    $(".arrow-left").click(function() {
        $(".col-content").removeClass("col-md-6").addClass("col-md-4");
        $(".col-video").removeClass("col-md-6").addClass("col-md-8");
        $(this).addClass('d-none');
        $(".arrow-right").removeClass('d-none');
    });
    $(".arrow-right").click(function() {
        $(".col-content").removeClass("col-md-4").addClass("col-md-6");
        $(".col-video").removeClass("col-md-8").addClass("col-md-6");
        $(this).addClass('d-none');
        $(".arrow-left").removeClass('d-none');
    });
});
