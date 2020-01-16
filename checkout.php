<?php
$fullname="";
$email="";
$address="";
$city="";
$province = "";
$postalcode = "";
$errors=array();
//connect to database
$db = mysqli_connect('localhost', 'user','12345','grocerystore');
//if the register button is clicked
if(isset($_POST['sub'])){
	$fullname = ($_POST['fullname']);
	$email = ($_POST['email']);
	$address=($_POST['address']);
	$city = ($_POST['city']);
	$province = ($_POST['state']);
	$postalcode = ($_POST['postal']);
//ensure that form fields are filled properly
if(empty($fullname)){
	array_push($errors, "fullname is required");//add error to errors array
}
if(empty($email)){
	array_push($errors, "email is required");//add error to errors array
}
if(empty($address)){
	array_push($errors, "address is required");//add error to errors array
}
if(empty($city)){
	array_push($errors, "city is required");//add error to errors array
}
if(empty($province)){
	array_push($errors, "province is required");//add error to errors array
}
if(empty($postalcode)){
	array_push($errors, "postalcode is required");//add error to errors array
}
//if there are no errors, save user to database
if(count($errors)==0){
	$password = md5($password_1);//encrypt password before storing in the database(security)
	$sql = "INSERT INTO users(Fullname,email,address,city,province,postalcode)
	               VALUES('$fullname','$email','$address','$city','$province','$postalcode')";
	mysqli_query($db,$sql);		
$_SESSION['username'] = $username;
$_SESSION['success'] = "Please pay with cash upon delivery";
header('location:check.html');//redirect to home page	
}				   
}
?>