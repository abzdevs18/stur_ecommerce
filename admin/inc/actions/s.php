<?php
parse_str($_POST['quantity'],$a);
parse_str($_POST['product_name'],$b);

// $g = count($a['quantity']);
// for ($c=0; $c < $g ; $c++) { 
// 	$com1 = '';
// 	$com1 = $a['quantity'][$c];
// 	for ($i=0; $i < $g ; $i++) { 
// 		$com2 = '';
// 		$com2 = $b['product_name'][$i];

// 		echo $com1 . $com2 . "\n";
// 	}
// }

$q = array();
$p = array();
$g = count($a['quantity']);
for ($i=0; $i < $g ; $i++) { 
	$r = $a['quantity'][$i];
	$q[] = $r;
}

$s = count($b['product_name']);
for ($ia=0; $ia < $s ; $ia++) { 
	$t = $b['product_name'][$ia];
	$p[]=$t;
}
foreach ($q as $key => $value) {
	echo $value . $p[$key] . "\n";
}

/**/