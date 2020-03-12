	<?php include_once "template\header.php"; ?>
    <!-- Navigation -->
    <?php include_once 'template\nav-bar.php'; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <!-- Side Bar -->
			<?php include_once 'template\sidebar.php'; ?>

            <div class="col-md-9">
				<?php include_once 'template\slider.php'; ?>
                
                <div class="row">
					<?php 
						// Get all products from database to show 
						$sql = "SELECT * FROM gelary;";
						
						include_once 'dbCon.php';	
						$con = connect();
						$result = $con->query($sql);
					?>
					
					<?php 
					foreach($result as $row){ ?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?=BASE_URL?>images/gellary/<?=$row['image']?>" alt="">
                            <div class="caption">
                                <p><?=$row['description']?> </p>
                            </div>
                        </div>
                    </div>
					<?php } ?>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->
	<script>
		function addToCart(id){
			//$('#btn_save').hide();
			//$('#btn_update').show();
			
			$.ajax({
			   url:"addToCart.php",
			   type:"POST",
			   data:{"id":id,},
			   success:function(data){
				   //alert(data);
				   var count = $.parseJSON(data);
				   $('.cart').html(count.count);
				   //$('#name').val(category[0].name);
				   //$('#desc').val(category[0].description);
				   //$('#parentid').val(category[0].parent_category_id);
			   }
			});
		}
			
		
	</script>
   <?php	include_once 'template/footer.php'; ?>