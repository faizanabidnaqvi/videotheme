
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}


var $j = jQuery.noConflict();

$j(document).ready(function(){

  $j(".embedded-video .player").fitVids();
  
  var rat_html5 = $j(".field-type-video video").width()/$j(".field-type-video video").height();
  if (rat_html5 > 0) {
    $j(".field-type-video video").width('100%');
    $j(".field-type-video video").height(Math.ceil($j(".field-type-video video").width()/rat_html5));
  }
  
  var rat_flv = $j(".flowplayer").width()/$j(".flowplayer").height();
  if (rat_flv > 0) {
    $j(".flowplayer").width('100%');
    $j(".flowplayer").height(Math.ceil($j(".flowplayer").width()/rat_flv));
  }
  
  var c_this_html_id = $j(".jwplayer-video").find('div').attr("id");
  if (typeof c_this_html_id !== "undefined") {
    var rat_jw = 1.777;
    c_this_html_id = str_replace('_wrapper', '', c_this_html_id);
    jwplayer(c_this_html_id).onReady(function () { 
      rat_jw = jwplayer(c_this_html_id).getWidth()/jwplayer(c_this_html_id).getHeight();
      jwplayer(c_this_html_id).resize('100%' ,Math.ceil($j(".pv-video").width()/rat_jw)); 
    });
  }
  
  $j(window).resize(function() {
    if (rat_flv > 0) {
      $j(".flowplayer").height(Math.ceil($j(".flowplayer").width()/rat_flv));
    }
    if (rat_html5 > 0) {
      $j(".field-type-video video").height(Math.ceil($j(".field-type-video video").width()/rat_html5));
    }
    if (typeof c_this_html_id !== "undefined") {
      jwplayer(c_this_html_id).resize('100%' ,Math.ceil($j(".pv-video").width()/rat_jw));
    }
	}).trigger('resize');
	
	
	 
  setTimeout(function(){
		if($j(".pv-video").height() > $j(".pv-video-blk").height()){
		  if ($j(".pv-video").hasClass("pv-node")) {
			  //$j(".pv-video-blk .tab_container").height($j(".pv-video").height() - 37);
			} else {
			  //$j(".pv-video-blk .tab_container").height($j(".pv-video").height() - 47);
			}
		}
  },2000);
  //alert($j("#tab_menu li a.current").attr('rel'));
  $j("#tab_menu a").click(function(){
    if (!$j(this).parent("li").hasClass('current')) {
      $j("#tab_menu li").removeClass("current");
      $j(this).parent("li").addClass("current");
      var c_this = $j(this).attr("rel");
      if (true) {
        $j(".tab_sidebar_list").slideUp("slow");
        setTimeout(function(){
          $j("#" + c_this).slideDown("slow");
        },600);
      } else {
        $j(".tab_sidebar_list").fadeOut("slow");
        setTimeout(function(){
          $j("#" + c_this).fadeIn("slow");
        },600);
      }
    }
 	  return false;
	});
	if (true) {
		$j("#" + $j("#tab_menu li.current a").attr("rel")).slideDown("slow");
	} else {
    $j("#" + $j("#tab_menu li.current a").attr("rel")).fadeIn("slow");
  }


	$j(".pvheader ul.menu li").mouseover(function() {
    $j("ul.menu:first", this).slideDown("fast");
		return false;
	});
	$j(".pvheader ul.menu li").mouseleave(function() {
		$j("ul.menu", this).slideUp("fast");
		if (!$j(".pvheader ul.menu li").is(":hover")) { 
		  $j(".pvheader ul.menu ul.menu").slideUp("fast");
		}
		return false;
	});


  $j(".node-embedded-video.node-teaser").mouseover(function() {
    $j(".hover", this).slideDown("fast");
		return false;
	});
	$j(".node-embedded-video.node-teaser").mouseleave(function() {
		$j(".hover", this).slideUp("fast");
		return false;
	});
  $j(".node-video.node-teaser").mouseover(function() {
    $j(".hover", this).slideDown("fast");
		return false;
	});
	$j(".node-video.node-teaser").mouseleave(function() {
		$j(".hover", this).slideUp("fast");
		return false;
	});

  $j('#mselect').change(function(){					
	  window.location = $j(this).val();
  });


  $j("<option />", {
	  "selected": "selected",
	  "value"   : "",
	  "text"    : 'Select Page'
  }).appendTo("#mselect");
  $j('.region-sidebar-main-menu ul.menu').find('li').each(function(){										
	  cur_link = $j(this).children("a");
    iii = 0;
    $j(this).parents('ul.menu').each(function(){iii++;});
    var str=new Array(iii).join('--');
	  $j('#mselect').append('<option value='+cur_link.attr("href") +' >'+str+cur_link.text()+'</option>');
  });
  $j('.pv-user').find('a').each(function(){										
	  cur_link = $j(this);
	  $j('#mselect').append('<option value='+cur_link.attr("href") +' >'+cur_link.text()+'</option>');
  });
  $j('.pv_addbtn').each(function(){										
	  cur_link = $j(this);
	  $j('#mselect').append('<option value='+cur_link.attr("href") +' >'+cur_link.text()+'</option>');
  });

	
//$j(".pv-video-blk .tab_container").height($j(".pv-video").height());
	//$(window).resize(function() {
     // if (typeof window['jwplayer'] == 'function') jwplayer().resize($(".pv-video").width(),Math.ceil($(".pv-video").width()/1.54109589041096));
	//}).trigger('resize');

function str_replace ( search, replace, subject ) {	// Replace all occurrences of the search string with the replacement string
	// 
	// +   original by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
	// +   improved by: Gabriel Paderni

	if(!(replace instanceof Array)){
		replace=new Array(replace);
		if(search instanceof Array){//If search	is an array and replace	is a string, then this replacement string is used for every value of search
			while(search.length>replace.length){
				replace[replace.length]=replace[0];
			}
		}
	}

	if(!(search instanceof Array))search=new Array(search);
	while(search.length>replace.length){//If replace	has fewer values than search , then an empty string is used for the rest of replacement values
		replace[replace.length]='';
	}

	if(subject instanceof Array){//If subject is an array, then the search and replace is performed with every entry of subject , and the return value is an array as well.
		for(k in subject){
			subject[k]=str_replace(search,replace,subject[k]);
		}
		return subject;
	}

	for(var k=0; k<search.length; k++){
		var i = subject.indexOf(search[k]);
		while(i>-1){
			subject = subject.replace(search[k], replace[k]);
			i = subject.indexOf(search[k],i);
		}
	}

	return subject;

}

	
});
