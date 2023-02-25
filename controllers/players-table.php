<?php


/**
 * @author Josef Zemlicka
**/

$table_contents = "";
require 'Library/Player.php';


$players = Player::get_player_list();
$ranked_players = array();


usort($players, function($a, $b) {
	return $b['points'] <=> $a['points'];
});


foreach ($players as $index => $player) {
    $number = $index + 1;
    $ranked_players[] = array(
        'rank' => $number,
        'fname' => $player['first_name'],
        'lname' => $player['last_name'],
        'points' => $player['points'],
		'country' => $player['country'],
		'birth_date' => $player['birth_date'],
		'player_id' => $player['player_id']
    );
}


$sortby = $_GET['sortby'] ?? 'points';



if ($sortby === 'fname') {
	usort($ranked_players, function($a, $b) {
		return $a['fname'] <=> $b['fname'];
	});
} elseif ($sortby === 'lname') {
	usort($ranked_players, function($a, $b) {
		return $a['lname'] <=> $b['lname'];
	});
} elseif ($sortby === 'points') {
	usort($ranked_players, function($a, $b) {
		return $b['points'] <=> $a['points'];
	});
} elseif ($sortby === 'country') {
	usort($ranked_players, function($a, $b) {
		return $a['country'] <=> $b['country'];
	});
} elseif ($sortby === 'birth_date') {
	usort($ranked_players, function($a, $b) {
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



foreach($ranked_players as $r_player){
	$r_player_age = date_diff(date_create($r_player['birth_date']), date_create('now'))->y;
	$table_row = "";
	$table_row .= "<tr>";
	$table_row .= "<td>" . $r_player['fname'] . "</td>";
	$table_row .= "<td>" . $r_player['lname'] . "</td>";
	$table_row .= "<td>" . $r_player['country'] . "</td>";
	$table_row .= "<td>" . $r_player['rank'] . "</td>";
	$table_row .= "<td>" . $r_player['points'] . "</td>";
	$table_row .= "<td>" . $r_player_age . "</td>";
	$table_row .= "<td>" . $r_player['birth_date'] . "</td>";
	$table_row .= "<td><a href='?page=players&delete=" . $r_player['player_id'] . "'>Delete</a></td>";
	$table_row .= "</tr>";
	$table_contents .= $table_row;
}

$htmlstring = $table_contents ? $table_contents : "<tr><td colspan='8'>No players found</td></tr>";

echo $htmlstring;

?>