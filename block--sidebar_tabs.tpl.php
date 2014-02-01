<?php 
$content1 = '<div id="'.$block_html_id.'" class="'.$classes.'"'.$attributes.'>'.
  render($title_prefix).render($title_suffix).$content.
'</div>';

provideo_set_tabs($block_html_id, $block->subject, $content1);

//print '<pre>'.check_plain(print_r($block, 1)) .'</pre>'; ?>

