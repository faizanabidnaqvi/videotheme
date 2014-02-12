<?php
// $Id: node.tpl.php,v 1.24 2010/12/01 00:18:15 webchick Exp $
//ffmpeg -i video1.avi -vcodec libx264 -threads 0 -r 25 -g 50 -b 500k -bt 500k -acodec libfaac -ar 44100 -ab 64k video1.mp4
//ffmpeg -i video1.avi -ac 1 -ar 22050 -ab 32k -f flv -b 700k -s 640x360 -y video1.flv
//ffmpeg -i video1.avi -vcodec libx264 -threads 0 -r 25 -g 50 -b 500k -bt 500k -s 640x360 -acodec libmp3lame -ar 44100 -ab 64k video1.mp4
//ffmpeg -i video1.avi -vcodec libx264 -threads 0 -b 500k -bt 500k -s 640x360 -acodec libmp3lame -ar 44100 -ab 64k video1.mp4
//ffmpeg -i video1.avi -vcodec libx264 -g 50 -b 800k -bt 800k -vpre E:\wrk\ffmpeg\presets\libx264-main.ffpreset -acodec libmp3lame -ac 2 -ar 44100 -ab 128k video1.mp4
?>
<?php 
if (function_exists('statistics_get')) { 
  $statistics = statistics_get($node->nid);
}
if (empty($statistics)) {  
  $statistics['totalcount'] = 0;
  $statistics['daycount'] = 0;
}
if ($teaser) { 
$rate = rate_get_results('node', $node->nid, 1);
?>
<div id="node-<?php print $node->nid; ?>" class="span2 <?php print $classes; ?>"<?php print $attributes; ?>>
  <div class="hover">
    <div class="hover-in">
      <?php print render($title_prefix); ?>
      <?php print render($title_suffix); ?>
      <a href="<?php print $node_url; ?>" class="play"><?php print t('Play'); ?></a>
      <div class="stat"><?php print t('!count views in !time',array('!count' => $statistics['totalcount'], '!time' => format_interval(time() - $node->created,1))); ?></div>
      <?php /*print render($content['rate_fivestar']);*/ ?>
      <?php if (isset($content['unwatched_link'])) print $content['unwatched_link']; ?>
    </div>
  </div>
  <?php if (isset($content['field_featured']['#items'][0]['value']) and $content['field_featured']['#items'][0]['value']) {?><a href="<?php print $node_url; ?>"><div class="pv-featured"><div class="pv-featured-in"><?php print t('Featured'); ?></div></div></a><?php } ?>
  <?php if (isset($content['field_recommended']['#items'][0]['value']) and $content['field_recommended']['#items'][0]['value']) {?><a href="<?php print $node_url; ?>"><div class="pv-recommended"><div class="pv-recommended-in"><?php print t('Recommended'); ?></div></div></a><?php } ?>
  <div class="img1"><?php print render($content['field_video']); ?></div>
  <h2><a href="<?php print $node_url; ?>"><?php print truncate_utf8($title, 70, FALSE, TRUE); ?></a></h2>
  
  <?php //print '<pre>'. check_plain(print_r($content['field_featured']['#items'][0], 1)) .'</pre>'; ?>
</div>
<?php } else { ?>
<?php //print '<pre>'. check_plain(print_r($content['field_video'], 1)) .'</pre>'; ?>
<?php 
  //drupal_add_js('misc/collapse.js'); 
  global $base_url, $user;
  if (isset($node->field_background_video[$node->language][0]['uri'])) provideo_set_background($node->field_background_video[$node->language][0]['uri']);
  if (!$user->uid) {
    $var['node'] = $node; 
    $us = provideo_helper_forbidden($var);
  } else {
    $us = '';
  }
  $destination = array('destination' => "node/$node->nid");

  if (module_exists('statistics')) $statistics = statistics_get($node->nid);
  if (empty($statistics['totalcount'])) $statistics['totalcount'] = 0;
?>
    
<?php provideo_set_video(render($content['field_video'])); ?>
<h1 class="title"><?php print $title; ?></h1>


<div class="tabcont" id="sharetab">
  <input type="text" value="<?php print url('node/'.$node->nid, array('absolute' => TRUE)); ?>" name="s" class="chain" />
  <div class="clear"></div>
  <div class="shareicons"><?php print render($content['sharethis']); ?></div>
  <div class="clr"></div>
</div>

<div class="tabcont" id="embedtab">
  <h4 class="embed-title">560x349</h4>
  <div class="embed-text"><?php print check_plain('<iframe width="560" height="349" src="'.$base_url.'/embed/'.$node->nid.'/560x349" frameborder="0" allowfullscreen></iframe>'); ?></div>
  <div class="clr">&nbsp;</div>
  <h4 class="embed-title">640x390</h4>
  <div class="embed-text"><?php print check_plain('<iframe width="640" height="390" src="'.$base_url.'/embed/'.$node->nid.'/640x390" frameborder="0" allowfullscreen></iframe>'); ?></div>
  <div class="clr">&nbsp;</div>
  <h4 class="embed-title">853x510</h4>
  <div class="embed-text"><?php print check_plain('<iframe width="853" height="510" src="'.$base_url.'/embed/'.$node->nid.'/853x510" frameborder="0" allowfullscreen></iframe>'); ?></div>
  <div class="clr">&nbsp;</div>
  <h4 class="embed-title">1280x750</h4>
  <div class="embed-text"><?php print check_plain('<iframe width="1280" height="750" src="'.$base_url.'/embed/'.$node->nid.'/1280x750" frameborder="0" allowfullscreen></iframe>'); ?></div>
  <div class="clr"></div>
</div>
    
<div class="tabcont" id="addtotab">
  <?php if ($us) { 
    print $us; 
  } else { 
    if (isset($user->data['provideo_subscribe'][$node->uid])) { 
      print ''.t('"!name" added to Favorites.', array('!name' => $title)).' | ';
      print '<a href="'.url('addto/'.$node->nid, array('query' => $destination)).'" class="un">'.t('Remove from Favorites').'</a>';
    } else {
      print '<a href="'.url('subscribe/'.$node->nid, array('query' => $destination)).'">'.t('Add to Favorites').'</a>';
    }
  } ?>
  <div class="clr"></div>
</div>

<div class="tabcont" id="flagtab">
  <?php if ($us) { 
    print $us; 
  } else { 
    $provideo_helper_flag_form = drupal_get_form('provideo_helper_flag_form');
    print variable_get('user_mail_register_video_flag_text', t("<h4>Report This Video as Inappropriate</h4>Please select the category that most closely reflects your concern about the video, so that we can review it and determine if it violates our Community Guidelines or isn't appropriate for all viewers. Abusing this feature is also a violation of the Community Guidelines, so don't do it.")).render($provideo_helper_flag_form);
  } ?>
  <div class="clr"></div>
</div>
 
<div class="clr"></div>
<div class="row-fluid">
	<div class="span1">
		<!-- Add gravatar here -->
			<?php $user = user_load($uid); print theme('user_picture', array('account' =>$user)); ?>
	</div>
		<div class="span11">
		<div class="videoby">
			<?php print $name; ?>
		</div>
		<div class="row-fluid">
			<div class="span12">
				<div class="left">
				<!-- Add like widget here -->
					<?php print render($content['rate_video_like']); ?>
				</div>
				<div class="right">
				<?php print t('!count', array('!count' => format_plural($statistics['totalcount'], '1 view', '@count views') )); ?>
				</div>
			</div>
		</div>
	</div>
</div>
  		
<div class="tabcont" id="subscribetab">
      <?php if ($us) { 
        print $us; 
      } else { 
        if (isset($user->data['provideo_subscribe'][$node->uid])) { 
          print ''.t('You are now subscribed to !name.', array('!name' => $name)).' | ';
          print '<a href="'.url('subscribe/'.$node->nid, array('query' => $destination)).'" class="un">'.t('Unsubscribe').'</a>';
        } else {
          print '<p><a href="'.url('subscribe/'.$node->nid, array('query' => $destination)).'">'.t('Subscribe').'</a></p>';
        }
      } ?>
    <div class="clr"></div>
  </div>
<div class="clr"></div>


<div class="videotext" id="descrtab-">
      <?php hide($content['comments']); hide($content['links']); hide($content['sharethis']); print render($content);?>
</div>

<div class="clr"></div>        
<div class="videotext">
  <?php //hide($content['comments']); hide($content['links']); print render($content);?>
  <div class="clr"></div>
</div> 
<?php print render($content['comments']); ?>
<div class="clr"></div>    
<?php print provideo_set_suggestions(); ?>
<?php } ?>
<?php //print '<pre>'. check_plain(print_r($content['field_featured'], 1)) .'</pre>'; ?>