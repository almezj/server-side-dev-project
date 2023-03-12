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
				$player[$row->player_id]['points'] = $row->points;
				$player[$row->player_id]['birth_date'] = $row->birth_date;
			}
			return $player;
		} else {
			return array();
		}
	}

	static function get_player_details($player_id, $racquet = false){
		global $db;
		$join = $racquet ? '' : 'JOIN racquet_specifications ON players.player_id = racquet_specifications.player_id';
		
		$sql = "SELECT * 
		        FROM players
				${join} 
				WHERE player_id = $player_id";

		$res = $db->query($sql);

		if($db->num_rows($res)){
			while($row = $db->fetch_object($res)){
				$player[$row->player_id]['player_id'] = $row->player_id;
				$player[$row->player_id]['first_name'] = $row->first_name;
				$player[$row->player_id]['last_name'] = $row->last_name;
				$player[$row->player_id]['country'] = $row->country;
				$player[$row->player_id]['points'] = $row->points;
				$player[$row->player_id]['birth_date'] = $row->birth_date;
				if($racquet){
					$player[$row->player_id]['racquet']['id'] = $row->id;
					$player[$row->player_id]['racquet']['player_id'] = $row->player_id;
					$player[$row->player_id]['racquet']['brand'] = $row->brand;
					$player[$row->player_id]['racquet']['model'] = $row->model;
					$player[$row->player_id]['racquet']['head_size'] = $row->head_size;
					$player[$row->player_id]['racquet']['weight'] = $row->weight;
					$player[$row->player_id]['racquet']['string_pattern'] = $row->string_pattern;
				}
			}
			return $player;
		} else {
			file_put_contents("debugger.txt", $db->error() . "\n", FILE_APPEND);
			return array();
		}

	}

	static function delete_player($player_id)
	{
		global $db;

		$sql = "DELETE FROM racquet_specifications 
		        WHERE player_id = $player_id"; 

		if ($db->query($sql)) {	
			$res = $db->query("DELETE FROM players WHERE player_id = $player_id");
			if($res){
				return true;
			} else {
				file_put_contents("debugger.txt", $db->error() . "\n", FILE_APPEND);
			}
		} else {
			file_put_contents("debugger.txt", $db->error() . "\n", FILE_APPEND);
		}
		return false;
	}

	static function delete_player_racquet($player_id){
		global $db;

		$sql = "DELETE FROM racquet_specifications 
		        WHERE player_id = $player_id";

		if ($db->query($sql)) {	
			return true;
		} else {
			file_put_contents("debugger.txt", $db->error() . "\n", FILE_APPEND);
		}
		return false;
	}

	static function add_player($first_name, $last_name, $country, $points, $birth_date){
		global $db;

		$sql = "INSERT INTO players (first_name, last_name, country, points, birth_date) 
		        VALUES (?, ?, ?, ?, ?)";
		
		if ($stmt = $db->prepare($sql)) {
			$stmt->bind_param("sssis", $first_name, $last_name, $country, $points, $birth_date);
			if ($stmt->execute()) {
			  return $db->insert_id();
			} else {
			  file_put_contents("debugger.txt", $db->error() . "\n", FILE_APPEND);
			}
		} else {
			file_put_contents("debugger.txt", $db->error() . "\n", FILE_APPEND);
		}
		return 0;
	}	
}



?>