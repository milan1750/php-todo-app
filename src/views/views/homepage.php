<?php
/**
 * Home Page
 */
 ?>

<!-- Navbar -->
<nav class="navbar">
	<div class="container">
		<span class="navbar-brand mb-0 h1"><?php echo $user['username'];?></span>
		<div class="d-flex justify-content-end logout-btn"><a href="?page=logout"><img src="assets/images/logout.png" class="logout-image"></a></div>
	</div>
</nav>
<!-- ./Navbar -->

<!-- Todo section  -->
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-md-2">
			<!-- add todo -->
			<div id="add-btn" class=" d-flex justify-content-center mt-5">
					<span  class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Todo</span>
			</div>
			<div id="add-todo-form" class="mt-5">
				<form action="?page=todo&action=add-todo" method="post" >
					<div class="input-group mb-3">
						<input type="text" class="form-control" id="add-todo" name="add-todo" placeholder="Enter your todo here"  >
						<button class="btn btn-primary" name="add-todo-btn" id="add-todo-btn" type="submit">Add</button>
					</div>
				</form>
			</div>

			<?php
				if( isset($_GET['error'] ) ) {
					echo '<p class="alert alert-danger">'.$_GET['error'].'</p>';
				}
			?>
			<!-- ./add todo -->

			<!-- todo table -->
			<table class="table border rounded mt-5 table-striped todo-table">
				<thead>
					<tr>
					<th scope="col">#</th>
					<th class="text-center" scope="col">Tasks</th>
					<th>Status</th>
					<th class="text-center" scope="col">
						Actions
					</th>
					</tr>
				</thead>
				<tbody>
					<?php $sno = 1; foreach( $todos as $row ){?>
						<tr>
						<th scope="row" ><?php echo $sno++;?></th>
						<td class="text-center">
							<div class="task-list">
								<?php echo $row['tasks'];?>
							</div>
						</td>
						<td>
								<?php
								switch ($row['status']) {
									case 'Complete':
										$badge_color = 'success';
										break;
									case 'Todo':
										$badge_color = 'primary';
										break;
									case 'In Progress':
										$badge_color = 'info';
										break;
									default:
										$badge_color = 'primary';
										break;
								}
								?>
							<?php echo '<span class="btn btn-'.$badge_color.'">'. ( ! empty($row['status']) ? $row['status'] : 'Pending' ) . '</span>'; ?>
						</td>
						<td >
							<form action="?page=todo&action=status-todo&id=<?php echo $row['id'];?>" method="post" style="margin: 0px;padding: 0px;">
									<?php if( 'Todo' !== $row['status'] ){ ?>
									<button class="btn btn-primary" name="todo-todo-btn" id="todo-todo-btn" type="  submit">Todo</button>
								<?php } ?>
								<?php if( 'In Progress' !== $row['status'] ){ ?>
									<button class="btn btn-info" name="inp-todo-btn" id="inp-todo-btn" type="  submit">In Progress</button>
								<?php } ?>
								<?php if( 'Complete' !== $row['status'] ){ ?>
									<button class="btn btn-success" name="complete-todo-btn" id="complete-todo-btn" type="  submit">Complete</button>
								<?php } ?>
								<button class="btn btn-danger" name="dlt-todo-btn" id="dlt-todo-btn" type="submit">Delete</button>
							</form>
						</td>
						</tr>
					<?php }?>

				</tbody>
			</table>
			<!-- ./todo table -->
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$( "#add-btn" ).click(function() {
				$("#add-todo-form").toggle();
		});
	});
</script>
