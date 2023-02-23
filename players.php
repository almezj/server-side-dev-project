<?php
require_once 'header.php';
?>

<main class="container">
	<div class="starter-template text-center">
		<h1>Tennis player database</h1>
		<p class="lead">Search through a database of tennis players</p>
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">First Name</th>
					<th scope="col">Last Name</th>
					<th scope="col">Country</th>
					<th scope="col">Ranking</th>
					<th scope="col">Points</th>
					<th scope="col">DoB</th>
				</tr>
			</thead>
			<tbody>
				<?php
				require_once 'controllers/players_table.php'
				?>
				
			</tbody>
	</div>

</main><!-- /.container -->
<?php
require_once 'footer.php';
?>
<script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>