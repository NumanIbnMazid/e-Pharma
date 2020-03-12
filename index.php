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
						$sql = "SELECT * FROM teachers;";
						
						include_once 'dbCon.php';	
						$con = connect();
						$result = $con->query($sql);
					?>
					
					<?php 
					foreach($result as $row){ ?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?=BASE_URL?>images/uploads/<?=$row['image']?>" alt="">
                            <div class="caption">
                                <h4 class="pull-right price"><?=$row['price']?></h4>
                                <h4><a href="#"><?=$row['name']?></a>
                                </h4>
                                <p><?=$row['description']?> <a target="_blank" href="http://www.daffodil.ac">Daffodil</a>.</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"><button onclick="addToCart(<?=$row['id']?>)" class="btn btn-xs btn-primary btn-add-cart">Add to Cart</button></p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>
					<?php } ?>
                </div>
            </div>
        </div>
	<select name="currencyList" id="currencyList">
		<option value="GBP">GBP</option>
		<option value="USD">USD</option>
		<option value="EUR">EUR</option>
		<option value="BDT">BDT</option>
	</select>
	<input type="hidden" id="fromCurr" value="GBP"/>
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
		
		
		$('#currencyList').change(function(){
			var toCurrency = $(this).val();
			var fromCurr = $('#fromCurr').val();
			$('#fromCurr').val(toCurrency);
			
			$('.price').each(function(){
				var priceObj = $(this);
				var amount = priceObj.html();
				$.ajax({
					url:"currencyConverter.php",
					type:"POST",
					data:{"fromCurr":fromCurr,"toCurr":toCurrency,"amount":amount},
					success:function(data){
						priceObj.html(data);
					}
				});
			});
			

		});
		
	</script>
   <?php	include_once 'template/footer.php'; ?>