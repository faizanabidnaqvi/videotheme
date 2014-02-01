(function ($) {
	$(document).ready(function(){
		var share_state = false, embed_state = false, addto_state = false, subscribe_state = false, flag_state = false, descr_state = true;;
		$(".descr-btn").click(function(){
			if (descr_state) {
				$("#descrtab").slideUp("slow");
				descr_state = false;
			} else {
				$("#descrtab").slideDown("slow");
				$("#sharetab").slideUp("slow");
				$('#embedtab').slideUp('slow');
				$('#addtotab').slideUp('slow');
				$("#subscribetab").slideUp("slow");
				$("#flagtab").slideUp("slow");
				descr_state = true;
				share_state = false;
				embed_state = false;
				addto_state = false;
				subscribe_state = false;
				flag_state = false;
			}
			return false;
		});
		$(".share-btn").click(function(){
			if (share_state) {
				$("#sharetab").slideUp("slow");
				share_state = false;
			} else {
				$("#sharetab").slideDown("slow");
				$('#embedtab').slideUp('slow');
				$('#addtotab').slideUp('slow');
				$("#subscribetab").slideUp("slow");
				$("#flagtab").slideUp("slow");
				$("#descrtab").slideUp("slow");
				share_state = true;
				embed_state = false;
				addto_state = false;
				subscribe_state = false;
				flag_state = false;
				descr_state = false;
			}
			return false;
		});
		$(".embed-btn").click(function(){
			if (embed_state) {
				$("#embedtab").slideUp("slow");
				embed_state = false;
			} else {
				$("#embedtab").slideDown("slow");
				$('#sharetab').slideUp('slow');
				$('#addtotab').slideUp('slow');
				$("#subscribetab").slideUp("slow");
				$("#flagtab").slideUp("slow");
				$("#descrtab").slideUp("slow");
				embed_state = true;
				share_state = false;
				addto_state = false;
				subscribe_state = false;
				flag_state = false;
				descr_state = false;
			}
			return false;
		});
		$(".addto-btn").click(function(){
			if (addto_state) {
				$("#addtotab").slideUp("slow");
				addto_state = false;
			} else {
				$("#addtotab").slideDown("slow");
				$('#embedtab').slideUp('slow');
				$('#sharetab').slideUp('slow');
				$("#subscribetab").slideUp("slow");
				$("#flagtab").slideUp("slow");
				$("#descrtab").slideUp("slow");
				addto_state = true;
				embed_state = false;
				share_state = false;
				subscribe_state = false;
				flag_state = false;
				descr_state = false;
			}
			return false;
		});
		$(".subscribe-btn").click(function(){
			if (subscribe_state) {
				$("#subscribetab").slideUp("slow");
				subscribe_state = false;
			} else {
				$("#subscribetab").slideDown("slow");
				$("#addtotab").slideUp("slow");
				$('#embedtab').slideUp('slow');
				$('#sharetab').slideUp('slow');
				$("#flagtab").slideUp("slow");
				$("#descrtab").slideUp("slow");
				subscribe_state = true;
				addto_state = false;
				embed_state = false;
				share_state = false;
				flag_state = false;
				descr_state = false;
			}
			return false;
		});
		$(".flag-btn").click(function(){
			if (flag_state) {
				$("#flagtab").slideUp("slow");
				flag_state = false;
			} else {
				$("#flagtab").slideDown("slow");
				$("#addtotab").slideUp("slow");
				$('#embedtab').slideUp('slow');
				$('#sharetab').slideUp('slow');
				$("#subscribetab").slideUp("slow");
				$("#descrtab").slideUp("slow");
				flag_state = true;
				addto_state = false;
				embed_state = false;
				share_state = false;
				subscribe_state = false;
				descr_state = false;
			}
			return false;
		});
		$(".tabcont").slideUp("fast");
	});
})(jQuery);