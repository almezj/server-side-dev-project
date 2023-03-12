<?php 

//error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/../Library/Player.php';


$players = Player::get_player_list();

$htmlstring = '<select class="form-select" name="usedby" id="player-select" aria-label="Player select">';

$htmlstring .= "<option value=''>Select a player</option>";


foreach ($players as $player){
	$htmlstring .= "<option value='" . $player['player_id'] . "'>" . $player['first_name'] . " " . $player['last_name'] . "</option>";
}

$htmlstring .= "</select>";

echo $htmlstring;

?>