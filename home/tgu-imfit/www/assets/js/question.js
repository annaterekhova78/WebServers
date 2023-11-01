$(document).ready(function(){
   $('.accordion__item__trigger').click(function(){
     $(this).next('.accordion__item__content').slideToggle(300);
   });
});
