<?php 

$n1 = $n2 = '';
$i = $j = 1;
foreach ($rows as $id => $row) {
    $n1 .= ''.$row.'';
    if ($i == 5) {
      $n2 .= ''.$n1.'</div><div class="row-fluid">'.provideo_set_bic($j).'</div><div class="row-fluid">';
      $i = 1;
      $n1 = '';
      $j++;
    } else {
      $i++;
    }
}
if ($n1) { 
  $n2 .= ''.$n1.'</div><div class="row-fluid">'.provideo_set_bic($j).'</div>';
}
if ($n2) { 
  print '<div class="row-fluid">'.$n2.'</div>';
}
?>
