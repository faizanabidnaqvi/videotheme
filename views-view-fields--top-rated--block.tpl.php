<div class="span5">
	<div class="views-field-field-video"><?php if (isset($fields['field_video']->content)) { print $fields['field_video']->content; } if (isset($fields['field_teaserimage']->content)) { print $fields['field_teaserimage']->content; } else { if (isset($fields['field_embeddedvideo_1']->content)) { print $fields['field_embeddedvideo_1']->content; }}  ?></div>
</div>
<div class="span6">
	<div class="views-field-title"><?php print $fields['title']->content; ?></div>
	<div class="views-field-user"><?php print $fields['name']->content; ?></div>
	<div class="views-field-totalcount"><?php print $fields['totalcount']->content; ?></div>
	<div class="views-field-value"><?php print $fields['value']->content; ?></div>
</div>