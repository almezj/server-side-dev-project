<?php
require_once 'header.php';
?>

<section class="hero d-flex align-items-center vh-100">
	<div class="container text-center d-flex align-items-center justify-content-center">
		<div class="col-md-10">
			<h1 class="mainHeading">Welcome to Tennis Database</h1>
			<p class="lead">Looking for a comprehensive tennis player database that also includes racquet information?
				Look no further! Our database is the ultimate resource for avid tennis enthusiasts who want to know
				everything about their favorite players and their racquets.</p>
			<button class="btn btn-primary" onclick="location.href='players.php'">Find Players</button>
		</div>
	</div>
</section>
<section class="cards mb-5 mt-5">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card h-100 mb-3 hover-shadow border">
					<img src="img/nick-kyrgios.jpg" class="card-img-top rounded"
						style="height: 25vh; object-fit: cover;" alt="Nick Kyrgios">
					<div class="card-body text-center">
						<h5 class="card-title">Tennis Players</h5>
						<p class="card-text">Search through a database of tennis players</p>
					</div>
					<div class="card-footer mt-auto text-center">
						<button class="btn btn-primary" onclick="location.href='players.php'">Learn More</button>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card h-100 mb-3 hover-shadow border">
					<img src="img/wilson-bladev8.jpg" class="card-img-top rounded"
						style="height: 25vh; object-fit: cover;" alt="Wilson Blade v8">
					<div class="card-body text-center">
						<h5 class="card-title">Racquet info</h5>
						<p class="card-text">Get to know every detail about the racquets of the best players in the
							world.</p>

					</div>
					<div class="card-footer mt-auto text-center">
						<button class="btn btn-primary" onclick="location.href='racquets.php'">Learn More</button>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card h-100 mb-3 hover-shadow border">
					<img src="img/miami-open.jpg" class="card-img-top rounded" style="height: 25vh; object-fit: cover;"
						alt="Miami Open">
					<div class="card-body text-center">
						<h5 class="card-title">About Us</h5>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ac nisi vel
							risus luctus tincidunt. Fusce a elit vitae metus egestas dapibus.</p>
					</div>
					<div class="card-footer mt-auto text-center">
						<button class="btn btn-primary" onclick="location.href='about-us.php'">Learn More</button>
					</div>
				</div>
			</div>
		</div>
</section>
<!-- Bootstrap JS -->
<script src="js/bootstrap.min.js"></script>

<?php require_once 'footer.php'; ?>
</body>

</html>