
	<?php include_once "template\header.php"; 
		if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){	
	?>
    <!-- Navigation -->
    <?php include_once 'template\nav-bar.php'; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Side Bar -->
			<?php include_once 'template\sidebar.php'; ?>
			<?php
			//User edit
			$id =  $_GET['id'];
				include_once 'dbCon.php';
				$con = connect();

				$sql = "SELECT * FROM `users` WHERE customer_id=$id";
				
				$result = $con->query($sql);
				foreach($result as $user){
					$userName 	= $user['name'];
					$email 		= $user['email'];
					$pass 		= $user['password'];
				}
				?>
            <div class="col-md-5">
				
				<form action="" method="POST">
					<input type="hidden" name="id" value="<?=$id?>" />
				  <div class="form-group">
					<label for="email">Name:</label>
					<input type="text" class="form-control" name="name" id="name" required value="<?=$userName?>" />
				  </div>
				  
				  <div class="form-group">
					<label for="email">Email address:</label>
					<input type="email" class="form-control" name="email" id="email" value="<?=$email?>" />
				  </div>
				  
				  <div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" name="pass" id="pwd" value="<?=$pass?>" />
				  </div>
				  
				  <button type="submit" class="btn btn-default">Update</button>
				</form>
			</div>
			<div class="col-md-4">
			</div>
        </div>

    </div>
    <!-- /.container -->
<?php 

	if($_POST){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$pass = $_POST['pass'];
		$id = $_POST['id'];
		
		$sql = "UPDATE users SET user_name='$name',email='$email',password='$pass'
				WHERE customer_id=$id";
		//echo $sql;exit;		
		include_once 'dbCon.php';	
		$con = connect();
		if ($con->query($sql) === TRUE) {
			echo "New record Updated successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}


	include_once 'template\footer.php'; 
}
?>