<?php
require_once 'header.php';
?>

<main class="container">
	<div class="starter-template text-center">
		<div class="top-content-wrapper my-5">
			<h1>Tennis player racquet database</h1>
			<p class="lead">Search through a database of racquets used by professional tennis players</p>
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-racquet-modal">Add
				new</button>
		</div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col"><a href="?sortby=brand">Brand  <i class="fa fa-sort" aria-hidden="true"></i></a></th>
					<th scope="col"><a href="?sortby=model">Model  <i class="fa fa-sort" aria-hidden="true"></i></a></th>
					<th scope="col"><a href="?sortby=head_size">Head Size  <i class="fa fa-sort" aria-hidden="true"></i></a></th>
					<th scope="col"><a href="?sortby=weight">Weight  <i class="fa fa-sort" aria-hidden="true"></a></i></th>
					<th scope="col"><a href="#">String Pattern</a></th>
					<th scope="col"><a href="#">Used by</a></th>
				</tr>
			</thead>
			<tbody>
				<?php
				require_once 'controllers/racquets-table.php'
					?>
			</tbody>
		</table>
	</div>
	<div class="modal fade" id="add-racquet-modal" tabindex="-1" role="dialog" aria-labelledby="modal-h1"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title" id="modal-h1">Add a new racquet to the database</h1>
					<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form name="addracquetform" id="add-racquet-form" class="needs-validation" novalidate>
						<div class="form-group">
							<label class="form-label" for='brand'>Brand:</label>
							<input class="form-control" type="text" name="brand" required>
							<div class="invalid-feedback">
								Please enter a brand name.
							</div>
						</div>
						<div class="form-group mt-5">
							<label class="form-label" for='model'>Model:</label>
							<input class="form-control" type="text" name="model" required>
							<div class="invalid-feedback">
								Please enter a model name.
							</div>
						</div>
						<div class="form-group mt-5">
							<label class="form-label" for='head_size'>Head Size:</label>
							<input class="form-control" type="number" name="head_size" required>
							<div class="invalid-feedback">
								Please enter the head size.
							</div>
						</div>
						<div class="form-group mt-5">
							<label class="form-label" for='weight'>Weight:</label>
							<input class="form-control" type="number" name="weight" required>
							<div class="invalid-feedback">
								Please enter the weight.
							</div>
						</div>
						<div class="form-group mt-5">
							<label class="form-label" for='weight'>String Pattern:</label>
							<div class="input-group">
								<input type="text" class="form-control" id="string-pattern-left"
									name="string_pattern_left" maxlength="2" required>
								<span class="input-group-addon">x</span>
								<input type="text" class="form-control" id="string-pattern-right"
									name="string_pattern_right" maxlength="2" required>
								<div class="invalid-feedback">
									Please enter the string pattern.
								</div>
							</div>
						</div>
						<div class="form-group mt-5">
							<label class="form-label" for='player-select'>Used by:</label>
							<?php require_once 'controllers/player-select.php'; ?>
						</div>
						<div class="form-group">
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary" id="form-submit-btn">Submit</button>
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							</div>
					</form>
				</div>
			</div>
		</div>
</main><!-- /.container -->

<?php
include 'footer.php';
?>


<script src="js/bootstrap.bundle.min.js"></script>

<script>
	$(document).ready(function () {
		$('#form-submit-btn').click(function (e) {
			e.preventDefault();
			var form = $('#add-racquet-form')[0];
			if (form.checkValidity() === false) {
				e.stopPropagation();
			} else {
				var formData = $('#add-racquet-form').serialize();
				console.log(formData);
				$.ajax({
					type: "POST",
					url: "controllers/add-racquet-form-handler.php",
					data: formData,
					dataType: "json",
					success: function (response) {
						console.log(response);
						if (response['type'] == 'success') {
							console.log(response['msg']);
							$('#add-racquet-modal').modal('hide');
							$('.modal-backdrop').hide();
							$('form[name="addracquetform"]')[0].reset();
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
		$('#add-racquet-modal').on('hidden.bs.modal', function () {
			var form = $('#add-racquet-form')[0];
			if (form.classList.contains('was-validated')) {
				form.classList.remove('was-validated');
				location.reload();
			}
		});

		var playerSelect = document.getElementById("player-select");

		$('#add-racquet-modal').on('shown.bs.modal', function () {
			playerSelect.setCustomValidity('Please select a player.');
		});

		playerSelect.addEventListener('change', function () {
			if (playerSelect.value == '') {
				playerSelect.setCustomValidity('Please select a player.');
			} else {
				playerSelect.setCustomValidity('');
			}
		});
	});

</script>
</body>

</html>