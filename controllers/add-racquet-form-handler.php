<?php

require __DIR__ . '/../website.php';

require __DIR__ . '/../Library/Racquet.php';

if (!empty($_POST['brand']) && !empty($_POST['model']) && !empty($_POST['head_size']) && !empty($_POST['weight']) && !empty($_POST['string_pattern_left']) && !empty($_POST['string_pattern_right']) && !empty($_POST['usedby'])) {
	$string_pattern = $_POST['string_pattern_left'] . "x" . $_POST['string_pattern_right'];
	Racquet::add_racquet($_POST['usedby'], $_POST['brand'], $_POST['model'], $_POST['head_size'], $_POST['weight'], $string_pattern);
	$response_json = array('type' => 'success', "msg" => "Racquet successfully added!");
	echo json_encode($response_json);
} else {
	$response_json = array('type' => 'error', "msg" => "Racquet not added!");
	echo json_encode($response_json);
}

?>