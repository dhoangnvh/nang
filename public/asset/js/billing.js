$(document).ready(function() {
    $('.select2bs4').select2({
        theme: 'bootstrap4',
        placeholder: "翻訳言語を選択してください",
        dropdownCssClass: "font-select2"
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
    $('select[name="slt-translator"]').change(function() {
        var page = 1;
        loadMore(page);
    });
    $('.month-invoice').datepicker({
        autoclose: true,
        minViewMode: 1,
        format: 'mm/yyyy'
    }).on('changeDate', function (ev) {
        var page = 1;
        loadMore(page);
    });

    $("#remove-time").click(function() {
        var page = 1;
        $('.month-invoice').val('');
        loadMore(page);
    })

    $('.slt-languages').change(function() {
        var page = 1;
        loadMore(page);
    });
    
    function loadMore(page) {
        var translator_id = $('select[name="slt-translator"]').val();
        var number_item = $('.sk-slt-number').val();
        var time = $(".month-invoice").val();
        var languages = $('.slt-languages').val();
        $('.sk-loading-full').removeClass('d-none');
        $.ajax({
            url: "business/billing/getMoreData",
            method: "GET",
            data: {
                "page": page,
                "time": time,
                "translator_id": translator_id,
                "number": number_item,
                "languages": languages
            },
            success: function(data) {
                $('.card-data-request').html(data);
                $('.sk-loading-full').addClass('d-none');
            }
        });
        
    }
    $(document).on('change', '.slt-all', function() {
        if ($(this).prop('checked')) {
            $('.slt-row').prop('checked', true);
            if ($('.slt-row:checked').length > 0)
                $('.btn-paid .btn-action').addClass('active');
        } else {
            $('.slt-row').prop('checked', false);
            $('.btn-paid .btn-action').removeClass('active');
        }
    });

    $(document).on('change', '.slt-row', function() {
        if ($('.slt-row:checked').length == 0) {
            $('.slt-all').prop('checked', false);
            $('.btn-paid .btn-action').removeClass('active');
        } else {
            $('.btn-paid .btn-action').addClass('active');
        }
    })

    $(document).on('click', '.btn-paid .btn-action.active', function() {
        if (confirm("ステータスを変更してもよろしいでしょうか？")) {
            requests = [];
            $('.slt-row:checked').each(function(i, obj) {
                temp = {
                    "request_id": $(obj).attr('data-request-id'),
                    "translator_id": $(obj).attr('data-translator-id'),
                };
                requests.push(temp);
            });
    
            $('.sk-loading-full').removeClass('d-none');
            $.ajax({
                url: "business/billing/changepaid",
                method: "POST",
                data: {requests: requests},
                success: function(data) {
                    $('.slt-row:checked').each(function(i, obj) {
                        index = $(obj).index('.slt-row');
                        $(".control-balloon-selector").eq(index).find('.translated').toggleClass('active');
                        $(".control-balloon-selector").eq(index).find('.unpaid').toggleClass('active');
                    });
                    $('.sk-loading-full').addClass('d-none');
                    skAlert("success","データを更新しました。");
                }
            });
        }
    });
    $(document).on('click', '.translated', function() {
        if (confirm("ステータスを変更してもよろしいでしょうか？")) {
            var parent = $(this).closest(".control-balloon-selector");
            $(this).addClass('active');
            parent.find(".unpaid").removeClass('active');
            requests = [];
            temp = {
                "request_id": parent.attr('data-request-id'),
                "translator_id": parent.attr('data-translator-id'),
            };
            requests.push(temp);
            $('.sk-loading-full').removeClass('d-none');
            $.ajax({
                url: "business/billing/paid",
                method: "POST",
                data: {requests: requests},
                success: function(data) {
                    $('.sk-loading-full').addClass('d-none');
                    skAlert("success","データを更新しました。");
                }
            });
        }
    })
    $(document).on('click', '.unpaid', function() {
        if (confirm("ステータスを変更してもよろしいでしょうか？")) {
            var parent = $(this).closest(".control-balloon-selector");
            parent.find(".translated").removeClass('active');
            $(this).addClass('active');
            requests = [];
            temp = {
                "request_id": parent.attr('data-request-id'),
                "translator_id": parent.attr('data-translator-id'),
            };
            requests.push(temp);
            $('.sk-loading-full').removeClass('d-none');
            $.ajax({
                url: "business/billing/unpaid",
                method: "POST",
                data: {requests: requests},
                success: function(data) {
                    $('.sk-loading-full').addClass('d-none');
                    skAlert("success","データを更新しました。");
                }
            });
        }
    })
});