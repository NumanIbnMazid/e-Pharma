
	<?php include_once "template\header.php"; ?>
    <!-- Navigation -->
    <?php include_once 'template\nav-bar.php'; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Side Bar -->
			<?php include_once 'template\sidebar.php'; ?>

            <div class="col-md-5">
				
				<form action="" method="POST">
				  <div class="form-group">
					<label for="email">Name:</label>
					<input type="text" class="form-control" name="name" id="name" required />
				  </div>
				  
				  <div class="form-group">
					<label for="email">Email address:</label>
					<input type="email" class="form-control" name="email" id="email" />
				  </div>
				  
				  <div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" name="pass" id="pwd">
				  </div>
				  <div class="form-group">
					<label for="address">Address:</label>
					<input type="text" class="form-control" name="address" id="address">
				  </div>
				  <div class="form-group">
					<label for="gender">Gender:</label>  <br />
					<input type="radio" name="gender" id="male" value="male" checked /> Male <br />
					<input type="radio" name="gender" id="female" value="female"/> Female <br />
				  </div>
				  <div class="form-group">
					<label for="dob">Date of Birth:</label>
					<input type="date" class="form-control" name="dob" id="dob">
				  </div>
				  <div class="form-group">
					<label for="pcode">Post Code:</label>
					<input type="text" class="form-control" name="pcode" id="pcode">
				  </div>
				  <button type="submit" class="btn btn-default">Submit</button>
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
		$address=$_POST['address'];
		$date_of_birth=$_POST['dob'];
		$gender=$_POST['gender'];
		$postcode=$_POST['pcode'];
		
			$sql = "INSERT INTO users(user_name,email,password,address,date_of_birth,gender,postcode)
				VALUES ('$name','$email','$pass','$address','$date_of_birth','$gender','$postcode');";
				
		$emailsql="SELECT * FROM users Where email=$email";
		include_once 'dbCon.php';
		$con = connect();
		$email= $con->query($emailsql);
		if($email->num_row>0){
			echo "Email already exit";
		}
		
		include_once 'dbCon.php';	
		$con = connect();
		if ($con->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $con->error;
		}
	}


	include_once 'template\footer.php'; 
?>