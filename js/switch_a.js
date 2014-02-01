// JavaScript Document
(function ($) { $(document).ready(function(){
  $("a.switch_thumb").addClass("swap"); 
  $("ul.display").fadeOut("fast", function() {
    $(this).fadeIn("fast").addClass("thumb_view"); 
  });
  $("a.switch_thumb1").addClass("swap"); 
  $("ul.display1").fadeOut("fast", function() {
    $(this).fadeIn("fast").addClass("thumb_view"); 
  });
}); })(jQuery);