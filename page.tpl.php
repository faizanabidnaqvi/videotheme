<?php print render($page['header']); 
global $base_url, $user;
$content = render($page['content']);
$url_comp = explode('/', request_uri());
?>

<div class="container-fluid pvheader">
	<div class="container-out">
		<div class="row-fluid">
			<div class="span2">
			<!--logo-->
				<div class="logo span12"><a href="<?php print check_url($front_page); ?>" title="<?php print $site_name; ?>"><img src="<?php print $logo; ?>" alt="<?php print $site_name; ?>" /></a></div>
			</div>
			<div class="span10 no-margins">
				<div class="span9">
					<div class="header-box">
						<div class="bottom-align">
						<!--search,upload-->
							
							<div class="header-search ">
								<form action="<?php print url("search/node") ?>" id="SearchForm" method="post">
									<input type="text" value="<?php print t('Enter keyword to search'); ?>" id="searchBox" name="keys" onblur="if(this.value == '') { this.value = '<?php print t('Enter keyword to search'); ?>'; }" onfocus="if(this.value == '<?php print t('Enter keyword to search'); ?>') { this.value = ''; }" class="bar" />
								  <input type="submit" name="op" id="SearchSubmit" class="go" value="<?php print t("Search") ?>" />
								  <input type="hidden" name="form_token" id="edit-search-block-form-form-token" value="<?php print drupal_get_token("search_form") ?>"  />
									<input type="hidden" name="form_id" id="edit-search-block-form" value="search_form"  />
								</form>
							</div>
							<?php if (user_access('create video content')) { ?><a href="<?php print url('node/add/video') ?>" class="b-upload pv_addbtn"><?php print t('Upload') ?></a>
							<?php } else { ?><a href="<?php print url('user') ?>" class="b-upload pv_addbtn"><?php print t('Upload') ?></a>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="span3">
					<div class="header-box">
						<div class="bottom-align">
							<select id="mselect" class="hidden-desktop hidden-tablet"></select>	
							<!--account-->
								<div class="hidden-phone">
								<?php
							$out = '';
							if ($user->uid) {
							  $out .= '<a href="'.url('user/'.$user->uid).'">'.t('Account').'</a> | <a href="'.url('user/logout').'">'.t('Log out').'</a>';
							} else {
							  /*$out .= '<a href="'.url('user').'">'.t('Sign in').'</a> | <a href="'.url('user/register').'">'.t('Sign up').'</a>';*/
							  $out .= '<a href="'.url('user').'"  class="b-signin">'.t('Sign in').'</a>';
							  $members = db_query("SELECT count(uid) FROM {users}")->fetchField();
							  $out .= '<span class="'.'total-users"'.'> '.$members.t(' registered users').'</span>';
							}
							print '<div class="pv-user">'.$out.'</div>';
								?>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-out pvcontent">
	
	<div class="row-fluid">
		<div class="span2 full-height content-border top-padding">
			<!--catbar-->
			<?php print render($page['sidebar_left']); ?>
		</div>
		<div class="span10 top-padding">
			<?php if($messages) { ?>
			<div class="row-fluid">
				<!--msgs,tabs-->
				  <div class="span12">
						<?php /*<div class="breadcrumb"><?php print $breadcrumb; ?></div> */ ?>
						<?php  print $messages; ?>
				  </div>
			</div>
			<?php } ?>
			<?php if($tabs = render($tabs)) { ?>
			<div class="row-fluid">
				<!--tabs-->
				  <div class="span12">
						<?php  print render($tabs); ?>
				  </div>
			</div>
			<?php } ?>
			<!--content-->
			<?php if(drupal_is_front_page()) { ?>
			<div class="row-fluid">
				<div class="span7 video-border" >
				<!--video-->
					<div class="pv-video" id="pvvideo">
						<?php print render($page['sidebar_home_player']); ?>
					</div>
				</div>
				<div class="span5 hidden-phone" style="margin-left:1%">
				<!--best videos-->
					<div class="pv-video-blk block">
						<?php render($page['sidebar_tabs']); ?>
						<?php print provideo_set_tabs(FALSE, FALSE, FALSE, TRUE); ?>
				  </div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
				<!--showcase videos and content-->
					<?php print render($page['sidebar_home_banner']); ?>
					  <?php print render($page['home_summary']); ?>
					  <?php /*print $content; */?>
				</div>
			</div>
			<?php } elseif($set_video = provideo_set_video(FALSE, TRUE) ) { ?>
			<div class="row-fluid">
				<div class="span7" >
				<!--video-->
					<div class="pv-video pv-node" id="pvvideo">
					<?php print $set_video; ?>
					</div>
					<?php print $content; ?>
				</div>
				<div class="span5 hidden-phone" >
				<!--best videos-->
					<div class="pv-video-blk block">
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
			<?php } else if($url_comp[1]=="videos") { ?>
			<div class="row-fluid">
				<div class="span12">
				<!--showcase videos and content-->
						<?php print render($page['exposed_form']); ?> <h1 class="title"><?php print $title; ?> <?php print provideo_get_count_nodes(); ?></h1>
					  <?php if(arg(0) == 'blog' ) { print '<div class="row">'; }?>
					  <?php print $content; ?>
					  <?php if(arg(0) == 'blog' ) { print '</div>'; }?>
				</div>
			</div>
			<?php } else { ?>
			<div class="row-fluid">
				<div class="span7">
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
<div class="container-fluid pvheader footer">
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
