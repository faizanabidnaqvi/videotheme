<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if ($block->subject): ?>
    <h4<?php print $title_attributes; ?>><a href="<?php print url('tags') ?>" class="v-all right"><?php print t('View All →') ?></a><?php print $block->subject ?></h4>
  <?php endif;?>
  <?php print render($title_suffix); ?>
  <div class="content"<?php print $content_attributes; ?>>
    <?php print $content ?>
  </div>
</div>
<?php //print '<pre>'.check_plain(print_r($block, 1)) .'</pre>'; ?>