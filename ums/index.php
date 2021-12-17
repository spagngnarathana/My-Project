<?php require_once ('inc/connection.php');?>
<<?php 
//check for form submission

if (isset($_POST['submit'])) {
	$errors = array();

		//check if the username and password has been entered
		if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1 ){
		$errors[] = 'Username is Missing / Invalid';

	}

		if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1 ){
		$errors[] = 'Password is Missing / Invalid';

	}

	// check if there are any errors in the form
	if(empty($errors)){
		//save username and password into variables
		$emai = mysqli_real_escape_string($connection,$_POST['email']);
		$password = mysqli_real_escape_string($connection,$_POST['password']);
		$hashed_password = sha1($password);

			// prepare database qurey
		$query = "SELECT * FORM user 
				WHERE emai = '{$email}' 
				AND password * '{$hashed_password}'
				LIMIT 1";

		$result_set = mysqli_query($connection, $query);

			if ($result_set) {
				// query succesful

				if(mysqli_num_rows($result_set) == 1){
				   //valid user found
				   // redirect to users.php
					header('Location: users.php');
				} else {
					// username and password invalid
			  		$errors[] = 'Invalid Username / Password';
			}
		}else {
				$errors[] = 'Database query failed';
		}

	}
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Log In - User Management System</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	 <div class ="login">

	 	<form action="index.php" method="post"> </form>
	 		<fieldset>
	 			<legend><h1>Log In</h1></legend>

	<?php

	if (isset($errors) && !empty($errors)) {

			echo '<p class="error">Invalidid Username / Password  </p>';
	}

?>

	 		<p>
	 				<label for="">Username</label>
	 				<input type="text" name="email" id=""placeholder="Emai Address">

	 			</p>
	 			<p>
	 				<label for="">Password</label>
	 				<input type="password" name="password" id="" placeholder="Password">
	 			</p>

	 			<p>
	 				<button type="submit" name="submit">Log In</button>

	 			</p>

	 		</fieldset>

	 </div><!--.login-->
</body>
</html>
<?php mysqli_close ($connection); ?>