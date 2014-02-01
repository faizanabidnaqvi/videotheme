// JavaScript Document
(function ($) { $(document).ready(function(){

	$("a.switch_thumb").toggle(function(){      
	  $("ul.display").fadeOut("fast", function() {
	  	$(this).fadeIn("fast").removeClass("thumb_view");
		$("a.switch_thumb").removeClass("swap");
		});
	  }, function () {
	  $("ul.display").fadeOut("fast", function() {
	  	$(this).fadeIn("fast").addClass("thumb_view");
		$("a.switch_thumb").addClass("swap"); 
	  });
	}); 

	$("a.switch_thumb1").toggle(function(){      
	  $("ul.display1").fadeOut("fast", function() {
	  	$(this).fadeIn("fast").removeClass("thumb_view");
		$("a.switch_thumb1").removeClass("swap");
		});
	  }, function () {
	  $("ul.display1").fadeOut("fast", function() {
	  	$(this).fadeIn("fast").addClass("thumb_view");
		$("a.switch_thumb1").addClass("swap"); 
	  });
	}); 

}); })(jQuery);