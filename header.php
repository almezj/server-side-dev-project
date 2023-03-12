<?php
include_once 'website.php';
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.80.0">
	<title>Tennis site</title>
	<!-- Bootstrap core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="css/mystyle.css" rel="stylesheet">
	<!-- MDB -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />
	<!-- /.container -->
	<script src="js/bootstrap.bundle.min.js"></script>
	<!-- MDB -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
	<!-- Include Font Awesome CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
		crossorigin="anonymous" />
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>

	<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
		<div class="container">
			<a class="navbar-brand" href="index.php" data-mdb-toggle="animation" data-mdb-animation-reset="true"
				data-mdb-animation="fade-in-up">Tennis database</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
				aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="players.php">Players</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="racquets.php">Racquets</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="about-us.php">About us</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>