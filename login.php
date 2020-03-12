
	<?php include_once "template\header.php"; ?>
    <!-- Navigation -->
    <?php include_once 'template\nav-bar.php'; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Side Bar -->
			<?php include_once 'template\sidebar.php'; ?>

            <div class="col-md-5">
				
				<form action="loginChecker.php" method="POST">
				  
				  <div class="form-group">
					<label for="email">Email address:</label>
					<input type="email" class="form-control" name="email" id="email" onfocusout="validate_empty();">
				  </div>
				  
				  <div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" name="pass" id="pwd">
				  </div>
				  
				  <button type="submit" class="btn btn-default" onclick="return validate_empty();">Login</button>
				</form>
			</div>
			<div class="col-md-4" id="msg">
				<?php 
					// Passing error message using session 
					if(isset($_SESSION['errorMsg'])){
						echo '<span class="text-danger">'.$_SESSION['errorMsg'].'</span>';
						unset($_SESSION['errorMsg']);
					}
					
					// Passing error message using get request
					if(isset($_GET['errorMsg'])){
						echo $_GET['errorMsg'];
					}
					$a =1;
				?>
			</div>
        </div>

    </div>
    <!-- /.container -->
	<script>
		var a=1;
		var msg;
		//alert(a);
		var msgDiv = document.getElementById('msg');
		
		function validate_empty(){
			a = document.getElementById('email').value;
			if(a==""){ 
				msg = '<span class="text-danger"> Please type your email</span>';
				msgDiv.innerHTML = msg;
				return false;
			}
			else {
				msg = '<span class="text-success">Thank you</span>';
				msgDiv.innerHTML = msg;
				//alert(msg);
				return true;
			}
			return false;
		}
	</script>
<?php 

	include_once 'template\footer.php'; 
?>