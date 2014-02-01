<?php 
$n1 = $n2 = '';
$i = true;
foreach ($rows as $id => $row) {
  if ($i) {
    $n1 .= '<li>'.$row.'</li>';
    $i = false;
  }else{
    $n2 .= '<li>'.$row.'</li>';
    $i = true;
  }
}
print '<div class="row"><div class="span2"><ul>'.$n1.'</ul></div><div class="span2"><ul>'.$n2.'</ul></div></div>';
?>