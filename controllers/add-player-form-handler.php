<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require __DIR__ . '/../website.php';

require __DIR__ . '/../Library/Player.php';

if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['country']) && !empty($_POST['points']) && !empty($_POST['dob'])){
	Player::add_player($_POST['fname'], $_POST['lname'], $_POST['country'], $_POST['points'], $_POST['dob']);
	echo '<h1 class="text-center text-success">Player succesfully added!</h1>';
	echo '<h2 class="text-center text-success">You will be redirected automatically...</h1>';
	header("Refresh:1; url=../players.php");

} else {
	echo '<h1 class="text-center text-danger">Error! Player not added!</h1>';
	echo '<h2 class="text-center text-danger">You will be redirected automatically...</h1>';
	header("Refresh:1; url=player-add-form.php");
}


?>