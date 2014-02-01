<a href="#" class="toc">
  <span class="thumb"><?php print $fields['field_video']->content; ?></span>
  <span class="desc">
    <span class="title"><?php print $fields['title']->content; ?></span>
    <span class="channel"><?php print $fields['created']->content; ?></span><br />
    <span class="channel"><?php print t('Posted By').': '.$fields['name']->content; ?></span>
  </span>
</a>
<?php provideo_set_home_video_left('<div class="contentdiv">'.$fields['field_video_1']->content.'</div>'); ?>