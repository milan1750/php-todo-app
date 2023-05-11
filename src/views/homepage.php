<?php
/**
 * Home Page
 */
 ?>

<!-- Navbar -->
<nav class="navbar bg-white p-4">
	<div class="container">
		<span class="navbar-brand mb-0 h1"><img src="https://cdn.pixabay.com/photo/2020/07/01/12/58/icon-5359553_1280.png" class="profile-image">&nbsp;&nbsp;<?php echo $user['username'];?></span>
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
						<label for="Task Title"></label>
						<input type="text" class="form-control" id="add-todo" name="add-todo" placeholder="Enter your todo here"  >
					</div>
					<div class="input-group mb-3">
						<label for="Task Description"></label>
						<input type="text" class="form-control" id="add-todo" name="add-todo" placeholder="Enter your todo here"  >
					</div>
					<div class="form-group">
						<button class="btn btn-primary" name="add-todo-btn" id="add-todo-btn" type="submit">Add Task</button>
					</div>
				</form>
			</div>

			<?php
				if( isset($_GET['error'] ) ) {
					echo '<p class="alert alert-danger">'.$_GET['error'].'</p>';
				}
			?>
			<!-- ./add todo -->
			<div class="row">
				<div class="col-md-8">
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
									<form action="?page=todo&action=status-todo&id=<?php echo $row['id'];?>" method="post" style="margin: 0px;padding: 0px;" class="list-form">
										<!-- <?php if( 'Todo' !== $row['status'] ){ ?>
											<button class="btn btn-primary" name="todo-todo-btn" id="todo-todo-btn" type="  submit">Todo</button>
										<?php } ?>
										<?php if( 'In Progress' !== $row['status'] ){ ?>
											<button class="btn btn-info" name="inp-todo-btn" id="inp-todo-btn" type="  submit">In Progress</button>
										<?php } ?>
										<?php if( 'Complete' !== $row['status'] ){ ?>
											<button class="btn btn-success" name="complete-todo-btn" id="complete-todo-btn" type="  submit">Complete</button>
										<?php } ?> -->
										<button class="btn btn-primary" name="view-todo-btn" id="view-todo-btn" type="submit">View</button>
										<button class="btn btn-danger" name="dlt-todo-btn" id="dlt-todo-btn" type="submit">Delete</button>
									</form>
								</td>
								</tr>
							<?php }?>

						</tbody>
					</table>
					<!-- ./todo table -->
				</div>
				<div class="col-md-4">
					<h4>Completed Task</h4>
					<ul>
						<li>Code and Write validation rules</li>
						<li>CICD pipeline integration</li>
						<li>Login/Register page wireframe design completed</li>
						<li>Home page wireframe design completed</li>
					</ul>
					<h4>Task in Progress</h4>
					<ul>
						<li>Finalizing report</li>
						<li>QA testing for final version</li>
						<li>Video Prepration</li>
					</ul>
				</div>
			</div>



		</div>
	</div>
</div>
