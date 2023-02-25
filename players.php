<?php
include 'header.php';
?>

<main class="container">
	<div class="starter-template text-center">
		<h1>Tennis player database</h1>
		<p class="lead">Search through a database of tennis players</p>
		<button class="btn btn-primary"><a href="./controllers/player-add-form.php" class="text-white">Add New</a></button>
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col"><a href="?sortby=fname">First Name</a></th>
					<th scope="col"><a href="?sortby=lname">Last Name</a></th>
					<th scope="col"><a href="?sortby=country">Country</a></th>
					<th scope="col"><a href="?sortby=ranking">Ranking</a></th>
					<th scope="col"><a href="#">Points</a></th>
					<th scope="col"><a href="?sortby=age">Age</a></th>
					<th scope="col"><a href="#">DoB</a></th>
				</tr>
			</thead>
			<tbody>
				<?php
				require_once 'controllers/players-table.php'
				?>
			</tbody>
		</table>
	</div>

</main><!-- /.container -->

<?php
include 'footer.php';
?>

<script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>