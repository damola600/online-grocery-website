<?php
$username="";
$email="";
$errors=array();
//connect to database
$db = mysqli_connect('localhost', 'user','12345','grocerystore');
//if the register button is clicked
if(isset($_POST['register'])){
	$username = ($_POST['username']);
	$email = ($_POST['email']);
	$password_1 = ($_POST['password_1']);
	$password_2 =($_POST['password_2']);
//ensure that form fields are filled properly
if(empty($username)){
	array_push($errors, "username is required");//add error to errors array
}
if(empty($email)){
	array_push($errors, "email is required");//add error to errors array
}
if(empty($password_1)){
	array_push($errors, "password is required");//add error to errors array
}
if($password_1 != $password_2){
	array_push($errors, "the two password do not match");
}
//if there are no errors, save user to database
if(count($errors)==0){
	$password = md5($password_1);//encrypt password before storing in the database(security)
	$sql = "INSERT INTO users(username,email,password)
	               VALUES('$username','$email','$password')";
	mysqli_query($db,$sql);		
$_SESSION['username'] = $username;
$_SESSION['success'] = "You are now logged in";
header('location:homepage.html');//redirect to home page	
}				   
}

// LOGIN USER
if (isset($_POST['signin'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password_1']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: homepage.html');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>