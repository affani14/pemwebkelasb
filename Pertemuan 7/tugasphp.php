<?php $a = 50000000;
$b = 16500000;
$c = 9500000;
$d = 5 / 100;
$e = 4.5 / 100;

$sisa = $a - ($b + ($b * $d)) - ($c + ($c * $e));
$tbunga = (($b * $d)) + ($c * $e);
$thutang = ($b + ($b * $d)) + ($c + ($c * $e));

echo "Sisa uang: ";
echo ($sisa) . "<br/>";
echo "Total bunga: ";
echo ($tbunga) . "<br/>";
echo "Total hutang: ";
echo ($thutang) . "<br/>";
