
<?php include('server.php');?>
<!DOCTYPE html>
<html>
<head>
<title>User registration</title>
<link rel = "stylesheet" type = "text/css" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="register.css">
</head>
<center><a href = "homepage.html"> <img src = "Images/storelogo.jpg" alt = "Damola & Partners Fine Grocers Logo" id="logo"> </a></center>
<body>
<!-- Navbar -->
<nav class= "navbar navbar-expand-lg" role = "navigation">
		<!-- Navbar brand that is the button that takes us back to the homepage-->
	<a class = "navbar-brand mb-0 h1" href = "homepage.html"> Damola & Partners </a>
		<!-- as the screen gets smaller, the navbar becomes a little hamburger menu to reveal the remaining contents of the navbar-->
	<button class = "navbar-toggler navbar-dark" type = "button" data-toggle = "collapse" data-target = "#navbarSupportedContent" aria-controls = "navbarSupportedContent" aria-expanded = "false" aira-label = "Toggle navigation"> <span class = "navbar-toggler-icon"></span></button>
	<div class = "collapse navbar-collapse" id = "navbarSupportedContent">
		<div class = "container">
			<!-- the actual navbar contents, every list item is a link-->
			<div class = "navbar-nav justify-content-between">
			<ul class = "navbar-nav">
				<!-- the My Rewards page, so sign up/login page -->
				<li class = "nav-item">
					<a class = "nav-link" href = "register.php" active> My Rewards </a>
				</li>
				<!-- Food Dropdown menu -->
				<li class = "nav-item dropdown"> 
					<a class = "nav-link dropdown-toggle" href = "#" id = "dropdown" role = "button" data-toggle = "dropdown" aria-haspopup = "true" aria-expanded = "false" active> Food </a>
					<div = class  = "dropdown-menu" aria-labelledby = "navbarDropdown">
						<!-- link to produce page -->
						<a class = "dropdown-item" href = "produce.html"> Produce </a>
						<!-- link to frozen page-->
						<a class = "dropdown-item" href = "frozen.html"> Frozen </a>
						<!-- link to bakery page -->
						<a class = "dropdown-item" href = "bakery.html"> Bakery </a>
					</div>
				</li>
			</ul>
			<span class = "navbar-nav" id = "nav-right">
				<!-- my cart, use document.getElementById('cart') in javascript to change the cart number -->
				<a class = "nav-item nav-link justify-content-end" id = "cart" href="cart.php"> My Cart (0) </a>
				<!-- contact us page wtih info-->
				<a class = "nav-item nav-link justify-content-end" href = "contactus.html"> Contact Us </a>
			</span>
			</div>
		</div>
	</div>
</nav>
	
<div class="header">
<h2>Sign up</h2>
</div>
<form method="POST" action="register.php">
<!--display validation errors here-->
<?php include('errors.php');?>

<div class="input-group">
<label>Username</label>
<input type="text" name="username" value="<?php echo $username;?>">
</div>
<div class="input-group">
<label>Email</label>
<input type="email" name="email" value="<?php echo $email;?>">
</div>
<div class="input-group">
<label>Password</label>
<input type="password" name="password_1">
</div>
<div class="input-group">
<label>Confirm Password</label>
<input type="password" name="password_2">
</div>
<div class="input-group">
<button type="submit" name="register" class="btn">Sign up</button>
</div>
<p>
Already a member?<a href="signin.php">Sign In</a>
</p>
</form>
<!-- Page Footer, only stays as a footer beacuse of css, so copy the footer and footer text css -->
<div class = "footer">
	<p id = "footer-text"> Damola & Partners Inc. &copy; </p>
</div>
<!-- END of footer -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>