$(document).ready(function () {
    changeRole();
    $(document).on("click", ".del-request", function (event) {
        event.preventDefault();
        var userId = $(this).attr('data-id');
        var check = confirm("削除してもよろしいでしょうか？");
        if (check) {
            $(".sk-loading-full").removeClass('d-none');
            $.ajax({
                url: "/user/delete/" + userId,
                type: "GET",
                success: function (data) {
                    path = location.pathname.split('/');
                    if (path[2] == undefined) {
                        location.href = "/" + path[1];
                    }
                    location.href = "/" + path[1] + '/' + path[2];
                }
            });
        }
    });

    var id = '';
    $(document).on("click", ".rowlink td:not('.nolink')", function () {
        id = $(this).closest(".rowlink").attr('data-id');
        let role = $(this).closest(".rowlink").attr('data-role');
        window.location.href = ('user/' + role + '/update/' + parseInt(id));
    });

    if ($("input:checked").val() == 5) {
        $('.translate').removeClass("d-none");
        $('.select2bs4').select2({
            theme: 'bootstrap4',
            placeholder: "翻訳言語を選択してください"
        });
    }

    $(document).on('change', '.role_id', function () {
        changeRole();
    });

    function changeRole() {
        id = $('.role_id:checked').val();
        if (id == 5) {
            if ($('.translate').hasClass("d-none")) {
                $('.translate').removeClass("d-none");
                $('.select2bs4').select2({
                    theme: 'bootstrap4',
                    placeholder: "翻訳言語を選択してください"
                });
            }
        } else {
            if ($('.translate').hasClass("d-none") == false) {
                $('.translate').addClass("d-none");
            }
        }
    }

    $(".remove-channel").click(function () {
        var check = confirm("削除してもよろしいでしょうか？");
        if (check) {
            var channel_id = $(this).data('id');
            $(".sk-loading-full").removeClass("d-none");
            var channel = $(this).closest('tr');
            $.ajax({
                type: 'GET',
                url: 'channel/delete/' + channel_id,
                data: {
                    id: channel_id
                },
                success: function () {
                    $(".sk-loading-full").addClass("d-none");
                    channel.remove();
                    skAlert('success', "データを更新しました。");
                    if($('table tbody tr').length === 0)
                    {
                        $('table').addClass('d-none');
                    }
                }
            });
        }
    });
});
