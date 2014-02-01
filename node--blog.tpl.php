<?php 
if (!$page) { ?>
<div id="node-<?php print $node->nid; ?>" class="span8 <?php print $classes; ?>"<?php print $attributes; ?>>
  <h2 class="title"><a href="<?php print $node_url; ?>" class="colr"><?php print $title; ?></a></h2>
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>
  <div class="row">
    <div class="span2 desc">
      <p class="time"><?php print $date; ?></p>
      <p class="postedby"><?php print t('By: !name', array('!name' => $name)); ?></p>
      <?php if ($node->comment and !($node->comment == 1 and !$node->comment_count)) { ?><p><a class="comments_bubble" href="<?php print url("node/$node->nid", array('fragment' => 'comment-form')) ?>"><?php print format_plural($node->comment_count, '1 comment', '@count comments'); ?></a></p><?php } ?>
    </div>
    <div class="span6">
      <?php hide($content['comments']); hide($content['links']); print render($content); ?>
    </div>
  </div>
  <div class="clr"></div>
</div>

<?php } else { 
if (isset($node->field_background_blog[$node->language][0]['uri'])) provideo_set_background($node->field_background_blog[$node->language][0]['uri']);
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <div class="desc">
    <span class="time"><?php print $date; ?></span>
    <span class="postedby"><?php print t('By: !name', array('!name' => $name)); ?></span>
    <?php if ($node->comment and !($node->comment == 1 and !$node->comment_count)) { ?><span class="ccomments"><a class="comments_bubble" href="<?php print url("node/$node->nid", array('fragment' => 'comment-form')) ?>"><?php print format_plural($node->comment_count, '1 comment', '@count comments'); ?></a></span><?php } ?>
  </div>
  <?php hide($content['comments']); hide($content['links']); print render($content); ?>
</div>
<div class="clr"></div>
<?php print render($content['comments']); ?>
<?php } ?>
<?php //print '<pre>'. check_plain(print_r($node->nid, 1), 1)) .'</pre>'; ?>