<?php

// Check for the existence of autoloader file.

use Todo\Todo;

if ( ! file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	echo 'Requires autoloader files to work properly. Run <code>composer update</code> from root directory.';
	exit(1);
}

/**
 * Include the autoloader.
 */
require_once dirname( __FILE__ ) . '/vendor/autoload.php';

/**
 * Main instance of TODO.
 *
 * Returns the main instance of TODO to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return Todo
 */
function todo() {
	return Todo::instance();
}

session_start();

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Todo App</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <div class="box">
			<?php

			// Global for backwards compatibility.
			$GLOBALS['todo'] = todo();
			?>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="viewModalLabel">Project Work - Software Engineering</h5>
			</div>
			<div class="modal-body">
				<div class="form-group mt-2">
					<label for="">Description</label>
					<textarea class="form-control" name="" id="" cols="30" rows="10">Need to submit project report before the deadline</textarea>
				</div>
				<div class="form-group mt-2">
					<label for="">Status</label>
					<select name="" id="" class="form-control">
						<option value="">Todo</option>
						<option value="">In Progress</option>
						<option value="">Complete</option>
					</select>
				</div>
				<div class="form-group mt-2">
					<label for="">Deadline</label>
					<input type="date" class="form-control" value="12/05/2023">
				</div>
				<div class="form-group mt-2">
					<input type="checkbox">
					<label for="">Enable Notification</label>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
			</div>
		</div>
		</div>
        <!-- ./Signup Form -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

		<script>
			$(document).ready(function(){
				$( "#add-btn" ).click(function() {
						$("#add-todo-form").toggle();
				});

				$( '.list-form' ).on( 'click', '#view-todo-btn', function(e){
					e.preventDefault();
					$('#viewModal').modal('toggle');
				})
			});
		</script>
    </body>
</html>
