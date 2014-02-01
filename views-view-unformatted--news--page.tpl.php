<?php 
$breadcrumb = array();
$breadcrumb[] = l(t('Home'), NULL);
$breadcrumb[] = l(t('News'), 'news');
drupal_set_breadcrumb($breadcrumb);
provideo_set_background(provideo_get_background('article'));
$n1 = '';
foreach ($rows as $id => $row) {
  $n1 .= '<li>'.$row.'</li>';
}
print '<ul class="newslisting">'.$n1.'</ul>';
?>
