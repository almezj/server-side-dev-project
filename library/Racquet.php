<?php


/*
** @author: Josef Zemlicka
*/

class Racquet
{
	static function get_racquet_details($spec_id)
	{

		global $db;

		$sql = "SELECT * 
		        FROM racquet_specifications 
				WHERE spec_id = $spec_id";


		$res = $db->query($sql);

		if($db->num_rows($res)){
			while($row = $db->fetch_object($res)){
				$racquet[$row->spec_id]['spec_id'] = $row->spec_id;
				$racquet[$row->spec_id]['player_id'] = $row->player_id;
				$racquet[$row->spec_id]['brand'] = $row->brand;
				$racquet[$row->spec_id]['model'] = $row->model;
				$racquet[$row->spec_id]['head_size'] = $row->head_size;
				$racquet[$row->spec_id]['weight'] = $row->weight;
				$racquet[$row->spec_id]['string_pattern'] = $row->string_pattern;
			}
			return $racquet;
		} else {
			return array();
		}
		
	}

	static function get_racquet_list($players = false)
	{

		global $db;

		$join = $players ? 'JOIN players ON racquet_specifications.player_id = players.player_id' : ''; 

		$sql = "SELECT * 
		        FROM racquet_specifications
				${join}";

		$res = $db->query($sql);

		if($db->num_rows($res)){
			while($row = $db->fetch_object($res)){
				$racquet[$row->spec_id]['spec_id'] = $row->spec_id;
				$racquet[$row->spec_id]['player_id'] = $row->player_id;
				$racquet[$row->spec_id]['brand'] = $row->brand;
				$racquet[$row->spec_id]['model'] = $row->model;
				$racquet[$row->spec_id]['head_size'] = $row->head_size;
				$racquet[$row->spec_id]['weight'] = $row->weight;
				$racquet[$row->spec_id]['string_pattern'] = $row->string_pattern;
				if($players){
					$racquet[$row->spec_id]['usedby'] = array(
						'first_name' => $row->first_name,
						'last_name' => $row->last_name,
						'country' => $row->country,
						'birth_date' => $row->birth_date
					);
				}
			}
			return $racquet;
		} else {
			return array();
		}
	}

	static function add_racquet($player_id, $brand, $model, $head_size, $weight, $string_pattern)
	{

		global $db;

		$sql = "INSERT INTO racquet_specifications (player_id, brand, model, head_size, weight, string_pattern) 
		        VALUES (?, ?, ?, ?, ?, ?)";

		$stmt = $db->prepare($sql);

		$stmt->bind_param("isssss", $player_id, $brand, $model, $head_size, $weight, $string_pattern);
		if ($stmt->execute()) {
			return true;
		} else {
			file_put_contents("debugger.txt", $db->error() . "\n", FILE_APPEND);
			return false;
		}

	}

	static function delete_racquet($spec_id)
	{
		global $db;

		$sql = "DELETE FROM racquet_specifications 
		        WHERE spec_id = $spec_id";

		if ($db->query($sql)) {
			return true;
		} else {
			file_put_contents("debugger.txt", $db->error() . "\n", FILE_APPEND);
			return false;
		}
	}

}


?>