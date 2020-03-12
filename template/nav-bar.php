<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=BASE_URL?>index.php">Lindisfarne Safari Park</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
					<li>
                        <a href="<?=BASE_URL?>gellary.php">Gellary</a>
                    </li>
                    <?php if(!isset($_SESSION['role']) || (isset($_SESSION['role'])&& $_SESSION['role'] == 1)){ ?>
					<li>
                        <a href="">Services</a>
                    </li>
                    <li>
                        <a href="<?=BASE_URL?>contact.php">Contact</a>
                    </li>
					<li>
                        <a href="<?=BASE_URL?>order.php">Make Order</a>
                    </li>
					
					<?php } ?>
					
					<li>
                        <a href="<?=BASE_URL?>signup.php">Signup</a>
                    </li>
					 <?php if(isset($_SESSION['role']) && (isset($_SESSION['role'])&& $_SESSION['role'] == 0)){ ?>
						<li>
							<a href="<?=BASE_URL?>userList.php">Users</a>
						</li>
					<?php } ?>
					<li>
						<?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) { ?>
							<a href="<?=BASE_URL?>logout.php">(<?php echo $_SESSION['customer_name'] ?>)Logout</a>
						<?php }else {?>
							<a href="<?=BASE_URL?>login.php">Login</a>
						<?php } ?>
                    </li>
					
					
                </ul>
				<span class="navbar-text pull-right">Cart has <span class="label label-inverse cart">0</span> Items || <button class="btn btn-xs btn-danger" onclick="removeAllProduct();">Remove all product</button></span>
            </div>
            <!-- /.navbar-collapse -->
        </div>
		<script>
			function removeAllProduct(){
				$.ajax({
				   url:"clearCart.php",
				   type:"POST",
				   success:function(data){
					   $('.cart').html(0);
				   }
				});
			}
		</script>
        <!-- /.container -->
    </nav>
