<a href="#" class="toc">
  <span class="thumb"><?php if (isset($fields['field_video']->content)) { print $fields['field_video']->content; } if (isset($fields['field_teaserimage']->content)) { print $fields['field_teaserimage']->content; } else { if (isset($fields['field_embeddedvideo']->content)) { print $fields['field_embeddedvideo']->content; }}  ?></span>
  <span class="desc">
    <span class="title"><?php print $fields['title']->content; ?></span>
    <span class="channel"><?php print $fields['created']->content; ?></span><br />
    <span class="channel"><?php print t('Posted By').': '.$fields['name']->content; ?></span>
  </span>
</a>
<?php provideo_set_home_video_left('<div class="contentdiv">'.(isset($fields['field_video_1']->content) ? $fields['field_video_1']->content : '').(isset($fields['field_embeddedvideo_1']->content) ? $fields['field_embeddedvideo_1']->content : '').'</div>'); ?>