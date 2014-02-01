<div class="comment">
  <?php //print '<pre>'. check_plain(print_r($content, 1)) .'</pre>'; ?>
  <?php print $picture ?>
  <div class="desc">
    <?php print theme('username', array('account' => $content['comment_body']['#object'])) ?>
    <span class="time"> • <?php print t('!time ago',array('!time' => format_interval(time() - $content['comment_body']['#object']->created))); ?></span>
    <div class="txt"><?php hide($content['links']); print render($content) ?></div>    
    <div class="commentlinks"><?php print render($content['links']) ?></div>
    <div class="clr"></div>
  </div>
</div>