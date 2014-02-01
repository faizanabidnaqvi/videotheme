<?php 

$n1 = $n2 = '';
$i = $j = 1;
foreach ($rows as $id => $row) {
    $n1 .= ''.$row.'';
    if ($i == 4) {
      $n2 .= ''.$n1/*.''.provideo_set_bic($j)*/;
      $i = 1;
      $n1 = '';
      $j++;
    } else {
      $i++;
    }
}
if ($n1) { 
  $n2 .= ''.$n1/*.''.provideo_set_bic($j)*/;
}
if ($n2) { 
  print '<div class="row">'.$n2.'</div>';
}
?>
