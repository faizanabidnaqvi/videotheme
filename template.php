<?php

global $base_url;

provideo_set_background(provideo_get_background('page'));
if (arg(0) == 'blog') provideo_set_background(provideo_get_background('blog'));

	drupal_add_js('
    ddsmoothmenu.init({
      arrowimages: {down:[\'downarrowclass\', \''.$base_url.'/'.drupal_get_path('theme', 'provideo').'/images/down.gif\', 30], right:[\'rightarrowclass\', \''.$base_url.'/'.drupal_get_path('theme', 'provideo').'/images/right.gif\']},
	    mainmenuid: "smoothmenu1",
	    orientation: \'h\',
	    classname: \'ddsmoothmenu\',
	    //customtheme: ["#1c5a80", "#18374a"],
	    contentsource: "markup"
    });
    (function ($) {$(document).ready(function(){
    $(function() {
	    var zIndexNumber = 0;
      $(\'.flowplayer\').each(function() {
        $(this).css(\'zIndex\', zIndexNumber);
      });
	  });
	  });})(jQuery);
	', array('type' => 'inline', 'scope' => 'footer', 'weight' => 5));

/* provideo_breadcrumb($breadcrumb) */

function provideo_breadcrumb($breadcrumb) {
  //drupal_set_message('<pre>'. check_plain(print_r($breadcrumb, 1)) .'</pre>');
  if (!empty($breadcrumb['breadcrumb'])) {
	  $out = '';
    $n = count($breadcrumb['breadcrumb']);
    $i = 1;
	  foreach ($breadcrumb['breadcrumb'] as $data) {
		  if ($i == $n) $out .= '<li class="last">'.$data.'</li>';
      else $out .= '<li>'.$data.'</li>';
      $i++;
	  }
	  return '<h5>'.t('You are here').':</h5><ul>'.$out.'</ul>';
  }
}

function provideo_preprocess_jw_player(&$variables) {
  // If a file object has been passed populate the sources array with the
  // variables derived from it.
  if (isset($variables['file_object'])) {
    $variables['sources'] = array(
      array(
        'file_path' => file_create_url($variables['file_object']->uri),
        'file_mime' => $variables['file_object']->filemime,
      )
    );
  }

  // Load defaults as the starting point.
  $default_settings = jw_player_default_settings();

  // Load preset if set.
  $preset_settings = array();
  if (!empty($variables['preset'])) {
    $preset = jw_player_preset_load($variables['preset']);
    // Additional check to ensure that the preset has actually loaded. This
    // prevents problems where a preset has been deleted but a field is still
    // configured to use it.
    if (!empty($preset)) {
      $preset_settings = $preset['settings'];
    }
  }

  // Get any preset override options that were sent through the formatter or
  // theme call.
  $options = array();
  if (isset($variables['options'])) {
    $options = $variables['options'];
    unset($variables['options']);
  }

  // Merge all variables together. Preset settings take priority over defaults,
  // variables passed directly to the theme function take priority over both.
  $variables = array_merge($default_settings, $preset_settings, $options, $variables);


  // The html_id should have been previously set. But we need to make
  // sure we do have one.
  if (!isset($variables['html_id'])) {
    $id = $variables['file_object']->fid . $variables['preset'];
    $variables['html_id'] = drupal_html_id('jwplayer' . $id);
  }

  //drupal_add_js('var jw_html_id="' . $variables['html_id'] . '";', array('type' => 'inline', 'scope' => 'header', 'weight' => 5));
      
  // Check if there is one or multiple files. If one file then we set 'file', if
  // there are multiple files we set 'levels'. Note that levels is used for both
  // multiple video formats as well as for adaptive bitrates.
  if (count($variables['sources']) > 1) {
    $variables['config']['levels'] = array();
    foreach ($variables['sources'] as $key => $source) {
      $variables['config']['levels'][$key]['file'] = $source['file_path'];
      if (isset($source['bitrate'])) {
        $variables['config']['levels'][$key]['bitrate'] = $source['bitrate'];
      }
      if (isset($source['width'])) {
        $variables['config']['levels'][$key]['width'] = $source['width'];
      }
    }
  }
  else {
   $variables['config']['file'] = $variables['sources'][0]['file_path'];
  }

  // Resolve skin url
  $skin = !empty($variables['skin']) ? jw_player_skins($variables['skin']) : '';
  $variables['skin'] = !empty($skin) ? file_create_url($skin->uri) : '';

  // Copy player variables into their own array to be set as JavaScript
  // configuration.
  // @todo Bad smell here. Refactoring needed.
  $config_variables = array(
    'width',
    'height',
    'image',
    'controlbar',
    'playlist.position',
    'playlist.size',
    'skin',
    'autoplay',
  );
  foreach ($config_variables as $key) {
    if (!empty($variables[$key])) {
      $variables['config'][$key] = $variables[$key];
    }
  }

  // Initalize the player modes. The order of this array determines which
  // playback mode will be tried first before the browser falls back to the next
  // option. The default is html5 first, but this can be overridden by a preset
  // (see the code directly below).
  
  /*
  $variables['config']['modes'] = array(
    array(
      'type' => 'html5'
    ),
    array(
      'type' => 'flash',
      'src' => file_create_url(libraries_get_path('jwplayer') . '/player.swf'),
    ),
  );

  // If the preset has the primary mode set, modify the modes array so that it
  // comes first.
  if (isset($variables['mode'])) {
    foreach ($variables['config']['modes'] as $key => $value) {
      if ($value['type'] == $variables['mode']) {
        unset($variables['config']['modes'][$key]);
        array_unshift($variables['config']['modes'], $value);
      }
    }
  }
  */
  // Copy over all enabled plugins into the 'config' section as this is the key
  // that is sent over to the player.
  if (!empty($variables['plugins'])) {
    foreach ($variables['plugins'] as $plugin => $info) {
      if (!$info['enable']) {
        continue;
      }
      $variables['config']['plugins'][$plugin] = $info;
    }
  }
}



/*******************
function provideo_flowplayer($variables) {
  $config = $variables['config'];
  $id = $variables['id'];
  $attributes = $variables['attributes'];

  $r = rand();
  // Prepare the ID.
  $id = drupal_clean_css_identifier($id).$r;

  // Prepare the attributes, passing in the flowplayer class.
  if (isset($attributes['class'])) {
    $attributes['class'] .= ' flowplayer';
  } else {
    $attributes['class'] = 'flowplayer';
  }
  $attributes['style'] = 'width:675px;height:438px;';
  $attributes = drupal_attributes($attributes);
  $config['wmode'] = 'opaque';
  // Add the JavaScript to handle the element.
  flowplayer_add('#' . $id, $config);

  // Return the markup.
  return "<div id='$id' $attributes></div>";
}
********************/
/*
function provideo_video($variables) {
  
  $themed_output = '';
  if (empty($variables['item']['fid']))
    return '';
  $field_settings = $variables['field']['settings'];
  $instance_settings = $variables['instance']['settings'];
  // Only needs to be ran if they are converting videos
  if (isset($field_settings['autoconversion']) && $field_settings['autoconversion']) {
    module_load_include('inc', 'video', '/includes/conversion');
    $conversion = new video_conversion;
    if ($video = $conversion->load_job($variables['item']['fid'])) {
      if ($video->video_status == VIDEO_RENDERING_ACTIVE || $video->video_status == VIDEO_RENDERING_PENDING) {
        return theme('video_inprogress');
      } else if ($video->video_status == VIDEO_RENDERING_FAILED) {
        return theme('video_conversion_failed');
      }
    }
  }
  // Setup our video object
  //drupal_set_message('<pre>'. check_plain(print_r($variables, 1)) .'</pre>');
  module_load_include('inc', 'video', '/includes/video_helper');
  $video_helper = new video_helper;
  $video = $video_helper->video_object($variables);
  // Lets spit out our theme based on the extension
  $defaults = video_video_extensions();
  $theme_function = variable_get('video_extension_' . $video->player, $defaults[$video->player]);

  // Lets do some special handling for our flv files, HTML5 to accomdate multiple players.
  $video->variables = $variables['entity'];
  switch ($theme_function) {
    case 'video_play_flv':
      return theme('video_flv', array('video' => $video, 'themed_output' => $themed_output));
      break;
    case 'video_play_html5':
      
      return theme('video_html5', array('video' => $video, 'themed_output' => $themed_output));
      break;
    default:
      return theme($theme_function, array('video' => $video, 'themed_output' => $themed_output));
      break;
  }
}
*/
/*********************
function provideo_video_formatter_player(array $variables) {
  $item = $variables['item'];
  if (empty($item['fid'])) {
    return '';
  }

  // Only needs to be ran if they are converting videos
  if ($item['autoconversion'] && !$item['conversioncompleted']) {
    switch ($item['conversionstatus']) {
      case VIDEO_RENDERING_ACTIVE:
      case VIDEO_RENDERING_PENDING:
        return theme('video_inprogress');
      case VIDEO_RENDERING_FAILED:
        return theme('video_conversion_failed');
    }
  }

  // override player dimensions
  if (!empty($variables['player_dimensions'])) {
    $player_dimensions = explode('x', $variables['player_dimensions'], 2);
    $player_width = intval(trim($player_dimensions[0]));
    $player_height = intval(trim($player_dimensions[1]));
  }
  else {
    $player_width = 640;
    $player_height = 360;
  }

  // Poster image style
  if (!empty($item['thumbnailfile'])) {
    if (empty($variables['poster_image_style'])) {
      $item['thumbnailfile']->url = file_create_url($item['thumbnailfile']->uri);
    }
    else {
      $item['thumbnailfile']->url = image_style_url($variables['poster_image_style'], $item['thumbnailfile']->uri);
    }
  }

  $extension = video_utility::getExtension($item['playablefiles'][0]->filename);
  $defaults = video_utility::getVideoExtensions();
  $theme_function = variable_get('video_extension_' . $extension, $defaults[$extension]);

  if ($theme_function == 'video_play_flv') {
    $theme_function = 'video_flv';
  }
  $node = $variables['entity'];
  if ($theme_function == 'video_play_html5') {
    
    if (arg(0) == 'embed' and arg(2)) {
      $d = explode('x', arg(2));
      if (isset($d[0]) and is_numeric($d[0])) { $node->emplayer_width = $d[0]; }
      if (isset($d[1]) and is_numeric($d[1])) { $node->emplayer_height = $d[1]; }
    }
    $theme_function = 'video_html5';
  }

  return theme($theme_function, array('item' => $item, 'width' => $player_width, 'height' => $player_height, 'node' => $node));
}

function provideo_video_html5($variables) {
  $themed_output = NULL;
  $item = $variables['item'];
//drupal_set_message('<pre>'. check_plain(print_r($variables, 1)) .'</pre>');
  $files = $item['playablefiles'];
  $extension = strtolower(video_utility::getExtension($files[0]->filename));

  $html5_player = variable_get('video_extension_' . $extension . '_html5_player', 'video');
  switch ($html5_player) {
    case 'video':
      $variables['files'] = $files;
      return theme('video_play_html5', $variables);

    case 'videojs':
      $items = video_utility::objectToArray($files);
      if (!empty($item['thumbnailfile'])) {
        $thumbnail = video_utility::objectToArray($item['thumbnailfile']);
        $thumbnail['uri'] = $thumbnail['url'];
        $items[] = $thumbnail;
      }

      $attributes = array(
        'width' => $variables['width'],
        'height' => $variables['height'],
      );
      return theme('videojs', array('items' => $items, 'player_id' => 'video-' . $item['fid'], 'attributes' => $attributes, 'node' => $variables['node']));
  }
}
************************/
/*
function provideoooo_video_formatter_player($variables) {
  //drupal_set_message('<pre>'. check_plain(print_r($variables, 1)) .'</pre>');
  $themed_output = '';
  if (empty($variables['item']['fid']))
    return '';
  $field_settings = $variables['field']['settings'];
  $instance_settings = $variables['instance']['settings'];
  // Only needs to be ran if they are converting videos
  if (isset($field_settings['autoconversion']) && $field_settings['autoconversion']) {
    $factory = new TranscoderAbstractionAbstractFactory();
    $transcoder = $factory->getProduct();
    $transcoder->setInput($variables['item']);
    if ($video = $transcoder->loadJob()) {
      if ($video->video_status == VIDEO_RENDERING_ACTIVE || $video->video_status == VIDEO_RENDERING_PENDING) {
        return theme('video_inprogress');
      }
      else if ($video->video_status == VIDEO_RENDERING_FAILED) {
        return theme('video_conversion_failed');
      }
    }
  }
  // Setup our video object
  module_load_include('inc', 'video', '/includes/VideoHelper');
  $video_helper = new VideoHelper;
  $video = $video_helper->video_object($variables);
  // override player dimentions
  if (isset($variables['player_dimensions']) && !empty($variables['player_dimensions'])) {
    $player_dimensions = explode('x', $variables['player_dimensions']);
    $video->player_width = trim($player_dimensions[0]);
    $video->player_height = trim($player_dimensions[1]);
  }
  // Lets spit out our theme based on the extension
  $defaults = video_utility::getVideoExtensions();
  $theme_function = variable_get('video_extension_' . $video->player, $defaults[$video->player]);
   
  // Lets do some special handling for our flv files, HTML5 to accomdate multiple players.
  switch ($theme_function) {
    case 'video_play_flv':
      return theme('video_flv', array('video' => $video, 'themed_output' => $themed_output));
      break;
    case 'video_play_html5':
      $video->node = $variables['entity'];
      if (arg(0) == 'embed' and arg(2)) {
        $d = explode('x', arg(2));
        if (isset($d[0]) and is_numeric($d[0])) { $video->node->emplayer_width = $d[0]; }
        if (isset($d[1]) and is_numeric($d[1])) { $video->node->emplayer_height = $d[1]; }
      }
      return theme('video_html5', array('video' => $video, 'themed_output' => $themed_output));
      break;
    default:
      return theme($theme_function, array('video' => $video, 'themed_output' => $themed_output));
      break;
  }
}


function provideoooo_video_html5($variables) {
  //drupal_set_message('<pre>'. check_plain(print_r($variables, 1)) .'</pre>');
  $themed_output = NULL;
  $video = $variables['video'];

  $video->html5_player = variable_get('video_extension_' . $video->player . '_html5_player', '');
  switch ($video->html5_player) {
    case 'video':

      return theme('video_play_html5', array('video' => $video, 'themed_output' => $themed_output));
      break;
    case 'videojs':
      $items = _video_object_to_array($video->files);
      $items +=array('thumbnail' => (array) $video->thumbnail);
      $attributes = array();
      $attributes['width'] = $video->width;
      $attributes['height'] = $video->height;
      return theme('videojs', array('items' => $items, 'player_id' => 'video-' . $video->fid, 'attributes' => $attributes));
      break;
  }
}
*/
function provideo_set_bic($j) {
  $blocks = block_get_blocks_by_region('banner_in_category_'.$j);
  $block = render($blocks);
  return $block ? '<div class="span8">'.$block.'</div>' : '';
}

function provideo_set_suggestions() {
  $blocks = block_get_blocks_by_region('suggestions');
  $block = render($blocks);
  return $block;
}



function provideo_set_tabs($bid, $title, $content, $isout = false) {
  static $tabs = array();
  if ($bid) {
    $tabs[$bid] = new stdClass;
    $tabs[$bid]->bid = $bid;
    $tabs[$bid]->title = $title;
    $tabs[$bid]->content = $content;
  }
  if ($isout and isset($tabs) and is_array($tabs)) {
	$out_t = '';
	$out_c = '';
	$i = 0;
	foreach ($tabs as $data) {
		if (!$i) $ac = ' class="current"'; else  $ac = '';
		$out_t .= '<li'.$ac.'><a rel="tab_sidebar_'.$data->bid.'">'.'<h4>'.$data->title.'</h4></a></li>';
		//$out_c .= '<div style="display: none;" id="tab_sidebar_'.$data->bid.'" class="tab_sidebar_list">'.$data->content.'</div>';
		$out_c .= '<div style="display: none;" id="tab_sidebar_'.$data->bid.'" class="tab_sidebar_list">'.$data->content.'</div>';
		$i++;
	}
	return '<div class="tabs"><div class="tab_menu_container"><ul id="tab_menu">'. $out_t .'</ul><div class="clr"></div></div><div class="tab_container"><div class="tab_container_in">'.$out_c.'</div></div></div><div class="clr"></div>';
  }
}

function provideo_set_home_video_right($bid, $title, $content, $block_html_id, $classes, $attributes, $isout = FALSE) {
  global $base_url;
  static $tabs = array();
  if ($bid) {
    $tabs[$bid]->bid = $bid;
    $tabs[$bid]->title = $title;
    $tabs[$bid]->content = $content;
    $tabs[$bid]->block_html_id = $block_html_id;
    $tabs[$bid]->classes = $classes;
    $tabs[$bid]->attributes = $attributes;
  }
  if ($isout and isset($tabs) and is_array($tabs)) {
	$out_t = '';
	$out_c = '';
  $out_v = provideo_set_home_video_left(FALSE, TRUE);
	$i = 0;
	foreach ($tabs as $datar) {
		if (!$i) $ac = ' class="selected"'; else  $ac = '';
		$out_t .= '<li><a href="#idTab'.$datar->bid.'"'.$ac.'><span>'.$datar->title.'</span></a></li>';
		$out_c .= '<div id="'.$datar->block_html_id.'" class="'.$datar->classes.'"'.$datar->attributes.'>'.'<div id="idTab'.$datar->bid.'" class="tabssection"><div class="css-scrollbar simple">'.$datar->content.'</div></div></div>';
		$i++;
	}
	return '<div id="banner">'.$out_v.'<div id="paginate-slider2"><div class="usual"><ul class="idTabs">'. $out_t .'</ul>'.$out_c.'</div></div><div class="clear"></div></div><script type="text/javascript" src="'.$base_url.'/'.drupal_get_path('theme', 'provideo').'/js/banner.js"></script>';
  }
}

function provideo_set_home_video_left($content, $isout = false) {
  static $resl = '';
  if ($content) {
    $resl .= $content;
  }
  if ($isout and $resl) {
	  return '<div id="slider2" class="leftsecbanner">'.$resl.'</div>';
  }
}

function provideo_top($type = 'search') {

 $header = array(
    array('data' => t('Count'), 'field' => 'count', 'sort' => 'desc'),
    array('data' => t('Message'), 'field' => 'message')
  );
  $count_query = db_select('watchdog');
  $count_query->addExpression('COUNT(DISTINCT(message))');
  $count_query->condition('type', $type);

  $query = db_select('watchdog', 'w')->extend('PagerDefault')->extend('TableSort');
  $query->addExpression('COUNT(wid)', 'count');
  $query = $query
    ->fields('w', array('message', 'variables'))
    ->condition('w.type', $type)
    ->groupBy('message')
    ->groupBy('variables')
    ->limit(30)
    ->orderByHeader($header);
  $query->setCountQuery($count_query);
  $result = $query->execute();

  $t = '';
  foreach ($result as $dblog) {
    $a = unserialize($dblog->variables);
    $t .= '<li>'.l(strip_tags($a['%keys'])/*.' ('.$dblog->count.')'*/, 'search/node/'.$a['%keys'], array('html' => TRUE)).'</li>';
  }

  return '<div class="topsearches"><h5>'.t('Top Searches').'</h5><ul>'.$t.'</ul><a href="'.url('most_viewed').'" class="buttonone"><span>'.t('Most Viewed Videos').'</span></a><a href="'.url('videos').'" class="buttonone"><span>'.t('Recent Videos').'</span></a></div>';
}

function provideo_set_video($content, $isout = false) {
  static $res = '';
  if ($content) {
    $res .= $content;
  }
  if ($isout and $res) {
	  return $res;
  }
}

function provideo_set_background($content, $isout = false) {
  static $res = '';
  if ($content) {
    $res = $content;
  }
  if ($isout and $res) {
    $file = file_create_url($res);
	  return ' style="background-image:url('.$file.');"';
  }
}

function provideo_get_background($bundle, $field_name = 'field_background', $entity_type = 'taxonomy_term') {
  $datadef = unserialize(
    db_select('field_config', 'f')
    ->fields('f', array('data'))
    ->condition('field_name', $field_name.'_'.$bundle)
    ->range(0, 1)
    ->execute()
    ->fetchField()
  );
  if (isset($datadef['settings']['default_image'])) {
    $file = file_load($datadef['settings']['default_image']);
    if (isset($file->uri)) $out = $file->uri; else $out = FALSE;
  } else {
    $out = FALSE;
  }
  return $out;
}

function provideo_get_count_nodes($plural = TRUE) {
  $count = 0;
  if ($plural) {
    $id = ( is_numeric(arg(2)) ? arg(2) : (is_numeric(arg(1)) ? arg(1) : '' ));
    if ((arg(0) == 'videos' or arg(0) == 'taxonomy') and  is_numeric($id)) {
      $tids = provideo_taxonomy_get_children($id);
      //$query = db_select('node');
    
      $query = db_select('taxonomy_index', 't');
      $query->addTag('node_access');
      $query->condition('tid', $tids, 'in');
      $query->addExpression('COUNT(DISTINCT(nid))', 'count');
      //$query->range(0, $limit);
      //$query->addField('t', 'nid');
      //$query->addField('t', 'tid');
      $count = $query->execute()->fetchField();
    
      return '<span class="pv-ncount">'.format_plural($count, '1 Video', '@count Videos').'</span>';
    } elseif (arg(0) == 'videos') {
      $query = db_select('node');
      $query->addExpression('COUNT(nid)', 'count');
      $query->condition('type', 'video');
      $query->condition('status', 1);
      $count1 = $query->execute()->fetchField();
      $query = db_select('node');
      $query->addExpression('COUNT(nid)', 'count');
      $query->condition('type', 'embedded_video');
      $query->condition('status', 1);
      $count2 = $query->execute()->fetchField();
      $count = $count1 + $count2;
      return '<span class="pv-ncount">'.format_plural($count, '1 Video', '@count Videos').'</span>';
    }
  } else {
    $query = db_select('node');
    $query->addExpression('COUNT(nid)', 'count');
    $query->condition('type', 'video');
    $query->condition('status', 1);
    $count1 = $query->execute()->fetchField();
    $query = db_select('node');
    $query->addExpression('COUNT(nid)', 'count');
    $query->condition('type', 'embedded_video');
    $query->condition('status', 1);
    $count2 = $query->execute()->fetchField();
    $count = $count1 + $count2;
    return $count;
  }
  return '';
}

/* provideo_user_menu_top($logged_in) */
function provideo_user_menu_top($logged_in, $front_page) {
  global $user;
  $output = '';
  //<li><a href="#">Mature Warning: On</a></li>
  if (!$logged_in) { 
    $output .= '<li>'.l('Log in','user').'</li>';
    $output .= '<li>'.l('Register','user/register').'</li>';
  } else {
    $output .= '<li>'.l('Log out','user/logout').'</li>';
    $output .= '<li>'.l('Account','user/'.$user->uid).'</li>';
  }
  return '<ul><li class="first"><a href="'.check_url($front_page).'" name="toppage">'.t('Home').'</a></li>'. $output .'</ul>';
}

/* Node */
/*
function provideo_get_node($type = 'type') {
	static $node = false;
	if (!$node and arg(0) == 'node' and is_numeric(arg(1))){
		$node = db_fetch_array(db_query('SELECT * FROM {node} where nid = %d',arg(1)));
	}	
  return $node[$type];
}

function provideo_get_node_style() {
	static $node = false;
	if (!isset($node) and arg(0) == 'node' and is_numeric(arg(1)) and !arg(2)){
		$node = node_load(arg(1));
		return $node->field_style[0]['value'];
	} else {
		return 'n';
	} 
}
*/

function provideo_truncate_utf8($string, $len, $wordsafe = FALSE, $dots = FALSE, &$ll = 0) {

  if (drupal_strlen($string) <= $len) {
    return $string;
  }

  if ($dots) {
    $len -= 4;
  }

  if ($wordsafe) {
    $string = drupal_substr($string, 0, $len + 1); // leave one more character
    if ($last_space = strrpos($string, ' ')) { // space exists AND is not on position 0
      $string = substr($string, 0, $last_space);
      $ll = $last_space;
    }
    else {
      $string = drupal_substr($string, 0, $len);
	  $ll = $len;
    }
  }
  else {
    $string = drupal_substr($string, 0, $len);
	$ll = $len;
  }

  if ($dots) {
    $string .= ' ...';
  }

  return $string;
}
