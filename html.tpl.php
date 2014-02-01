<!doctype html>
<html dir="<?php print $language->dir; ?>" lang="<?php print $language->language; ?>">
<head profile="<?php print $grddl_profile; ?>">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <?php print $styles; ?>
  <?php if (theme_get_setting('tm_font_theme')) { ?>
    <link href='http://fonts.googleapis.com/css?family=<?php print theme_get_setting('tm_font_theme'); if (theme_get_setting('tm_font_theme_styles')) print ':'.theme_get_setting('tm_font_theme_styles'); if (theme_get_setting('tm_font_theme_subset')) print '&subset='.theme_get_setting('tm_font_theme_subset'); ?>' rel='stylesheet' type='text/css'>
  <?php } ?>
  <?php if (theme_get_setting('tm_font_menu')) { ?>
    <link href='http://fonts.googleapis.com/css?family=<?php print theme_get_setting('tm_font_menu'); if (theme_get_setting('tm_font_menu_styles')) print ':'.theme_get_setting('tm_font_menu_styles'); if (theme_get_setting('tm_font_menu_subset')) print '&subset='.theme_get_setting('tm_font_menu_subset'); ?>' rel='stylesheet' type='text/css'>
  <?php } ?>
  <?php if (theme_get_setting('tm_font_headers')) { ?>
    <link href='http://fonts.googleapis.com/css?family=<?php print theme_get_setting('tm_font_headers'); if (theme_get_setting('tm_font_headers_styles')) print ':'.theme_get_setting('tm_font_headers_styles'); if (theme_get_setting('tm_font_headers_subset')) print '&subset='.theme_get_setting('tm_font_headers_subset'); ?>' rel='stylesheet' type='text/css'>
  <?php } ?>
  <style type="text/css">
  <?php if (theme_get_setting('tm_font_theme')) { ?>   
    body {
	    font-family: '<?php print theme_get_setting('tm_font_theme') ?>';
	    <?php if (theme_get_setting('tm_font_theme_styles')) { ?> font-weight: <?php print theme_get_setting('tm_font_theme_styles') ?>;<?php } else { ?>font-weight: 400; <?php } ?>
    }
  <?php } ?>
  <?php if (theme_get_setting('tm_font_menu')) { ?>   
    #tab_menu li a,
    .pvheader ul.menu li a,
    ul.tabs li a,
    ul.tablinks li a,
    .toptags span a,
    ul.menu li a,
    .view-id-categories_block ul li,
    .views-field-title,
    .node-video.node-teaser h2, 
    .node-embedded-video.node-teaser h2
    {
	    font-family: '<?php print theme_get_setting('tm_font_menu') ?>';
	    <?php if (theme_get_setting('tm_font_menu_styles')) { ?> font-weight: <?php print theme_get_setting('tm_font_menu_styles') ?>;<?php } else { ?>font-weight: 400; <?php } ?>
    }
  <?php } ?>
  <?php if (theme_get_setting('tm_font_headers')) { ?>   
    h1, h2, h3, h4, h5, h6,
    h1.title,
    h2.title,
    h3.title,
    .block h4,
    .footer .block h4,
    .home h1.title
    {
	    font-family: '<?php print theme_get_setting('tm_font_headers') ?>';
	    <?php if (theme_get_setting('tm_font_headers_styles')) { ?> font-weight: <?php print theme_get_setting('tm_font_headers_styles') ?>;<?php } else { ?>font-weight: 400; <?php } ?>
    }
  <?php } ?>
    body { background-color: #<?php print theme_get_setting('tm_background_color') ?>; }
    body { color: #<?php print theme_get_setting('tm_content_text_color') ?>; } 
    .pvheader { background-color: #<?php print theme_get_setting('tm_header_background_color') ?>; border-bottom-color: #<?php print theme_get_setting('tm_header_border_color') ?>; }
    .pvcontent { background-color: #<?php print theme_get_setting('tm_content_background_color') ?>; border-color: #<?php print theme_get_setting('tm_content_border_color') ?>; }
    h1.title, h1.title a, h2.title, h2.title a, h3.title, h3.title a
      { color: #<?php print theme_get_setting('tm_content_title_color') ?>; background-color: #<?php print theme_get_setting('tm_content_title_background_color') ?>; }
    .block h4 { color: #<?php print theme_get_setting('tm_block_title_color') ?>; background-color: #<?php print theme_get_setting('tm_block_title_background_color') ?>; }
    .footer { color: #<?php print theme_get_setting('tm_footer_text_color') ?>; background-color: #<?php print theme_get_setting('tm_footer_background_color') ?>; border-color: #<?php print theme_get_setting('tm_footer_border_color') ?>; }
    .footer .block h4 { color: #<?php print theme_get_setting('tm_footer_title_color') ?>; background-color: #<?php print theme_get_setting('tm_footer_title_background_color') ?>; }
    a
      { color: #<?php print theme_get_setting('tm_link_color') ?>; }
    a:hover, a:focus { color: #<?php print theme_get_setting('tm_link_hover_color') ?>; }
    .form-submit, .b-upload, .node-video.node-teaser .hover a.play, .node-embedded-video.node-teaser .hover a.play { color: #<?php print theme_get_setting('tm_button_text_color') ?>; background-color: #<?php print theme_get_setting('tm_button_background_color') ?>; }
    .form-submit:hover, .b-upload:hover, .node-video.node-teaser .hover a.play:hover, .node-embedded-video.node-teaser .hover a.play:hover { color: #<?php print theme_get_setting('tm_button_text_hover_color') ?>; background-color: #<?php print theme_get_setting('tm_button_background_hover_color') ?>; }
      
    .pvheader ul.menu li a { color: #<?php print theme_get_setting('tm_top_menu_color') ?>; background-color: #<?php print theme_get_setting('tm_top_menu_background_color') ?>; }
    .pvheader ul.menu li a.active, .pvheader ul.menu li a.active-trail { color: #<?php print theme_get_setting('tm_top_menu_active_color') ?>; background-color: #<?php print theme_get_setting('tm_top_menu_background_active_color') ?>; }
    .pvheader ul.menu li a:hover, .pvheader ul.menu li:hover a { color: #<?php print theme_get_setting('tm_top_menu_hover_color') ?>; background-color: #<?php print theme_get_setting('tm_top_menu_background_hover_color') ?>; }
    .pvheader ul.menu li ul.menu { background-color: #<?php print theme_get_setting('tm_top_menu_background_hover_color') ?>; }
    .pvheader ul.menu li ul.menu li a:hover { color: #<?php print theme_get_setting('tm_top_menu_level_hover_color') ?>; background-color: #<?php print theme_get_setting('tm_top_menu_background_level_hover_color') ?>; }
    
    ul.tabs li a { color: #<?php print theme_get_setting('tm_tab_menu_color') ?>; background-color: #<?php print theme_get_setting('tm_tab_menu_background_color') ?>; }
    ul.tabs li a.active, ul.tabs li a.active-trail { color: #<?php print theme_get_setting('tm_tab_menu_active_color') ?>; background-color: #<?php print theme_get_setting('tm_tab_menu_background_active_color') ?>; }
    ul.tabs li a:hover { color: #<?php print theme_get_setting('tm_tab_menu_hover_color') ?>; background-color: #<?php print theme_get_setting('tm_tab_menu_background_hover_color') ?>; }
    ul.tablinks li a { color: #<?php print theme_get_setting('tm_service_link_color') ?>; background-color: #<?php print theme_get_setting('tm_service_link_background_color') ?>; }
    ul.tablinks li a:hover { color: #<?php print theme_get_setting('tm_service_link_hover_color') ?>; background-color: #<?php print theme_get_setting('tm_service_link_background_hover_color') ?>; }
    
    .toptags span a, .field-type-taxonomy-term-reference .field-item a { color: #<?php print theme_get_setting('tm_tag_link_color') ?>; background-color: #<?php print theme_get_setting('tm_tag_link_background_color') ?>; border-color: #<?php print theme_get_setting('tm_tag_link_border_color') ?>;}
    .toptags span a.active, .toptags span a.active-trail, .field-type-taxonomy-term-reference .field-item a.active, .field-type-taxonomy-term-reference .field-item a.active-trail { color: #<?php print theme_get_setting('tm_tag_link_active_color') ?>; background-color: #<?php print theme_get_setting('tm_tag_link_background_active_color') ?>; border-color: #<?php print theme_get_setting('tm_tag_link_border_active_color') ?>;}
    .toptags span a:hover, .field-type-taxonomy-term-reference .field-item a:hover { color: #<?php print theme_get_setting('tm_tag_link_hover_color') ?>; background-color: #<?php print theme_get_setting('tm_tag_link_background_hover_color') ?>; border-color: #<?php print theme_get_setting('tm_tag_link_border_hover_color') ?>;}


  </style> 
  <?php print $scripts; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?><?php print provideo_set_background(false, true); ?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>