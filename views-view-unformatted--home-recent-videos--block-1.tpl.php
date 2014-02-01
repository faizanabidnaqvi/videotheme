<?php 

$n1 = $n2 = '';
$i = $j = 1;
foreach ($rows as $id => $row) {
    $n1 .= '<li>'.$row.'</li>';
    if ($i == 4) {
      $n2 .= '<ul class="display1">'.$n1.'</ul>'/*.provideo_set_bic($j)*/;
      $i = 1;
      $n1 = '';
      $j++;
    } else {
      $i++;
    }
}
if ($n1) { 
  $n2 .= '<ul class="display1">'.$n1.'</ul>'/*.provideo_set_bic($j)*/;
}
if ($n2) { 
  print '<!-- Video Listing -->'.$n2;
}
?>
