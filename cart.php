  <?php   
 session_start();  
 $connect = mysqli_connect("localhost", "user", "12345", "grocerystore");  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="cart.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="cart.php"</script>';  
                }  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>cart</title>  
		  <style>
		  body {
	background: rgb(255,230,190);
	font-family: Roboto, sans-serif;
}

.navbar, .nav-item, .nav-link, .nabar-brand{
	background-color:#acacac ;
	color: white;
}
		  </style>
		   <link rel = "stylesheet" type = "text/css" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
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
           <br />  
           <div class="container" style="width:700px;">  
                <h3 align="center">cart</h3><br />  
                <?php  
                $query = "SELECT * FROM groceries ORDER BY id ASC";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-4">  
                     <form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                      
                               <h4 class="text-info"><?php echo $row["product"]; ?></h4>  
                               <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["product"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                }  
                ?>  
                <div style="clear:both"></div>  
                <br />  
                <h3>Order Details</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php echo $values["item_price"]; ?></td>  
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
					 <div>
					 <a href="check.html"><button>checkout</button></a>
					 </div>
                </div>  
           </div>  
           <br />  
      </body>  
 </html>