<?php

	session_start();
	$conn = mysqli_connect('localhost','root','');
	mysqli_select_db($conn,'product');

	# Function to add the product selected to the database.
	if(isset($_POST["add_to_cart"]))
	{   		
		$username =  $_SESSION['username'];
		$product_name = $_POST["hidden_name"];
		$product_price = $_POST["hidden_price"];
		// $product_id = $_GET["hidden_id"];
		// $product_picture = $_FILES["hidden_picture"]["name"];
	
	    $query = "INSERT INTO table_order (product_name,product_price,username) values ('$product_name',$product_price,'$username')";
		$result = mysqli_query($conn,$query) or die("Cannot Query With Database!");

		if($query)
		{
			echo 'Successfully Added Product Name = '.$_POST["hidden_name"].' To Order List!';
		}

	}
		
?>

<!DOCTYPE html>
<html>

<head>

    <title>
		NATIONAL ART GALLERY
	</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>

    <br>

    <div align="center">

        <h1>
            <p style="font-family:georgia,garamond,serif;font-size:35px;font-style:italic;">NATIONAL ART GALLERY</p>
        </h1>
        <div id="bottom">
            <a href="clientOrder.php"><b>GO TO CART</b></a>
        </div>

    </div>

    <br>

    <div class="container">

        <?php

		$query = "SELECT * FROM table_product ORDER BY product_id ASC";
		$result = mysqli_query($conn, $query);

		# Display the art from the database. Using a bootstrap form.
		if(mysqli_num_rows($result) > 0)
		{   
			
			while($row = mysqli_fetch_array($result))
			{
			?>

				<div class="col-md-4">

					<form method="post" action="clientProduct.php">

						<div style="border:3px solid #5cb85c; background-color:whitesmoke; border-radius:5px; padding:16px;"
							align="center">

							<a href="picture/<?php echo $row["product_picture"]; ?>"><img
									src="picture/<?php echo $row["product_picture"]; ?>" class="img-responsive" width=100
									height=100 />

								<h4 class="text-info"><?php echo $row["product_name"]; ?></h4>

								<h4 class="text-danger">Rs. <?php echo $row["product_price"]; ?></h4>

								<input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>" />

								<input type="hidden" name="hidden_price" value="<?php echo $row["product_price"]; ?>" />

								<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success"
									value="Add to Cart" />

						</div>

						<br>

					</form>

				</div>

	    	<?php
			}

		}
        ?>

</body>

</html>