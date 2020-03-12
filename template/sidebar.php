<div class="col-md-3">
	<p class="lead">Lindisfarne Safari Park</p>
	<div class="list-group">
		<?php if(isset($_SESSION['role'])&& $_SESSION['role'] == 0){ ?>
		<a href="<?=BASE_URL?>admin/addCategory.php" class="list-group-item">Add Ticket Category</a>
		<a href="<?=BASE_URL?>admin/addProduct.php" class="list-group-item">Add Ticket</a>
		<a href="<?=BASE_URL?>admin/addItemtoGellary.php" class="list-group-item">Add Gellary</a>
		<a href="<?=BASE_URL?>" class="list-group-item">Order List</a>
		<?php } ?>
		<?php if(isset($_SESSION['role'])&& $_SESSION['role'] == 1){ ?>
		<a href="#" class="list-group-item">Category 3</a>
		<?php } ?>
	</div>
</div>