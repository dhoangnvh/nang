/**
 * Rank channel by subscriber
 */
function loadChannelRanking() {
    var page = 1;
    var pathSearch = "?page=" + page;
    var subscriber = $('.range-subscriber').val();
    var time = $('.time-select.selected').data('time');
    var sort = $('.order-select.selected').data('sort');
    var channelName = $('.search-rank').val();
    if (time) pathSearch += "&time=" + time;
    if (subscriber) pathSearch += "&subscribers=" + subscriber;
    if (sort) pathSearch += "&sort=" + sort;
    if (channelName) pathSearch += "&search=" + channelName;
    location.search = pathSearch;
}

$('.card-subscriber .order-select').click(function() {
    if ($(this).hasClass('selected')) {
        return;
    }
    $('.order-select').removeClass('selected');
    $(this).addClass('selected');
    loadChannelRanking();
})

$('.card-subscriber .time-select').click(function() {
    if ($(this).hasClass('selected')) {
        return;
    }
    $('.time-select').removeClass('selected');
    $(this).addClass('selected');
    loadChannelRanking();
})

$('.card-subscriber .range-subscriber').change(function() {
    loadChannelRanking();
})

$('.card-subscriber .search-rank').change(function() {
    loadChannelRanking();
})

/**
 * Rank channel by category
 */

function loadChannelRankingCategory() {
    var page = 1;
    var pathSearch = "?page=" + page;
    var subscriber = $('.sub-range li.active').data('val');
    var time = $('.range-date').val();
    var sort = $('.sort-by').val();
    var publishedAt = $('.publish-in-year').val();
    var category = $('.category-select').val();

    if (time) pathSearch += "&time=" + time;
    if (subscriber) pathSearch += "&subscribers=" + subscriber;
    if (sort) pathSearch += "&sort=" + sort;
    if (publishedAt) pathSearch += "&in_year=" + publishedAt;
    if (category) pathSearch += "&category=" + category;
    location.search = pathSearch;
}

$('.card-category .slt-filter').change(function() {
    loadChannelRankingCategory();
});

$('.sub-range li').click(function() {
    if (!$(this).hasClass('active')) {
        $('.sub-range li').removeClass('active');
        $(this).addClass('active');
        loadChannelRankingCategory();
    }
});

$(document).ready(function() {
    $(document).on('click', '.add-group-category', function() {
        $("#channel-id").val($(this).data('id'));
        $('#categoryModal').modal();
    })

    $(document).on('click', '#submit-category', function() {
        $.ajax({
            url: "/mychannel/quickadd",
            type: "POST",
            data: {
                "channel_id": $("#channel-id").val(),
                "category_id": $("#slt-group-category").val()
            },
            success: function(data) {
                skAlert('success', 'データを更新しました。');
            }
        });
    });
});
