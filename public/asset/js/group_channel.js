$(document).ready(function () {
    // Disable button review channel if input null
    SNButton.init("reviewChannel", {
        fields: ["category", "urlChannel",]
    });

    SNButton.init("submit-channel", {
        fields: ["category"]
    });

    SNButton.init("update-channel", {
        fields: ["category"]
    });

    function getIdFromUrlChannel(url_channel) {
        var str = url_channel;
        var pattern = /^(?:(http|https):\/\/[a-zA-Z-]*\.{0,1}[a-zA-Z-]{3,}\.[a-z]{2,})\/channel\/([a-zA-Z0-9_-]{3,})$/;
        var match = str.match(pattern);
        return (match[2]);
    }

    // Review Channel
    var crawler_channel_url = [];
    $("#reviewChannel").click(function () {
        var url_channel = $("#urlChannel").val();
        $(".sk-loading-full").removeClass("d-none");
        $.ajax({
            type: 'GET',
            url: 'mychannel/review',
            data: {
                url_channel: url_channel,
            },
            success: function (data) {
                $(".sk-loading-full").addClass("d-none");
                if (data.status == "success" && crawler_channel_url.includes(data.url) == false) {
                    crawler_channel_url.push(data.url);
                    $('table tbody').append(data.view);
                    // if ($('table tbody tr').length > 0) {
                    //     $("#submit-channel").removeClass('d-none');
                    //     $("#update-channel").removeClass('d-none');
                    // }
                }
            }
        });
    });

    // Remove Channel
    $(document).on('click', '.remove-channel', function () {
        $(this).closest('tr').remove();
        var dataid = $(this).attr('data-channel-id');
        var idx = $.inArray(dataid, crawler_channel_url);
        crawler_channel_url.splice(idx, 1);
        // if ($('table tbody tr').length == 0) {
        //     $("#submit-channel").addClass('d-none');
        //     $("#update-channel").addClass('d-none');
        // }
    });

    // Save Channel
    $("#submit-channel").click(function () {
        var category = $("#category").val();
        $.ajax({
            type: 'POST',
            url: 'mychannel/create',
            data: {
                category: category,
                crawler_channel_url: crawler_channel_url
            },
            success: function () {
                window.location = "/mychannel"
            }
        })
    });

    if ($("table tbody tr").length > 0) {
        $("table tbody tr").each(function () {
            crawler_channel_url.push($(this).find('.remove-channel').attr('data-channel-id'))
        });
    }

    //Update Channel
    $("#update-channel").click(function () {
        var category_id = $("#category").data('id');
        var category_name = $("#category").val();
        $.ajax({
            type: 'POST',
            url: 'mychannel/update/' + category_id,
            data: {
                category_id: category_id,
                category_name: category_name,
                crawler_channel_url: crawler_channel_url
            },
            success: function () {
                window.location = "/mychannel"
            }
        })
    });
});
