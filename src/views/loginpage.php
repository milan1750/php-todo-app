<?php
/**
 * Login Page View.
 */
?>

<!-- Login Form -->
<div class="container login-form" style="z-index: 999;">
	<div class="row">
		<div class="col-md-6 offset-md-3 formcontainer">
			<p class="text-center">
				<img src="assets/images/logo.png" class="logo">
			</p>
			<?php
				if( isset($_GET['error'] ) ) {
					echo '<p class="alert alert-danger">'.$_GET['error'].'</p>';
				}
			?>
			<form method="post" action="?page=auth&action=login" class="border rounded p-4 border-primary login-form">
				<div class="mb-3">
					<label for="login_email" class="form-label">Email</label>
					<input type="email" class="form-control" id="login_email" name="login_email" required>
				</div>
				<div class="mb-3">
					<label for="login_password" class="form-label">Password</label>
					<input type="password" class="form-control" id="login_password" name="login_password" required>
				</div>
				<div class="d-flex justify-content-end">
					<a href="">Forget Password</a>
				</div>
				<button type="submit" name="login-btn" id="login-btn" class="btn btn-primary">Login</button>
			</form>
				<div class="d-flex justify-content-center">
				Don't have an account ?&nbsp;<a href="?page=register">Register hew account</a>
			</div>
		</div>
	</div>
</div>
