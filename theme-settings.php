<?php

function provideo_form_system_theme_settings_alter(&$form, $form_state) {
  drupal_add_js(drupal_get_path('theme','provideo').'/js/jscolor/jscolor.js');
  
  $form['advansed_theme_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Advansed Theme Settings'),
  );
/*
  $form['advansed_theme_settings']['tm_color_scheme'] = array(
    '#type' => 'select',
    '#title' => t('Color scheme'),
    '#default_value' => theme_get_setting('tm_color_scheme'),
    '#options' => array(
        '0' => t('Custom'),
        'theme1' => t('Blue'),
        'theme2' => t('Green'),
        'theme3' => t('Orange'),
        'theme4' => t('Tan')
    ),
  );
  
  $form['advansed_theme_settings']['tm_main_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Main Color'),
    '#default_value' => theme_get_setting('tm_main_color'),
    '#size' => 6,
  );
*/

/*fonts*/
  $form['advansed_theme_settings']['setfonts'] = array(
    '#type' => 'fieldset',
    '#title' => t('Fonts'),
  );
  $form['advansed_theme_settings']['setfonts']['tm_font_headers'] = array(
    '#type' => 'textfield',
    '#title' => t('Google Font for Font Headers'),
    '#default_value' => theme_get_setting('tm_font_headers'),
  );
  $form['advansed_theme_settings']['setfonts']['tm_font_headers_styles'] = array(
    '#type' => 'textfield',
    '#title' => t('Styles for Font Headers'),
    '#default_value' => theme_get_setting('tm_font_headers_styles'),
  );
  $form['advansed_theme_settings']['setfonts']['tm_font_headers_subset'] = array(
    '#type' => 'textfield',
    '#title' => t('Character sets for Font Headers'),
    '#default_value' => theme_get_setting('tm_font_headers_subset'),
  );

  $form['advansed_theme_settings']['setfonts']['tm_font_menu'] = array(
    '#type' => 'textfield',
    '#title' => t('Google Font for Font Menu'),
    '#default_value' => theme_get_setting('tm_font_menu'),
  );
  $form['advansed_theme_settings']['setfonts']['tm_font_menu_styles'] = array(
    '#type' => 'textfield',
    '#title' => t('Styles for Font Menu'),
    '#default_value' => theme_get_setting('tm_font_menu_styles'),
  );
  $form['advansed_theme_settings']['setfonts']['tm_font_menu_subset'] = array(
    '#type' => 'textfield',
    '#title' => t('Character sets for Font Menu'),
    '#default_value' => theme_get_setting('tm_font_menu_subset'),
  );

  $form['advansed_theme_settings']['setfonts']['tm_font_theme'] = array(
    '#type' => 'textfield',
    '#title' => t('Google Font for Theme Font'),
    '#default_value' => theme_get_setting('tm_font_theme'),
  );
  $form['advansed_theme_settings']['setfonts']['tm_font_theme_styles'] = array(
    '#type' => 'textfield',
    '#title' => t('Styles for Theme Font'),
    '#default_value' => theme_get_setting('tm_font_theme_styles'),
  );
  $form['advansed_theme_settings']['setfonts']['tm_font_theme_subset'] = array(
    '#type' => 'textfield',
    '#title' => t('Character sets for Theme Font'),
    '#default_value' => theme_get_setting('tm_font_theme_subset'),
  );

/*colors*/
  $form['advansed_theme_settings']['setcolors'] = array(
    '#type' => 'fieldset',
    '#title' => t('Colors'),
  );
  $form['advansed_theme_settings']['setcolors']['tm_background_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Background Color'),
    '#default_value' => theme_get_setting('tm_background_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  
  $form['advansed_theme_settings']['setcolors']['tm_header_background_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Header Background Color'),
    '#default_value' => theme_get_setting('tm_header_background_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_header_border_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Header Border Color'),
    '#default_value' => theme_get_setting('tm_header_border_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );


  $form['advansed_theme_settings']['setcolors']['tm_content_background_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Content Background Color'),
    '#default_value' => theme_get_setting('tm_content_background_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_content_border_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Content Border Color'),
    '#default_value' => theme_get_setting('tm_content_border_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_content_title_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Content Title Color'),
    '#default_value' => theme_get_setting('tm_content_title_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_content_title_background_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Content Title Background Color'),
    '#default_value' => theme_get_setting('tm_content_title_background_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_content_text_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Content Text Color'),
    '#default_value' => theme_get_setting('tm_content_text_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_block_title_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Block Title Color'),
    '#default_value' => theme_get_setting('tm_block_title_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_block_title_background_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Block Title Background Color'),
    '#default_value' => theme_get_setting('tm_block_title_background_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );

  $form['advansed_theme_settings']['setcolors']['tm_footer_background_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Footer Background Color'),
    '#default_value' => theme_get_setting('tm_footer_background_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_footer_border_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Footer Border Color'),
    '#default_value' => theme_get_setting('tm_footer_border_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_footer_title_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Footer Title Color'),
    '#default_value' => theme_get_setting('tm_footer_title_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_footer_title_background_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Footer Title Background Color'),
    '#default_value' => theme_get_setting('tm_footer_title_background_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_footer_text_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Footer Text Color'),
    '#default_value' => theme_get_setting('tm_footer_text_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  
  $form['advansed_theme_settings']['setcolors']['tm_link_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Link Color'),
    '#default_value' => theme_get_setting('tm_link_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_link_hover_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Link Hover Color'),
    '#default_value' => theme_get_setting('tm_link_hover_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  
  $form['advansed_theme_settings']['setcolors']['tm_button_background_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Button Background Color'),
    '#default_value' => theme_get_setting('tm_button_background_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_button_text_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Button Text Color'),
    '#default_value' => theme_get_setting('tm_button_text_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_button_background_hover_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Button Background Hover Color'),
    '#default_value' => theme_get_setting('tm_button_background_hover_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_button_text_hover_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Button Text Hover Color'),
    '#default_value' => theme_get_setting('tm_button_text_hover_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );

  $form['advansed_theme_settings']['setcolors']['tm_top_menu_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Top Menu Color'),
    '#default_value' => theme_get_setting('tm_top_menu_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_top_menu_background_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Top Menu Background Color'),
    '#default_value' => theme_get_setting('tm_top_menu_background_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_top_menu_hover_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Top Menu Hover Color'),
    '#default_value' => theme_get_setting('tm_top_menu_hover_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_top_menu_background_hover_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Top Menu Background Hover Color'),
    '#default_value' => theme_get_setting('tm_top_menu_background_hover_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_top_menu_active_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Top Menu Active Color'),
    '#default_value' => theme_get_setting('tm_top_menu_active_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_top_menu_background_active_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Top Menu Background Active Color'),
    '#default_value' => theme_get_setting('tm_top_menu_background_active_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );

  $form['advansed_theme_settings']['setcolors']['tm_tab_menu_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Tab Menu Color'),
    '#default_value' => theme_get_setting('tm_tab_menu_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_tab_menu_background_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Tab Menu Background Color'),
    '#default_value' => theme_get_setting('tm_tab_menu_background_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_tab_menu_hover_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Tab Menu Hover Color'),
    '#default_value' => theme_get_setting('tm_tab_menu_hover_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_tab_menu_background_hover_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Tab Menu Background Hover Color'),
    '#default_value' => theme_get_setting('tm_tab_menu_background_hover_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_tab_menu_active_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Tab Menu Active Color'),
    '#default_value' => theme_get_setting('tm_tab_menu_active_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_tab_menu_background_active_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Tab Menu Background Active Color'),
    '#default_value' => theme_get_setting('tm_tab_menu_background_active_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
 
 $form['advansed_theme_settings']['setcolors']['tm_service_link_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Service Link Color'),
    '#default_value' => theme_get_setting('tm_service_link_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_service_link_background_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Service Link Background Color'),
    '#default_value' => theme_get_setting('tm_service_link_background_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_service_link_hover_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Service Link Hover Color'),
    '#default_value' => theme_get_setting('tm_service_link_hover_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_service_link_background_hover_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Service Link Background Hover Color'),
    '#default_value' => theme_get_setting('tm_service_link_background_hover_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );

  $form['advansed_theme_settings']['setcolors']['tm_tag_link_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Tag Link Color'),
    '#default_value' => theme_get_setting('tm_tag_link_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_tag_link_background_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Tag Link Background Color'),
    '#default_value' => theme_get_setting('tm_tag_link_background_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_tag_link_border_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Tag Link Border Color'),
    '#default_value' => theme_get_setting('tm_tag_link_border_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_tag_link_hover_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Tag Link Hover Color'),
    '#default_value' => theme_get_setting('tm_tag_link_hover_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_tag_link_background_hover_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Tag Link Background Hover Color'),
    '#default_value' => theme_get_setting('tm_tag_link_background_hover_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_tag_link_border_hover_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Tag Link Border Hover Color'),
    '#default_value' => theme_get_setting('tm_tag_link_border_hover_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_tag_link_active_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Tag Link Active Color'),
    '#default_value' => theme_get_setting('tm_tag_link_active_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_tag_link_background_active_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Tag Link Background Active Color'),
    '#default_value' => theme_get_setting('tm_tag_link_background_active_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  $form['advansed_theme_settings']['setcolors']['tm_tag_link_border_active_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Tag Link Border Active Color'),
    '#default_value' => theme_get_setting('tm_tag_link_border_active_color'),
    '#size' => 6,
    '#attributes' => array('class' => array('color')),
  );
  
/*accounts*/    
  $form['advansed_theme_settings']['socacc'] = array(
    '#type' => 'fieldset',
    '#title' => t('Accounts'),
  );
  $form['advansed_theme_settings']['socacc']['tm_ac_youtube'] = array(
    '#type' => 'textfield',
    '#title' => t('YouTube.com'),
    '#default_value' => theme_get_setting('tm_ac_youtube'),
  );
  $form['advansed_theme_settings']['socacc']['tm_ac_flickr'] = array(
    '#type' => 'textfield',
    '#title' => t('Flickr.com'),
    '#default_value' => theme_get_setting('tm_ac_flickr'),
  );
  $form['advansed_theme_settings']['socacc']['tm_ac_facebook'] = array(
    '#type' => 'textfield',
    '#title' => t('FaceBook.com'),
    '#default_value' => theme_get_setting('tm_ac_facebook'),
  );
/*
  $form['advansed_theme_settings']['tm_intro_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Intro color'),
    '#default_value' => theme_get_setting('tm_intro_color'),
    '#size' => 6,
  );
  $form['advansed_theme_settings']['tm_intro_text_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Intro text color'),
    '#default_value' => theme_get_setting('tm_intro_text_color'),
    '#size' => 6,
  );
  $form['advansed_theme_settings']['tm_intro_title_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Intro title color'),
    '#default_value' => theme_get_setting('tm_intro_title_color'),
    '#size' => 6,
  );
  $form['advansed_theme_settings']['tm_price_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Price color'),
    '#default_value' => theme_get_setting('tm_price_color'),
    '#size' => 6,
  );
  $form['advansed_theme_settings']['tm_price_text_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Price text color'),
    '#default_value' => theme_get_setting('tm_price_text_color'),
    '#size' => 6,
  );
  $form['advansed_theme_settings']['tm_promo_price_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Promo price color'),
    '#default_value' => theme_get_setting('tm_promo_price_color'),
    '#size' => 6,
  );
  $form['advansed_theme_settings']['tm_promo_price_text_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Promo price text color'),
    '#default_value' => theme_get_setting('tm_promo_price_text_color'),
    '#size' => 6,
  );
 
  $form['advansed_theme_settings']['tm_texture'] = array(
    '#type' => 'select',
    '#title' => t('Texture'),
    '#default_value' => theme_get_setting('tm_texture'),
    '#options' => array(
        'texture_1' => t('Squares'),
        'texture_2' => t('Noise'),
        'texture_3' => t('Rough'),
        '0' => t('No texture')
    ),
  );

  $form['#submit'][] = 'provideo_form_system_theme_settings_alter_submit';
  */
}



function provideo_form_system_theme_settings_alter_submit(&$form, &$form_state) {
$provideo_color_themes = array(
        'theme1' => array(
            'main_color'             => '4cb1ca',
            'secondary_color'        => 'f12b63',
            'intro_color'            => 'e6f6fa',
            'intro_text_color'       => '103e47',
            'intro_title_color'      => '4cb1ca',
            'price_color'            => '4cb1ca',
            'price_text_color'       => 'ffffff',
            'promo_price_color'      => 'f12b63',
            'promo_price_text_color' => 'ffffff',
            'background_color'       => 'edf3f5',
            'texture'                => 'texture_3'
        ),
        'theme2' => array(
            'main_color'             => '71b013',
            'secondary_color'        => 'ff9900',
            'intro_color'            => 'dcf5ce',
            'intro_text_color'       => '385217',
            'intro_title_color'      => '65a819',
            'price_color'            => 'bfe388',
            'price_text_color'       => '395215',
            'promo_price_color'      => 'ff9900',
            'promo_price_text_color' => 'ffffff',
            'background_color'       => 'f9fff2',
            'texture'                => 'texture_2'
        ),
        'theme3' => array(
            'main_color'             => 'ff8c00',
            'secondary_color'        => '40aebd',
            'intro_color'            => 'ffecc7',
            'intro_text_color'       => '574324',
            'intro_title_color'      => 'f27100',
            'price_color'            => 'f5c275',
            'price_text_color'       => '4d3b17',
            'promo_price_color'      => '40aebd',
            'promo_price_text_color' => 'ffffff',
            'background_color'       => 'fffceb',
            'texture'                => 'texture_1'
        ),
        'theme4' => array(
            'main_color'             => 'b3a97d',
            'secondary_color'        => '4cb1ca',
            'intro_color'            => 'f0eddf',
            'intro_text_color'       => '8a8577',
            'intro_title_color'      => '7a7153',
            'price_color'            => 'e3dcbf',
            'price_text_color'       => '4d4938',
            'promo_price_color'      => '4cb1ca',
            'promo_price_text_color' => 'ffffff',
            'background_color'       => 'f7f5ef',
            'texture'                => 'texture_1'
        )
    );

  if ($form_state['values']['tm_color_scheme']) {
    $form_state['values']['tm_main_color'] = $provideo_color_themes[$form_state['values']['tm_color_scheme']]['main_color'];
    $form_state['values']['tm_secondary_color'] = $provideo_color_themes[$form_state['values']['tm_color_scheme']]['secondary_color'];
    $form_state['values']['tm_intro_color'] = $provideo_color_themes[$form_state['values']['tm_color_scheme']]['intro_color'];
    $form_state['values']['tm_intro_text_color'] = $provideo_color_themes[$form_state['values']['tm_color_scheme']]['intro_text_color'];
    $form_state['values']['tm_intro_title_color'] = $provideo_color_themes[$form_state['values']['tm_color_scheme']]['intro_title_color'];
    $form_state['values']['tm_price_color'] = $provideo_color_themes[$form_state['values']['tm_color_scheme']]['price_color'];
    $form_state['values']['tm_price_text_color'] = $provideo_color_themes[$form_state['values']['tm_color_scheme']]['price_text_color'];
    $form_state['values']['tm_promo_price_color'] = $provideo_color_themes[$form_state['values']['tm_color_scheme']]['promo_price_color'];
    $form_state['values']['tm_promo_price_text_color'] = $provideo_color_themes[$form_state['values']['tm_color_scheme']]['promo_price_text_color'];
    $form_state['values']['tm_background_color'] = $provideo_color_themes[$form_state['values']['tm_color_scheme']]['background_color'];
    $form_state['values']['tm_texture'] = $provideo_color_themes[$form_state['values']['tm_color_scheme']]['texture'];

    $form_state['values']['tm_color_scheme'] = 0;
  }

//drupal_set_message('<pre>'. check_plain(print_r($form_state, 1)) .'</pre>');
}

$_theme_names = array(
        'theme1' => t('Blue'),
        'theme2' => t('Green'),
        'theme3' => t('Orange'),
        'theme4' => t('Tan')
    );

