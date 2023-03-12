<?php

/*
** @author: Josef Zemlicka
*/

$table_contents = "";
require 'Library/Racquet.php';


$racquets = Racquet::get_racquet_list(true);

$sortby = $_GET['sortby'] ?? 'brand';

if ($sortby === 'brand') {
	usort($racquets, function($a, $b) {
		return $a['brand'] <=> $b['brand'];
	});
} elseif ($sortby === 'model') {
	usort($racquets, function($a, $b) {
		return $a['model'] <=> $b['model'];
	});
} elseif ($sortby === 'head_size') {
	usort($racquets, function($a, $b) {
		return $a['head_size'] <=> $b['head_size'];
	});
} elseif ($sortby === 'weight') {
	usort($racquets, function($a, $b) {
		return $a['weight'] <=> $b['weight'];
	});
} elseif ($sortby === 'string_pattern') {
	usort($racquets, function($a, $b) {
		return $a['string_pattern'] <=> $b['string_pattern'];
	});
}

if(isset($_GET['delete'])){
    $spec_id = $_GET['delete'];
	$racquet = Racquet::get_racquet_details($spec_id);
    echo "<script>
            var confirmDelete = confirm('Are you sure you want to delete this racquet?');
            if(confirmDelete){
                window.location.href = '?page=racquets&confirm_delete=' + $spec_id;
            }
         </script>";
}

if(isset($_GET['confirm_delete'])){
    $spec_id = $_GET['confirm_delete'];
    Racquet::delete_racquet($spec_id);
    header("Location: ?page=racquets");
}

if(isset($_GET['edit'])){
	$spec_id = $_GET['edit'];
	header("Location: ?page=racquets&edit_racquet=" . $spec_id);
}


foreach($racquets as $racquet){
	$player_abbrv_name = substr($racquet['usedby']['first_name'], 0, 1) . ". " . $racquet['usedby']['last_name'];
	$table_contents .= "<tr>";
	$table_row = "";
	$table_row .= "<td>" . $racquet['brand'] . "</td>";
	$table_row .= "<td>" . $racquet['model'] . "</td>";
	$table_row .= "<td>" . $racquet['head_size'] . 'in<sup>2</sup>' . "</td>";
	$table_row .= "<td>" . $racquet['weight'] . 'g' . "</td>";
	$table_row .= "<td>" . $racquet['string_pattern'] . "</td>";
	$table_row .= "<td>" . $player_abbrv_name . "</td>";
	$table_row .= "<td><a href='?page=racquets&delete=" . $racquet['spec_id'] . "'><i class='fas fa-trash-alt'></i></a></td>";
	$table_contents .= $table_row;
}

$htmlstring = $table_contents ? $table_contents : "<tr><td colspan='8'>No racquets found</td></tr>";

echo $htmlstring;

?>