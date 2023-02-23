<?php

/*
** @author: Josef Zemlicka
*/

class Player
{

	static function get_player_list()
	{

		global $db;

		$sql = "SELECT * 
		        FROM players";

		$res = $db->query($sql);

		if ($db->num_rows($res)) {
			while($row = $db->fetch_object($res)) {
				$player[$row->player_id]['player_id'] = $row->player_id;
				$player[$row->player_id]['first_name'] = $row->first_name;
				$player[$row->player_id]['last_name'] = $row->last_name;
				$player[$row->player_id]['country'] = $row->country;
				$player[$row->player_id]['ranking'] = $row->ranking;
				$player[$row->player_id]['points'] = $row->points;
				$player[$row->player_id]['birth_date'] = $row->birth_date;
			}
			return $player;
		} else {
			return array();
		}
	}

	static function delete_player($player_id)
	{
		global $db;

		$sql = "DELETE FROM players 
		        WHERE id = $player_id";

		if ($db->query($sql)) {
			return true;
		} else {
			file_put_contents("debugger.txt", $db->error() . "\n", FILE_APPEND);
		}
		return false;
	}

	static function add_player($first_name, $last_name, $country, $ranking, $points, $birth_date){

		global $db;

		$sql = "INSERT INTO players (first_name, last_name, ranking, points, birth_date) 
		        VALUES (?, ?, ?, ?, ?, ?)";

		$stmt = $db->prepare($sql);
		$stmt->bind_param("ssiss", $first_name, $last_name, $country, $ranking, $points, $birth_date);

		if ($stmt->execute()) {
			return true;
		} else {
			file_put_contents("debugger.txt", $db->error() . "\n", FILE_APPEND);
		}

		return false;

	}
	
}



?>