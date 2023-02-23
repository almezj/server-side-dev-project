<?php


/*
** @author: Josef Zemlicka
*/

class Racquet
{

	function __construct()
	{
		global $db;
		$this->db = $db;
	}

	function get_racquet_details($player_id)
	{

		global $db;

		$sql = "SELECT * 
		        FROM racquets 
				WHERE player_id = $player_id";


		$res = $db->query($sql);

		if($db->num_rows($res)){
			while($row = $db->fetch_object($res)){
				$racquet[$row->id]['id'] = $row->id;
				$racquet[$row->id]['player_id'] = $row->player_id;
				$racquet[$row->id]['brand'] = $row->brand;
				$racquet[$row->id]['model'] = $row->model;
				$racquet[$row->id]['head_size'] = $row->head_size;
				$racquet[$row->id]['weight'] = $row->weight;
				$racquet[$row->id]['balance'] = $row->balance;
				$racquet[$row->id]['string_pattern'] = $row->string_pattern;
			}
			return $racquet;
		} else {
			return array();
		}
		
	}

	function get_racquet_list()
	{

		global $db;

		$sql = "SELECT * 
		        FROM racquets";

		$res = $db->query($sql);

		if($db->num_rows($res)){
			while($row = $db->fetch_object($res)){
				$racquet[$row->spec_id]['spec_id'] = $row->spec_id;
				$racquet[$row->spec_id]['player_id'] = $row->player_id;
				$racquet[$row->spec_id]['brand'] = $row->brand;
				$racquet[$row->spec_id]['model'] = $row->model;
				$racquet[$row->spec_id]['head_size'] = $row->head_size;
				$racquet[$row->spec_id]['weight'] = $row->weight;
				$racquet[$row->spec_id]['balance'] = $row->balance;
				$racquet[$row->spec_id]['string_pattern'] = $row->string_pattern;
			}
			return $racquet;
		} else {
			return array();
		}
	}

	function add_racquet($player_id, $brand, $model, $head_size, $weight, $balance, $string_pattern)
	{

		global $db;

		$sql = "INSERT INTO racquets (player_id, brand, model, head_size, weight, balance, string_pattern) 
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

		$stmt = $db->prepare($sql);

		$stmt->bind_param("issssss", $player_id, $brand, $model, $head_size, $weight, $balance, $string_pattern);
		if ($stmt->execute()) {
			return true;
		} else {
			file_put_contents("debugger.txt", $db->error() . "\n", FILE_APPEND);
		}

	}

	function delete_racquet($spec_id)
	{
		global $db;

		$sql = "DELETE FROM racquets 
		        WHERE id = $spec_id";

		if ($db->query($sql)) {
			return true;
		} else {
			file_put_contents("debugger.txt", $db->error() . "\n", FILE_APPEND);
		}
		return false;
	}

}


?>