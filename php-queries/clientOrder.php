<?php
  session_start();
  $conn = mysqli_connect('localhost','root','') or die ("Cannot connect to the database!");
  mysqli_select_db($conn,'product');
  if(isset($_GET["delete_order"]))
  {
    $query = "DELETE FROM table_order WHERE product_name = '".$_GET["delete_order"]."' ";
    $result = mysqli_query($conn,$query);
    if($result)
    {
      echo 'Successfully Deleted Order Name = '.$_GET["delete_order"].' from Database!';
    }
  }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Client Order</title>
    <meta charset="UTF-8" enctype="multipart/form-data">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>

    <!-- Header -->
    <div align="center">

        <h1>
            <p style="font-family:georgia,garamond,serif;font-size:35px;font-style:italic;">
                <?php echo $_SESSION['username']?> YOU'RE ORDER LIST</p>
        </h1>

    </div>


    <div class="container">

        <div class="col-md-12">

            <form method="post" action="clientProduct2.php">

                <!-- Form Section with Bootstrap -->
                <div style="border:10px solid #5cb85c; background-color:whitesmoke; border-radius:10px; padding:20px;"
                    align="center">

                    <!-- Item Section -->
                    <div align="center">
                        <table border="2">
                            <tr>
                                <th>ART Name</th>
                                <th>ART Price</th>
                                <th>Action</th>
                            </tr>

                            <?php
                              $qry = mysqli_query($conn,"select product_name,product_price from table_order order by product_name");
                              while($row = mysqli_fetch_array($qry,MYSQLI_ASSOC))
                              {
                                  echo '<tr><td>'.$row["product_name"].'</td>';
                                  echo '<td>'.$row["product_price"].'</td>';
                                  echo '<td> <a href = "?delete_order='.$row["product_name"].'&price='.$row["product_price"].'">DELETE THIS ORDER</td></tr>';
                              }
                            ?>

                        </table>
                    </div>

                    <br>
                    
                    <!-- Payment and Quantity Section -->
                    <div align="center">
                        <table border="2">
                            <tr>
                                <th>Your Total Is:</th>
                                <th>Total Quantity
                            </tr>

                            <?php
                              $rupees = "RUPEES :";
                              $qry = mysqli_query($conn,"CALL getOrder()");
                              while($row = mysqli_fetch_array($qry,MYSQLI_ASSOC))
                              {
                                  echo '<tr><td>'.$rupees.''.$row["sum(product_price)"].'</td>';
                                  echo '<td>'.$row["count(order_id)"].'</td><tr>';
                              }
                            ?>

                        </table>
                    </div>

                    <br>
                    
                    <!-- Proceed to Pay Section -->
                    <div name="Payment" align="center">
                        <a href="clientPayment.php"><b>PROEED TO PAY</b></a>
                    </div>

            </form>

        </div>

    </div>
                 
</body>

</html>