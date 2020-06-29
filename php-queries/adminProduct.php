<?php

  include "connection.php";
  $vid = "";
  $vname = "";
  $vprice = "";

  # Add new Art function
  if(isset($_POST["button_add"]))
  {

      echo "button_add is running! \n";
      
      # To Query ( Insert the data from HTML form into the database using POST method )
      $query = mysqli_query($conn,"INSERT INTO table_product VALUES('".$_POST["product_id"]."','".$_POST["product_name"]."','".$_POST["product_price"]."','".$_FILES["product_picture"]["name"]."') ") or die("Cannot Query With Database!");
      if($query)
      {
      	echo "New Product Added Successfully To The Database!\n";

      	 # To move the data(IMAGE) into the target directory (picture/)
         $target_directory = "picture/";
         $target_file = $target_directory.basename($_FILES["product_picture"]["name"]);
         $image_file_type = pathinfo($target_file,PATHINFO_EXTENSION);
         
         #To upload the file(IMAGE) onto to local directory
         if(move_uploaded_file($_FILES["product_picture"]["tmp_name"], $target_file))
         {
         	echo "Added To Local Directory Successfully!";
         }
         else
         {
         	echo "Could Not Add To Local Directory!";
         }
      }

  }

  # Edit existing Art function
  elseif (isset($_POST["button_edit"])) {

  	  echo "button_edit is running! \n";

      $query = "UPDATE table_product SET product_id ='".$_POST["product_id"]."',product_name='".$_POST["product_name"]."',product_price='".$_POST["product_price"]."' where product_id='".$_POST["product_id"]."'";

      $result = mysqli_query($conn,$query);

      if ($result) {
    
        echo "Edit Done Successfully!";

      }
  }

  # Delete existing Art function ( Present in the column )
  if(isset($_GET["delete"]))
  {
  	$query = "DELETE FROM table_product WHERE product_id = '".$_GET["delete"]."' ";
  	$result = mysqli_query($conn,$query);
  	if($result)
  	{
  		echo 'Successfully Deleted Product Id = '.$_GET["delete"].' from Database!';
        
        # Unlink will delete the image of the art in the local directory(/picture)
        unlink("picture/".$_GET["picture"]);

        echo 'Successfully Deleted Product Image =  '.$_GET["picture"].' from Local Directory!';     
    }
  }
  
  # Edit the contents of the art ( Present in the column ). When this link is pressed the data of particular row
  # will be moved onto the form above using the variables vid,vname and vprice.
  if(isset($_GET["edit"]))
  {
     $query = "SELECT * FROM table_product WHERE product_id = '".$_GET["edit"]."' ";
     $result = mysqli_query($conn,$query);
     while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
     {
     	$vid = $row["product_id"];
     	$vname = $row["product_name"];
     	$vprice = $row["product_price"];
     }
  }
  
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Product</title>
</head>

<body bgcolor="yellow">

    <br>

    <div name="product_div" align="center">
        <table>
            <form action='<?php echo $_SERVER["PHP_SELF"]; ?>' method="post" enctype="multipart/form-data">
                <tr>
                    <td>Product ID</td>
                    <td><input type="text" name="product_id" value="<?php echo $vid; ?>"></td>
                </tr>
                <tr>
                    <td>Product Name</td>
                    <td><input type="text" name="product_name" value="<?php echo $vname; ?>"></td>
                </tr>
                <tr>
                    <td>Product Price</td>
                    <td><input type="text" name="product_price" value="<?php echo $vprice; ?>"></td>
                </tr>
                <tr>
                    <td>Product Picture</td>
                    <td><input type="file" name="product_picture"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="button_add" value="Add" />
                        <input type="submit" name="button_edit" value="Edit" />
                </tr>
                </td>
            </form>
        </table>
    </div>

</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" enctype="multipart/form-data">
</head>

<body>

    <div align="center">
        <table border="10">
            <!-- Row Headers -->
            <tr>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Picture</th>
                <th>Action</th>
            </tr>
            <!-- Row Data -->
            <?php
                $qry = mysqli_query($conn,"select * from table_product order by product_id");
                while($row = mysqli_fetch_array($qry,MYSQLI_ASSOC))
                {
                    echo '<tr><td>'.$row["product_id"].'</td>';
                    echo '<td>'.$row["product_name"].'</td>';
                    echo '<td>'.$row["product_price"].'</td>';
                    echo '<td><a href = "picture/'.$row["product_picture"].'" ><img src = "picture/'.$row["product_picture"].'" width = 200 height = 200></a></td>';
                    echo '<td> <a href = "?edit='.$row["product_id"].'"> EDIT | <a href = "?delete='.$row["product_id"].'&picture='.$row["product_picture"].'">DELETE </td></tr>';
                }
            ?>

        </table>
    </div>
    
</body>

</html>