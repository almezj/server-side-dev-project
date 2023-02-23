<?php


/*
** @author: Josef Zemlicka
*/

$table_contents = "";
require 'Library/Player.php';


$players = Player::get_player_list();

foreach($players as $player){
	$table_row = "";
	$table_row .= "<tr>";
	$table_row .= "<td>" . $player['first_name'] . "</td>";
	$table_row .= "<td>" . $player['last_name'] . "</td>";
	$table_row .= "<td>" . $player['country'] . "</td>";
	$table_row .= "<td>" . $player['ranking'] . "</td>";
	$table_row .= "<td>" . $player['points'] . "</td>";
	$table_row .= "<td>" . $player['birth_date'] . "</td>";
	$table_row .= "<td><a href='?page=players&delete=" . $player['player_id'] . "'>Delete</a></td>";
	$table_row .= "</tr>";
	$table_contents .= $table_row;
}

$htmlstring = $table_contents ? $table_contents : "<tr><td colspan='8'>No players found</td></tr>";

echo $htmlstring;

?>