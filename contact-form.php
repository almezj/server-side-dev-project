<h1>Contact us</h1>
<form method="POST" name="contactform" id="contact-form" class="needs-validation" novalidate>
	<p>
		<label for="name">Your Name:</label> <br>
		<input type="text" name="name" class="form-control" required>
		<div class="invalid-feedback">
			Please enter your name.
		</div>
	</p>
	<p>
		<label for="email">Email Address:</label> <br>
		<input type="email" name="email" class="form-control" required>
		<div class="invalid-feedback">
			Please enter a valid email address.
		</div>
	</p>
	<p>
		<label for="phone">Phone Number:</label> <br>
		<input type="tel" name="phone" class="form-control" required>
		<div class="invalid-feedback">
			Please enter a valid phone number.
		</div>
	</p>
	<p>
		<label for="message">Message:</label> <br>
		<textarea name="message" class="form-control" required></textarea>
		<div class="invalid-feedback">
			Please enter a message.
		</div>
	</p>
	<input type="submit" value="Submit" class="btn btn-primary"><br>
</form>

<script language="JavaScript">
	$(document).ready(function () {
		$('#contact-form').click(function (e) {
			e.preventDefault();
			var form = $('#contact-form')[0];
			if (form.checkValidity() === false) {
				e.stopPropagation();
			} else {
				var formData = $('#contact-form').serialize();
				console.log(formData);
				$.ajax({
					type: "POST",
					url: "controllers/contact-form-handler.php",
					data: formData,
					dataType: "json",
					success: function (response) {
						console.log(response);
						if (response['type'] == 'success') {
							console.log(response['msg']);
							$('form[name="contactform"]')[0].reset();
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
	});
</script>