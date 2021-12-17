<?php 

	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'Shashi@99';
	$dbname = 'userdb'; 

	$connection = mysqli_connect('localhost', 'root', 'Shashi@99', 'userdb');

	// Checking the connection
	if (mysqli_connect_errno()) {
		die('Database connection failed ' . mysqli_connect_error());
	} else {
		echo "success";
	}

?>