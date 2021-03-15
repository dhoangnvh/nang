$(document).ready(function() {
    $('.select-assign').change(function() {
        var oldTrans = $(this).data('translator-id');
        var oldPrice = $(this).data('translator-price');
        if ($(this).val() == oldTrans) {
            var totalPrice = oldPrice;
        } else {
            var video = $(this).closest(".video-item");
            var duration = video.find('.duration').data("duration");
            var priceEveryMinute = $(this).find("option:selected").data("price-minute");
            var totalPrice = parseInt(duration) * parseInt(priceEveryMinute);
        }
        
        $(this).closest(".lang-item").find('.show-total-money').text(totalPrice.toLocaleString());
    });
})