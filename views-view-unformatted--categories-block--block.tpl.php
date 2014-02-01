<?php 
$n1 = '';

foreach ($rows as $id => $row) {
    $n1 .= '<li>'.$row.'</li>';
}
print '<div class="row"><div class="span2"><ul>'.$n1.'</ul></div>';
?>