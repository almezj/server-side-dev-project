<?php

require __DIR__ . '/../website.php';

require __DIR__ . '/../Library/Player.php';


if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['country']) && !empty($_POST['points']) && !empty($_POST['dob'])){
	Player::add_player($_POST['fname'], $_POST['lname'], $_POST['country'], $_POST['points'], $_POST['dob']);
	$response_json = array('type' => 'success', "msg" => "Player successfully added!");
	echo json_encode($response_json);
} else {
	$response_json = array('type' => 'error', "msg" => "Please fill out all fields.");
	echo json_encode($response_json);
}

?>