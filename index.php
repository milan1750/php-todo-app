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
        <!-- ./Signup Form -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
