// $(document).ready(function(){
    
    // $(document).on('click', '.show-traffic', function() {
    //     $('#traffic').modal('show');
    // });
// });
$(function() {
    $('#sk-daterange').daterangepicker({
        autoUpdateInput: false,
        locale: {
            format: 'MM/DD/YYYY',
            customRangeLabel: "カスタム",
            cancelLabel: 'キャンセル',
            applyLabel: '選択',
        },
        ranges: {
            '全期間': [moment(), moment()],
            '過去 1 日間': [moment().subtract(1, 'days'), moment()],
            '過去 7 日間': [moment().subtract(7, 'days'), moment()],
            '過去 30 日間': [moment().subtract(30, 'days'), moment()],
        }
    });
    
    $('#sk-daterange').on('apply.daterangepicker', function(ev, picker) {
        $('.sk-loading-full').removeClass('d-none');
        if (picker.chosenLabel === '全期間') {
            $(this).val('');
            $(this).attr('placeholder', '全期間');
        } else {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        }

        var page = $(".page-item.active").attr('data-page');
        var time = $(this).val();
        var videoNumber = $('.sk-slt-number').val();
        $.ajax({
            url: "/video/getMoreData",
            method: "GET",
            data: {
                "page": page,
                "time": time,
                "videoNumber": videoNumber,
            },
            success: function(data) {
                $('.card-data-video').html(data);
                $('.sk-loading-full').addClass('d-none');
            }
        });
    });
});

$(document).ready(function(){
    $(document).on('click', '.pagination .page-item', function() {
        if ($(this).hasClass("disabled")) {
            return false;
        }
        var page = $(this).attr('data-page');
        var time = $('#sk-daterange').val();
        var videoNumber = $('.sk-slt-number').val();
        loadMore(page, time, videoNumber);
    });

    $(document).on('change', '.sk-slt-number', function() {
        var page = 1;
        var time = $('#sk-daterange').val();
        var videoNumber = $('.sk-slt-number').val();
        loadMore(page, time, videoNumber);
    });

    function loadMore(page, time, videoNumber) {
        $('.sk-loading-full').removeClass('d-none');
        $.ajax({
            url: "/video/getMoreData",
            method: "GET",
            data: {
                "page": page,
                "time": time,
                "videoNumber": videoNumber,
            },
            success: function(data) {
                $('.card-data-video').html(data);
                $('.sk-loading-full').addClass('d-none');
            }
        });
    }

    $(document).on('click', '.show-traffic', function() {
        var videoId = $(this).attr('data-id');
        var time = $('#sk-daterange').val();
        $('.sk-loading-full').removeClass('d-none');
        $.ajax({
            url: "/video/getTraffic",
            method: "GET",
            data: {
                "videoId": videoId,
                "time": time,
            },
            success: function(data) {
                $('.modal-body').html(data);
                $('.sk-loading-full').addClass('d-none');
                $('#traffic').modal('show');
            }
        });
    })
});

