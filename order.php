
	<?php include_once "template/header.php"; ?>
	<?php 
		if(!isset($_SESSION['isLoggedIn'])){ 
			header('location:login.php');
		}
	?>
    <!-- Navigation -->
    <?php include_once 'template/nav-bar.php'; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Side Bar -->
			<?php include_once 'template/sidebar.php'; ?>

			<?php 
				if($_POST){		
					$ticket_id 	= $_POST['ticket_id'];
					// $qtty 			= $_POST['qtty'];
					$order_total 	= $_POST['grand_total'];
					$userId			= $_SESSION['id'];
					$dateOfPurchase = date('Y-m-d H:i:s');
					$dateofvisit	= $_POST['date'];
					//echo $dateOfPurchase;exit;
					//print_r($productid);exit;
					
					//echo $_SESSION['id']; exit;
					
					$sql = "INSERT INTO orders(order_total,date_of_purchase,date_of_visit,customer_id)
						VALUES ($order_total,'$dateOfPurchase','$dateofvisit',$userId);";
					//echo $sql; exit;
					include_once 'dbCon.php';	
					$con = connect();
					if ($con->query($sql) === TRUE) {
						$msg= "New record created successfully <br>";
					} else {
						$msg= "Error: " . $sql . "<br>" . $con->error;
					}
					
					$orderId = $con->insert_id;
					//echo $orderId;exit;
					 foreach($ticket_id as $id => $qtty){
						
						if($qtty >0){
							$sql = "SELECT * FROM ticket_details WHERE id = $id";
						
							$ticket = $con->query($sql);
							foreach($ticket as $pd){
								$singleticket = $pd;
							}
								
							//print_r($singleProduct); 
							$unit_price = $singleticket['price'];
							$sub_total = $unit_price * $qtty;
							$sql = "INSERT INTO order_details(order_id,ticket_id,unit_price,order_quentity,sub_total) 
							VALUES ($orderId,$id,$unit_price,$qtty,$sub_total)";
							$con->query($sql);
						}
					}
					//$qtty = $_POST['qtty'];
					include 'mailSender.php';
					$mail->Body = 'Dear '.$_SESSION['customer_name'].',\nYour Order Successfully Received.\n 
									Order Price: '.$order_total;
					$mail->addAddress($_SESSION['email'], $_SESSION['customer_name']);
	
					if(!$mail->send()) {
						echo 'Sorry The mail not sent';exit;
					}
					
				}
				
				// Get all category from database to show in drop down 
				$sql = "SELECT * FROM ticket_details;";
				
				include_once 'dbCon.php';	
				$con = connect();
				$result = $con->query($sql);
					
			?>
			
            <div class="col-md-5">
				
				<form action="" method="POST"  enctype="multipart/form-data">
				
					<?php foreach($result as $row){ ?>
						<div class="form-group">
							<label for="email"><?=$row['name']?>--(<span class="price"><?=$row['price']?></span>)GBP</label>
							<select name="ticket_id[<?=$row['id']?>]" class="form-control qtty" price="<?=$row['price']?>" >
								<option >0</option> 
								<option >1</option> 
								<option >2</option> 
								<option >3</option> 
								<option >4</option> 
							</select>
						</div>
					<?php } ?>
					<div class="form-group">
						<label for="date">Date of Visit</label>
						<input type="date" name="date" />
					</div>
					<input type="hidden" name="grand_total" class="gt" />
				  <button type="submit" class="btn btn-info">Submit</button>
				</form>
			</div>
			<div class="col-md-4">
				<h1>Grand Total: <span class="grand_total">0</span></h1>
				<?php if(isset($msg)) {echo $msg; unset($msg); }?>
			</div>
        </div>

    </div>
	
	
    <!-- /.container -->
<?php	include_once 'template/footer.php'; ?>

<script>
	/*
		function calculate(){
			$('.qtty').
			var qtty = obj.val();
			var price = obj.attr('price');
			var subTotal = price * qtty;
			var grandTotal = parseInt($('.grand_total').html());
			//$('.grand_total').html('')
			grandTotal = grandTotal + subTotal;
			$('.grand_total').html(grandTotal);
			//alert(subTotal);
		}
	*/	
		$(document).ready(function(){
			$(".qtty").change(function(){
				var grandTotal = 0;
				$('.qtty').each(function() {
					var qtty = $(this).val();
					var price = $(this).attr('price');
					var subTotal = price * qtty;
					grandTotal = grandTotal + subTotal;
				});
				$('.grand_total').html(grandTotal);
				$('.gt').val(grandTotal);
			});
		});
	</script>
	
	
	