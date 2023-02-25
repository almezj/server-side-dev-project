<?php

/*
** @author: Josef Zemlicka
*/

$table_contents = "";
require 'Library/Racquet.php';


$racquets = Racquet::get_racquet_list();

$sortby = $_GET['sortby'] ?? 'ranking';

if ($sortby === 'fname') {
	usort($players, function($a, $b) {
		return $a['first_name'] <=> $b['first_name'];
	});
} elseif ($sortby === 'lname') {
	usort($players, function($a, $b) {
		return $a['last_name'] <=> $b['last_name'];
	});
} elseif ($sortby === 'country') {
	usort($players, function($a, $b) {
		return $a['country'] <=> $b['country'];
	});
} elseif ($sortby === 'ranking') {
	usort($players, function($a, $b) {
		return $a['ranking'] <=> $b['ranking'];
	});
} elseif ($sortby === 'age') {
	usort($players, function($a, $b) {
		return $a['birth_date'] <=> $b['birth_date'];
	});
}

if(isset($_GET['delete'])){
    $player_id = $_GET['delete'];
    echo "<script>
            var confirmDelete = confirm('Are you sure you want to delete this player?');
            if(confirmDelete){
                window.location.href = '?page=players&confirm_delete=' + $player_id;
            }
         </script>";
}

if(isset($_GET['confirm_delete'])){
    $player_id = $_GET['confirm_delete'];
    Player::delete_player($player_id);
    header("Location: ?page=players");
}

foreach($players as $player){
	$player_age = date_diff(date_create($player['birth_date']), date_create('now'))->y;
	$table_row = "";
	$table_row .= "<tr>";
	$table_row .= "<td>" . $player['first_name'] . "</td>";
	$table_row .= "<td>" . $player['last_name'] . "</td>";
	$table_row .= "<td>" . $player['country'] . "</td>";
	$table_row .= "<td>" . $player['ranking'] . "</td>";
	$table_row .= "<td>" . $player['points'] . "</td>";
	$table_row .= "<td>" . $player_age . "</td>";
	$table_row .= "<td>" . $player['birth_date'] . "</td>";
	$table_row .= "<td><a href='?page=players&delete=" . $player['player_id'] . "'>Delete</a></td>";
	$table_row .= "</tr>";
	$table_contents .= $table_row;
}

$htmlstring = $table_contents ? $table_contents : "<tr><td colspan='8'>No players found</td></tr>";

echo $htmlstring;

?>