<?php 
$n1 = '';
foreach ($rows as $id => $row) {
  $n1 .= '<span>'.$row.'</span>';
}
print '<div class="toptags">'.$n1.'</div>';
?>