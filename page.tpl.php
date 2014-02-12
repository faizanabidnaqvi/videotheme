<?php print render($page['header']); 
global $base_url, $user;
$content = render($page['content']);
?>

<div class="container-fluid pvheader">
	<div class="container-out">
		<div class="row-fluid">
			<div class="span2">
			<!--logo-->
				<div class="logo"><a href="<?php print check_url($front_page); ?>" title="<?php print $site_name; ?>"><img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" /></a></div>
			</div>
			<div class="span8">
			<!--search,upload-->
				<select id="mselect"></select>
				<div class="search ">
				<form action="<?php print url("search/node") ?>" id="SearchForm" method="post">
					<input type="text" value="<?php print t('Enter keyword to search'); ?>" id="searchBox" name="keys" onblur="if(this.value == '') { this.value = '<?php print t('Enter keyword to search'); ?>'; }" onfocus="if(this.value == '<?php print t('Enter keyword to search'); ?>') { this.value = ''; }" class="bar" />
				  <input type="submit" name="op" id="SearchSubmit" class="go" value="<?php print t("Search") ?>" />
				  <input type="hidden" name="form_token" id="edit-search-block-form-form-token" value="<?php print drupal_get_token("search_form") ?>"  />
					<input type="hidden" name="form_id" id="edit-search-block-form" value="search_form"  />
				</form>
				</div>
				<?php if (user_access('create video content')) { ?><a href="<?php print url('node/add/video') ?>" class="b-upload pv_addbtn"><?php print t('Upload') ?></a><?php } ?>	
			</div>
			<div class="span2">
			<!--account-->
				<?php
			$out = '';
			if ($user->uid) {
			  $out .= '<a href="'.url('user/'.$user->uid).'">'.t('Account').'</a> | <a href="'.url('user/logout').'">'.t('Log out').'</a>';
			} else {
			  $out .= '<a href="'.url('user').'">'.t('Log in').'</a> | <a href="'.url('user/register').'">'.t('Sign up').'</a>';
			}
			print '<div class="pv-user">'.$out.'</div>';
				?>
			</div>
		</div>
	</div>
</div>
<div class="container-out pvcontent">
	<div class="row-fluid">
		<!--msgs,tabs-->
      <div class="span12 offset2">
        <?php /*<div class="breadcrumb"><?php print $breadcrumb; ?></div> */ ?>
        <?php if (isset($messages)) { print $messages; } ?>
        <?php if($tabs) { print render($tabs); } ?>
      </div>
    </div>
	<div class="row-fluid">
		<div class="span2">
			<!--catbar-->
			<?php print render($page['sidebar_left']); ?>
		</div>
		<div class="span10">
			<!--content-->
			<?php if(drupal_is_front_page()) { ?>
			<div class="row-fluid">
				<div class="span8">
				<!--video-->
					<div class="pv-video" id="pvvideo">
						<?php print render($page['sidebar_home_player']); ?>
					</div>
				</div>
				<div class="span4">
				<!--best videos-->
					<div class="pv-video-blk">
						<?php render($page['sidebar_tabs']); ?>
						<?php print provideo_set_tabs(FALSE, FALSE, FALSE, TRUE); ?>
				  </div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
				<!--showcase videos and content-->
					<?php print render($page['sidebar_home_banner']); ?>
					  <h1 class="title"><?php print render($page['exposed_form']); ?><?php print $title; ?></h1>
					  <?php print $content; ?>
				</div>
			</div>
			<?php } elseif($set_video = provideo_set_video(FALSE, TRUE) ) { ?>
			<div class="row-fluid">
				<div class="span8">
				<!--video-->
					<div class="pv-video pv-node" id="pvvideo">
					<?php print $set_video; ?>
					</div>
					<?php print $content; ?>
				</div>
				<div class="span4">
				<!--best videos-->
					<div class="pv-video-blk">
					<?php render($page['sidebar_tabs']); ?>
					<?php print provideo_set_tabs(FALSE, FALSE, FALSE, TRUE); ?>
					</div>
				</div>
			</div>
		<!--	<div class="row-fluid">
				<div class="span12">
				showcase videos and content
					 print $content;
				</div>-->
			</div>
			<?php } else { ?>
			<div class="row-fluid">
				<div class="span12">
				<!--showcase videos and content-->
						<?php print render($page['exposed_form']); ?> <h1 class="title"><?php print $title; ?> <?php print provideo_get_count_nodes(); ?></h1>
					  <?php if(arg(0) == 'blog' ) { print '<div class="row">'; }?>
					  <?php print $content; ?>
					  <?php if(arg(0) == 'blog' ) { print '</div>'; }?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<div class="container-fluid pvheader">
	<div class="container-out">
		<div class="row-fluid">
			<div class="span2">
			<!--logo-->
				<div class="logo"><a href="<?php print check_url($front_page); ?>" title="<?php print $site_name; ?>"><img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" width="85px" /></a></div>
			</div>
			<div class="span10">
			<!--footer menu-->
				<?php print render($page['sidebar_footer']); ?>  
			</div>
		</div>
	</div>
</div>
