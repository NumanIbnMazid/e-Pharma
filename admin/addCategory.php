
	<?php include_once "../template/header.php"; ?>
    <!-- Navigation -->
    <?php include_once '../template/nav-bar.php'; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Side Bar -->
			<?php include_once '../template/sidebar.php'; ?>
			<?php 
				if($_POST){
					$name = $_POST['name'];
					
					if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){	
						$sql = "INSERT INTO ticket_category(type_name) VALUES ('$name');";
					}
					include_once '../dbCon.php';	
					$con = connect();
					if ($con->query($sql) === TRUE) {
						$msg= "New record created successfully";
					} else {
						$msg= "Error: " . $sql . "<br>" . $con->error;
					}
				}
			?>
			
            <div class="col-md-5">
				
				<form action="" method="POST">
				  <div class="form-group">
					<label for="cat_name">Ticket Type Name:</label>
					<input type="text" class="form-control" name="name" id="name" required />
				  </div>
				  
				  <button type="submit" class="btn btn-default" onclick="return validate_empty();">Submit</button>
				</form>
			</div>
			<div class="col-md-4" id="msg">
				<?php if(isset($msg)) {echo $msg; unset($msg); }?>
			</div>
        </div>

    </div>
    <!-- /.container -->
	
	<script>
		
		var msgDiv = document.getElementById('msg');
		
		function validate_empty(){
			a = document.getElementById('name').value;
			if(a==""){ 
				msg = '<span class="text-danger"> Please Type Category Name</span>';
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
	
	
	
<?php	include_once '../template/footer.php'; ?>