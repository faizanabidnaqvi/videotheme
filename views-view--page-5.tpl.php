<?php 
global $user;
drupal_add_js(drupal_get_path('theme', 'provideo') . '/js/switch_a.js');
$id = ( is_numeric(arg(2)) ? arg(2) : (is_numeric(arg(1)) ? arg(1) : '' ) );
$ur = arg(0);
if($id) {
  $tax = taxonomy_term_load_multiple(array($id));
  if (isset($tax[$id]->field_background['und'][0]['uri'])) { 
    provideo_set_background($tax[$id]->field_background['und'][0]['uri']);
  } else {
    provideo_set_background(provideo_get_background($tax[$id]->vocabulary_machine_name));
  }
} else {
  provideo_set_background(provideo_get_background('video'));
}
//print '<pre>'. check_plain(print_r($tax[$id], 1)) .'</pre>';
?>

<div class="<?php print $classes; ?>">
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
<?php //print '<pre>'. check_plain(print_r($tt, 1)) .'</pre>'; ?>