<?php
require_once 'header.php';
?>

<main class="container">
	<div class="starter-template text-center">
		<div class="top-content-wrapper my-5">
			<h1>Tennis player database</h1>
			<p class="lead">Search through a database of tennis players</p>
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-player-modal">Add
				new</button>
		</div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col"><a href="?sortby=fname">First Name  <i class="fa fa-sort" aria-hidden="true"></i></a></th>
					<th scope="col"><a href="?sortby=lname">Last Name  <i class="fa fa-sort" aria-hidden="true"></i></a></th>
					<th scope="col"><a href="?sortby=country">Country  <i class="fa fa-sort" aria-hidden="true"></i></a></th>
					<th scope="col"><a href="?sortby=ranking">Ranking  <i class="fa fa-sort" aria-hidden="true"></i></a></th>
					<th scope="col"><a href="#">Points</a></th>
					<th scope="col"><a href="?sortby=age">Age  <i class="fa fa-sort" aria-hidden="true"></i></a></th>
					<th scope="col"><a href="#">DoB</a></th>
				</tr>
			</thead>
			<tbody>
				<?php
				require_once 'controllers/players-table.php';
				?>
			</tbody>
		</table>
	</div>
	<div class="modal fade" id="add-player-modal" tabindex="-1" role="dialog" aria-labelledby="modal-h1"
		aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title" id="modal-h1">Add a new player to the database</h1>
					<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form name="addplayerform" id="add-player-form" class="needs-validation" novalidate>
						<div class="form-group">
							<label class="form-label" for='fname'>First Name:</label>
							<input class="form-control" type="text" name="fname" required>
							<div class="invalid-feedback">
								Please enter a first name.
							</div>
						</div>
						<div class="form-group">
							<label class="form-label" for='lname'>Last Name:</label>
							<input class="form-control" type="text" name="lname" required>
							<div class="invalid-feedback">
								Please enter a last name.
							</div>
						</div>
						<div class="form-group">
							<label class="form-label" for='country-select'>Country:</label>
							<?php require_once 'controllers/countries-select.php'; ?>
						</div>
						<div class="form-group">
							<label class="form-label" for='points'>Points:</label>
							<input class="form-control" type="number" name="points" required>
							<div class="invalid-feedback">
								Please enter the number of points.
							</div>
						</div>
						<div class="form-group">
							<label class="form-label" for='dob'>Date of Birth:</label>
							<input class="form-control" type="date" name="dob" required>
							<div class="invalid-feedback">
								Please enter a date of birth.
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" id="form-submit-btn">Submit</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</main><!-- /.container -->

<script src="js/bootstrap.bundle.min.js"></script>

<script>
	$(document).ready(function () {
		$('#form-submit-btn').click(function (e) {
			e.preventDefault();
			var form = $('#add-player-form')[0];
			if (form.checkValidity() === false) {
				e.stopPropagation();
			} else {
				var formData = $('#add-player-form').serialize();
				console.log(formData);
				$.ajax({
					type: "POST",
					url: "controllers/add-player-form-handler.php",
					data: formData,
					dataType: "json",
					success: function (response) {
						console.log(response);
						if (response['type'] == 'success') {
							console.log(response['msg']);
							$('#add-player-modal').modal('hide');
							$('.modal-backdrop').hide();
							$('form[name="addplayerform"]')[0].reset();
						} else {
							console.log(response);
						}
					},
					error: function (response) {
						console.log(response);
					}
				});
			}
			form.classList.add('was-validated');
		});
		$('#add-player-modal').on('hidden.bs.modal', function () {
			var form = $('#add-player-form')[0];
			if (form.classList.contains('was-validated')) {
				form.classList.remove('was-validated');
				location.reload();
			}
		});
	});

</script>

<?php require_once 'footer.php'; ?>
</body>

</html>