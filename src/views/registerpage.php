<?php
/**	Register Page */
?>

<!-- Login Form -->
<div class="container login-form" style="z-index: 999;">
	<div class="row">
		<div class="col-md-6 offset-md-3 formcontainer ">
			<p class="text-center">
				<img src="assets/images/logo.png" class="logo">
			</p>
			<?php
				if( isset($_GET['error'] ) ) {
					echo '<p class="alert alert-danger">'.$_GET['error'].'</p>';
				}
			?>
			<?php
				if( isset($_GET['success'] ) ) {
					echo '<p class="alert alert-success">'.$_GET['success'].'</p>';
				}
			?>
			<form method="post" action="?page=auth&action=register" class="border rounded p-4 border-primary login-form">
				<div class="mb-3">
					<label for="username" class="form-label">Username</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Enter name" required>
				</div>
				<div class="mb-3">
					<label for="email" class="form-label">Email address</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
				</div>
				<div class="mb-3">
					<label for="password" class="form-label">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
				</div>
				<div class="mb-3">
					<label for="c_password" class="form-label">Confirm Password</label>
					<input type="text" class="form-control" id="c_password" name="c_password" placeholder="Confirm Password" required>
				</div>
				<button type="submit" id="signup-btn" name="signup-btn" class="btn btn-primary d-flex justify-content-center">Register</button>
			</form>
			<div class="d-flex justify-content-center">
				Already have an account ?&nbsp; <a href="?page=login">Login</a>
			</div>
		</div>
	</div>
</div>
