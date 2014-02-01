<?php 
/*
$id = ( is_numeric(arg(2)) ? arg(2) : (is_numeric(arg(1)) ? arg(1) : '' ) );
*/
print '
  <div class="row">';
  /*
    <div class="recent_head">
    <h3>'.t('Recent Videos').'</h3>
    <a href="'.url('videos').'" class="viewall">'.t('(View All)').'</a>
      <div class="recent_buttons">
        <ul>
          <li class="gridbutn"><a href="#" class="switch_thumb">&nbsp;</a></li>
          '.*//*<li><a href="#" class="previousbtn">&nbsp;</a><a href="#" class="nextbtn">&nbsp;</a></li>*//*'
        </ul>
      </div>
    </div>
    <div class="clear"></div>
  ';
  */
?>

  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($header): ?>
    <div class="view-header">
      <?php print $header; ?>
    </div>
  <?php endif; ?>

  <?php if ($exposed): ?>
    <div class="view-filters">
      <?php print $exposed; ?>
    </div>
  <?php endif; ?>

  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>
   
  <?php if ($rows): ?>
    <div class="view-content">
      <?php print $rows; ?>
    </div>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>

  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>

  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

</div>