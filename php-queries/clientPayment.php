<html>

<head>
    <title>Client Payment</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="style.css">


</head>

<body>
    <br>

    <div align="center">

        <div align="center">

            <h1>
                <p style="font-family:georgia,garamond,serif;font-size:35px;font-style:italic;">PAYMENT </p>
            </h1>

        </div>

        <div class="container" align="center">

            <div class="col-md-12" align="center">

                <div style="border:30px solid #5cb85c; background-color:whitesmoke; border-radius:10px; padding:16px;"
                    align="center">

                    <form method="post" action="clientPayment.php">

                        <input type="text" name="payment_type" placeholder="CASH / CARD" required>

                        <input type="text" name="experience" placeholder="RATE YOUR EXPERIENCE OUT OF 5">

                        <input type="submit" name="pay" value="PAY NOW">

                    </form>

                </div>

            </div>

        </div>

    </div>

</body>

</html>

<?php

  $conn = mysqli_connect('localhost','root','','product');
  session_start();
  
  if(isset($_POST["logout"]))
  {
    session_destroy();
    unset($_SESSION['username']);
    header("location: clientLogin.php");
  }
  

  if(isset($_POST["pay"]))
  {
      $username = $_SESSION['username'];
      $query = mysqli_query($conn,"INSERT INTO table_payement(payment_type,experience,username) VALUES('".$_POST["payment_type"]."','".$_POST["experience"]."','$username') ") or die("Cannot Query With Database!");
      if($query)
      {
      ?>

        <!DOCTYPE html>
        <html>

        <body>
            <div align="center">
                <p>
                    <h4><?php echo $_SESSION['username']?> THANKS FOR SHOPPING WITH US!</h4>
                </p>
            </div>

        </body>

        </html>

      <?php
      } 
  }
  ?>
<!DOCTYPE html>
<html>
<body>

    <div align="center">

        <form action=clientPayment.php method="post">
            <input type="submit" name="logout" style="margin-top:5px;" class="btn btn-success" value="LOG OUT" />
        </form>
    </div>

</body>
</html>