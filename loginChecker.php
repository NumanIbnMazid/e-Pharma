<?php 
//Login checker
session_start();
if($_POST){
	
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	
	$sql = "SELECT * FROM `users` 
			WHERE `email`='$email' 
			AND `password`='$pass'";
			
	//echo $sql;exit;
	
	include_once 'dbCon.php';
	
	$con = connect();
	
	$result = $con->query($sql);
	//var_dump($result->num_rows);exit;
	
	if($result->num_rows > 0){
		$_SESSION['isLoggedIn'] = TRUE;
		
		foreach($result as $row){
			$_SESSION['id'] 	= $row['customer_id'];
			$_SESSION['email'] 	= $row['email'];
			$_SESSION['customer_name'] 	= $row['user_name'];
			$_SESSION['role'] 	= $row['user_type'];
		}
		
		//var_dump($_SESSION);exit;
		header('location:index.php');	
		
	}else{
		//remove all session variables
		//session_destroy();
		
		//remove value of all session variables
		session_unset(); 
		$_SESSION['errorMsg'] = 'email or password is wrong';
		header('location:login.php');
		//header('location:login.php?errorMsg=email or password is wrong');
		
	}
}









