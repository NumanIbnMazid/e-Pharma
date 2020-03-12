
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
					// Start of code to upload file
					$target_dir = "../images/gellary/";
					$fileName = basename($_FILES["fileToUpload"]["name"]);
					$target_file = $target_dir . $fileName;
					$uploadOk = 1;
					$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
					
					// Check if image file is a actual image or fake image
					$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
					if($check !== false) {
						$msg = "File is an image - " . $check["mime"] . ".";
						$uploadOk = 1;
					} else {
						$msg = "File is not an image.";
						$uploadOk = 0;
					}
					
					// Check if file already exists
					if (file_exists($target_file)) {
						$msg = "Sorry, file already exists.";
						$uploadOk = 0;
					}
					
					// Check file size
					if ($_FILES["fileToUpload"]["size"] > 500000) {
						$msg = "Sorry, your file is too large.";
						$uploadOk = 0;
					}
					
					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
						$msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
						$uploadOk = 0;
					}
					
					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
						$msg = "Sorry, your file was not uploaded.";
					// if everything is ok, try to upload file
					} else {
						if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
							$msg = "The file ". $fileName. " has been uploaded.";
						} else {
							$msg = "Sorry, there was an error uploading your file.";
						}
					}
					// =========End of file upload======	
					
					if($uploadOk == 1) {
										
						
						
						$description 	= $_POST['description'];
						
						$sql = "INSERT INTO gelary(image,description)
							VALUES ('$fileName','$description');";
						
						include_once '../dbCon.php';	
						$con = connect();
						if ($con->query($sql) === TRUE) {
							$msg= "New record created successfully <br>".$msg;
						} else {
							$msg= "Error: " . $sql . "<br>" . $con->error;
						}
					}
				}
				
				// Get all category from database to show in drop down 
				$sql = "SELECT * FROM category;";
				
				include_once '../dbCon.php';	
				$con = connect();
				$result = $con->query($sql);
					
			?>
			
            <div class="col-md-5">
				
				<form action="" method="POST"  enctype="multipart/form-data">
					
					  
					  
					
					
					<div class="form-group">
						<label for="qtty">Gellary Image:</label>
						<input type="file" name="fileToUpload" id="fileToUpload">
					</div>
					<div class="form-group">
						<label for="qtty">Gellary Description:</label>
						<textarea name="description" id="description" style="margin: 0px; width: 461px; height: 80px;"></textarea>
						
					</div>
				  <button type="submit" class="btn btn-info">Submit</button>
				</form>
			</div>
			<div class="col-md-4">
				<?php if(isset($msg)) {echo $msg; unset($msg); }?>
			</div>
        </div>

    </div>
    <!-- /.container -->
<?php	include_once '../template/footer.php'; ?>