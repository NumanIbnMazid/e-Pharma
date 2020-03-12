<?php
	//Include dB connection file
	include_once '../dbCon.php';
	//Create connection object without database name;
	$con = connect(FALSE);

	//SQL to drop database;
	$sqlToCreateDB = "DROP DATABASE IF EXISTS e_pharma;";
	if ($con->query($sqlToCreateDB) === TRUE) {
		echo "Database droped successfully<br>";
	} else {
		echo "Error: " . $sqlToCreateDB . "<br>" . $con->error. "<br>";
	}

	//SQL to create database;
	$sqlToCreateDB = "CREATE DATABASE e_pharma;";
	if ($con->query($sqlToCreateDB) === TRUE) {
		echo "Database created successfully<br>";
	} else {
		echo "Error: " . $sqlToCreateDB . "<br>" . $con->error. "<br>";
	}
	
	//Creating connection object with database name;
	$con = connect();
	
	//SQL to create table users
	$sql = "CREATE TABLE IF NOT EXISTS `users` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `name` varchar(30) NOT NULL,
	  `user_type` int(11) NOT NULL DEFAULT '1' COMMENT '0- Admin, 1-Customer',
	  `email` varchar(70) NOT NULL,
	  `password` varchar(15) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;";

	if ($con->query($sql) === TRUE) {
		echo "users table created successfully<br>";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error. "<br>";
	}
	
	$sql = "INSERT INTO `e_pharma`.`users` 
	(`name`, `user_type`, `email`, `password`) 
	VALUES 
	('Admin', '0', 'admin@e-pharma.com', '123');";

	if ($con->query($sql) === TRUE) {
		echo "user admin created successfully<br>
		email: admin@e-pharma.com<br>password:123<br>";
	} else {
		echo "Error: " . $sql . "<br>" . $con->error. "<br>";
	}

