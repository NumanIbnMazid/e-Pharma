<?php include_once "template/header.php"; ?>
<?php if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?>
    <!-- Navigation -->
    <?php include_once 'template/nav-bar.php'; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Side Bar -->
			<?php include_once 'template/sidebar.php'; ?>

            <div class="col-md-7">
				<?php
					include_once 'dbCon.php';
					$con = connect();
					$sql = "SELECT * FROM `users`";
					$result = $con->query($sql);
				?>	
			<table class="table table-hover table-condensed">
				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>User Role</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach($result as $r) { ?>
					<tr>
						<td><? =$r['customer_name']?></td>
						<td><?php echo $r['email'];?></td>
						<td><?php echo $userType = ($r['user_type'] == 0)? 'Admin':'Customer'; ?></td>
						<td><a href="userEditForm.php?id=<?=$r['id']?>">Edit</a>,Delete </td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
			

				
			</div>
			<div class="col-md-2">
			</div>
        </div>

    </div>
    <!-- /.container -->
<?php include_once 'template\footer.php'; ?>
<?php } ?>





