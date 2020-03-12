<?php 
	session_start();
	if(!isset($_SESSION['count'])) $_SESSION['count'] = 0;
	if(isset($_SESSION['count']))	$_SESSION['count']++;
	
	$_SESSION['products'][] = array('pid'=>$_POST['id'],'qtty'=>1); 
	echo '{"count":'.$_SESSION['count'].'}';exit;