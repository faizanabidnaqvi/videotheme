<!-- Comments -->
<?php if ($content['#node']->comment and !($content['#node']->comment == 1 and $content['#node']->comment_count)) { ?>
<?php if ($content['#node']->type == 'video') { ?>
<div class="comments">
  <h2 class="heading"><?php print format_plural($content['#node']->comment_count, '1 comment', '@count comments'); ?></h2>
  <?php print str_replace('resizable', '', render($content['comment_form'])); ?>
  <div class="commentslist">
    <?php print render($content['comments']); ?>
    <?php //print '<pre>'. check_plain(print_r($content['#node'], 1)) .'</pre>' ?>
  </div>
</div>
<?php } else { ?>
<div class="comments">
  <h2 class="heading"><?php print format_plural($content['#node']->comment_count, '1 comment', '@count comments'); ?></h2>
  <?php print str_replace('resizable', '', render($content['comment_form'])); ?>
  <div class="commentslist">
    <?php print render($content['comments']); ?>
    <?php //print '<pre>'. check_plain(print_r($content['#node'], 1)) .'</pre>' ?>
  </div>
</div>
<?php } ?>
<?php } ?>