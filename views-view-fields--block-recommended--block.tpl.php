<?php global $user; ?>
<div class="thumb">
<a href="<?php print $fields['path']->content; ?>"><?php if (isset($user->data['provideo_addto'][strip_tags($fields['nid']->content)])) {print '<span class="add">&nbsp;</span>';} ?><?php if (strip_tags($fields['value']->content)) {print '<span class="rated">&nbsp;</span>';} ?><?php if (isset($fields['field_video']->content)) { print $fields['field_video']->content; } if (isset($fields['field_teaserimage']->content) and $fields['field_teaserimage']->content) { print $fields['field_teaserimage']->content; } else { if (isset($fields['field_embeddedvideo']->content)) { print $fields['field_embeddedvideo']->content; }}  ?></a>
</div>
<div class="desc">
<h5><a class="white title" href="<?php print $fields['path']->content; ?>"><?php print $fields['title']->content; ?></a></h5>
<p class="viewscount bbcolr"><?php print $fields['totalcount']->content; ?></p>
<p class="postedby bbcolr"><?php print t('Posted By'); ?>: <?php print $fields['name']->content; ?></p>
</div>