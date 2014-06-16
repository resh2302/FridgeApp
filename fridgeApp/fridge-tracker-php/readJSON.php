<?php

require_once 'FirePHPCore-0.3.2/lib/FirePHPCore/fb.php';

$string = file_get_contents("food.json");
$list_a= json_decode($string, true);

// echo $allFood;
FB::log($list_a);

foreach ($list_a['items'] as $li) {
	echo 'image = '.$li['image'].'<br/>';
	echo 'image = '.$li['category'].'<br/>';
	foreach ($li['names']['name'] as $names) {
		echo 'names = '.$names.'<br/>';
	}
}

// foreach($allFood as $key => $value) {
//     echo $key;
//     if (gettype($value) == "object") {
//         foreach ($value as $key => $value) {
//         	echo $key;
//         }
//     }
// }

// $iterator = new RecursiveArrayIterator($allFood);
// $i=0;
// while ($iterator->valid()) {

//     if ($iterator->hasChildren()) {
//         // print all children
//         foreach ($iterator->getChildren() as $key => $value) {
//             echo $key . ' : ' . $value[$i] . "\n";
//             $i++;
//         }
//     } else {
//         echo "No children.\n";
//     }

//     $iterator->next();
// }

?>