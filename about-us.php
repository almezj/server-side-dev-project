<?php
require_once 'header.php';
?>

<main class="container">
	<section class="about mt-5">
		<div class="container">
			<div class="row">
				<div class="col-md-6 mt-4">
					<img src="img/about-us-img.jpg" alt="About Image" class="img-fluid">
				</div>
				<div class="col-md-6 text-center">
					<h2>About Us</h2>
					<p class="lead">Welcome to our website, dedicated to providing you with the latest information and insights on tennis players and racquets. We are passionate about this sport and want to share our knowledge with you. Our team of experts includes tennis enthusiasts, coaches, and players who have a wealth of experience and expertise in the field. We strive to bring you the most comprehensive and accurate information on tennis players, their performances, and the equipment they use. Our aim is to help you make informed decisions when it comes to choosing the right racquet for your game or following your favorite players. Whether you're a seasoned pro or a beginner, we've got you covered. Explore our website to learn more about the world of tennis and discover new players and racquets to elevate your game.</p>
				</div>
			</div>
		</div>
	</section>
	<section class="contact-us my-5">
		<div class="container">
			<div class="row d-flex justify-content-center text-center">
				<div class="col-md-6">
					<div class="contact-form-wrapper">
						<?php
						require_once 'contact-form.php';
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
</main><!-- /.container -->

<script src="js/bootstrap.bundle.min.js"></script>

</body>
<?php
require_once 'footer.php';
?>

</html>