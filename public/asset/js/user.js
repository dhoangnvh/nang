$(document).ready(function() {
   setTimeout(function(){
      $('.notifi').css("display","none");
   }, 3000);
   $('.role_id').change(function() {
      if ($(this).val() != 1 && $(this).val() != 2) {
         $('.number-channel').addClass('d-none');
      } else {
         $('.number-channel').removeClass('d-none');
      }
   })
   var roleChecked = $(".role_id:checked").val();
   if (roleChecked != 1 && roleChecked != 2) {
      $('.number-channel').addClass('d-none');
   } else {
      $('.number-channel').removeClass('d-none');
   }
   $(document).on("click", ".clickable-row td:not('.nolink')", function(){
      href = $(this).closest(".clickable-row").attr('data-href');
      window.location = href;
   })
})