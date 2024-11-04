<?php $a=50000000;
$b =16500000;
$c = 9500000;
$d = 5/100;
$e = 4.5/100;

$sisa = $a-($b+($b*$d)) - ($c-($c*$e));
$tbunga = (($b*$d)) + ($c*$e);
$thutang = ($b+($b*$d)) + ($c-($c*$e));

echo "sisa uang:"; echo ($sisa)."<br/>";
echo "$tbunga:"; var_dump($tbunga). "<br/>";
echo "$thutang:"; var_dump($thutang). "<br/>";