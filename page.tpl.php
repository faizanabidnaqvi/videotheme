<?php print render($page['header']); 
global $base_url, $user;
$content = render($page['content']);
?>

<div class="container-fluid pvheader">
  <div class="container-out">
    <div class="left">
      <div class="logo"><a href="<?php print check_url($front_page); ?>" title="<?php print $site_name; ?>"><img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" /></a></div>
      <select id="mselect"></select>
      <?php print render($page['sidebar_main_menu']); ?>    
    </div>
    <div class="right">
      <div class="search">
        <form action="<?php print url("search/node") ?>" id="SearchForm" method="post">
        	<input type="text" value="<?php print t('Enter keyword to search'); ?>" id="searchBox" name="keys" onblur="if(this.value == '') { this.value = '<?php print t('Enter keyword to search'); ?>'; }" onfocus="if(this.value == '<?php print t('Enter keyword to search'); ?>') { this.value = ''; }" class="bar" />
          <input type="submit" name="op" id="SearchSubmit" class="go" value="<?php print t("Search") ?>" />
          <input type="hidden" name="form_token" id="edit-search-block-form-form-token" value="<?php print drupal_get_token("search_form") ?>"  />
					<input type="hidden" name="form_id" id="edit-search-block-form" value="search_form"  />
        </form>
      </div>
      <?php
        $out = '';
        if ($user->uid) {
          $out .= '<a href="'.url('user/'.$user->uid).'">'.t('Account').'</a> | <a href="'.url('user/logout').'">'.t('Log out').'</a>';
        } else {
          $out .= '<a href="'.url('user').'">'.t('Log in').'</a> | <a href="'.url('user/register').'">'.t('Sign up').'</a>';
        }
        print '<div class="pv-user">'.$out.'</div>';
      ?>
      <?php /*if (user_access('create embedded_video content')) { ?><a href="<?php print url('node/add/embedded-video') ?>" class="b-upload"><?php print t('Embedded') ?></a><?php }*/ ?>
      <?php if (user_access('create video content')) { ?><a href="<?php print url('node/add/video') ?>" class="b-upload pv_addbtn"><?php print t('Add Video') ?></a><?php } ?>
    </div>
    <div class="clr"></div>  
  </div>
</div>

<div class="container-out pvcontent">
	<div class="left">
	<?php print render($page['sidebar_left']); ?>
	</div>
	<div class="mob-right">
  <div class="container ">
    <div class="row">
      <div class="span12">
        <?php /*<div class="breadcrumb"><?php print $breadcrumb; ?></div> */ ?>
        <?php if (isset($messages)) { print $messages; } ?>
        <?php if($tabs) { print render($tabs); } ?>
      </div>
    </div>
    <?php if(drupal_is_front_page()) { ?>
      <div class="row">
        <div class="span12">
          <div class="left pv-video" id="pvvideo">
            <?php print render($page['sidebar_home_player']); ?>
          </div>
          <div class="right pv-video-blk">
            <?php render($page['sidebar_tabs']); ?>
            <?php print provideo_set_tabs(FALSE, FALSE, FALSE, TRUE); ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="span12 home">
          <?php print render($page['sidebar_home_banner']); ?>
          <h1 class="title"><?php print render($page['exposed_form']); ?><?php print $title; ?></h1>
          <?php print $content; ?>
        </div>
        
      </div>
    <?php } elseif($set_video = provideo_set_video(FALSE, TRUE) ) { ?>
      <div class="row">
        <div class="span12">
          <div class="left pv-video pv-node" id="pvvideo">
            <h1 class="title"><b><?php print t('Now Playing'); ?></b> <?php print $title; ?></h1>
            <?php print $set_video; ?>
          </div>
          <div class="right pv-video-blk">
            <?php render($page['sidebar_tabs']); ?>
            <?php print provideo_set_tabs(FALSE, FALSE, FALSE, TRUE); ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="span12">
          <?php print $content; ?>
        </div>
        
      </div>
    <?php } else { ?>
      <div class="row">
        <div class="span12">
          <?php print render($page['exposed_form']); ?> <h1 class="title"><?php print $title; ?> <?php print provideo_get_count_nodes(); ?></h1>
          <?php if(arg(0) == 'blog' ) { print '<div class="row">'; }?>
          <?php print $content; ?>
          <?php if(arg(0) == 'blog' ) { print '</div>'; }?>
        </div>
        
      </div>
    <?php } ?>
  </div>
  </div>
  <div class="clr"></div> 
</div>

<div class="container-fluid pvheader">
  <div class="container-out">
      <div class="logo"><a href="<?php print check_url($front_page); ?>" title="<?php print $site_name; ?>"><img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" width="85px" /></a></div>
      <?php print render($page['sidebar_footer']); ?>    
  </div>
</div>
<?php
/*<div class="container">
  <div class="row">
    <div class="span6">
      <div class="copy"><?php print render($page['footer_copyright']); ?></div>
    </div>
  </div>
</div>*/
?>
<?php //print '<pre>'. check_plain(print_r($page, 1)) .'</pre>'; ?>