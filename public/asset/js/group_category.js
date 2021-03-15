$(document).ready(function () {
    // Checkbox check all
    $('.slt-all').click(function () {
        if ($('.slt-row:checked').length < $('.slt-row').length) {
            $('.slt-row').prop('checked', true);
            $('.btn-action').prop("disabled", false);
            $('.btn-action').removeClass('btn-secondary');
            $('.btn-action').addClass('btn-primary');
        } else {
            $('.slt-row').prop('checked', false);
            $('.btn-action').prop("disabled", true);
            $('.btn-action').addClass('btn-secondary');
            $('.btn-action').removeClass('btn-primary');
        }
    });

    // Check box item
    $('.slt-row').click(function () {
        if ($('.slt-row:checked').length > 0) {
            $('.btn-action').prop("disabled", false);
            $('.btn-action').removeClass('btn-secondary');
            $('.btn-action').addClass('btn-primary');
        } else {
            $('.slt-row').prop('checked', false);
            $('.btn-action').prop("disabled", true);
            $('.btn-action').addClass('btn-secondary');
            $('.btn-action').removeClass('btn-primary');
        }
        if ($('.slt-row:checked').length < $('.slt-row').length) {
            $('.slt-all').prop('checked', false);
        } else {
            $('.slt-all').prop('checked', true);
        }
    });

    // Append item
    var category_id_active = [];
    $('.btn-add-new').click(function () {
        var category_id = $(this).attr('data-id');
        var new_item = $(this).closest('tr').html();
        $(this).closest('tr').remove();
        $('.form-add-new table tbody').append("<tr>" + new_item + "</tr>");
        $('.form-add-new table tbody').find('.btn-action').text('削除');
        $('.form-add-new table tbody').find('.btn-action').removeClass('btn-info btn-add-new');
        $('.form-add-new table tbody').find('.btn-action').addClass('btn-danger btn-remove-category');
        $('.form-add-new').removeClass('d-none');
        category_id_active.push(category_id);
    });

    var category_id_actived = [];
    $(document).on('click', '.btn-remove-category', function () {
        $(this).closest('tr').remove();
        var category_id = $(this).attr('data-id');
        var item = $(this).closest('tr').html();
        $(this).closest('tr').remove();
        $('.list-category table tbody').append("<tr>" + item + "</tr>");
        $('.list-category table tbody').find('.btn-action').text('新規追加');
        $('.list-category table tbody').find('.btn-action').removeClass('btn-danger btn-remove-category');
        $('.list-category table tbody').find('.btn-action').addClass('btn-info btn-add-new');
        if ($('.form-add-new tbody tr').length == 0) {
            $('.form-add-new').addClass('d-none');
        }
        category_id_actived.push(category_id);
    });

    $("#submit-form").click(function () {
        $(".sk-loading-full").removeClass("d-none")
        $.ajax({
            url: '/rank/add/group/category',
            type: 'POST',
            data: {
                category_id_active: category_id_active,
                category_id_actived: category_id_actived
            },
            success: function () {
                $(".sk-loading-full").addClass("d-none")
                skAlert('success', "データを更新しました。");
            }
        })
    })

});


