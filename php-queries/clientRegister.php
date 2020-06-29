<html>

<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Client Register</title>
    
</head>

<body>

    <br>
    
    <div align="center">

        <div align="center">

            <h1>
                <p style="font-family:georgia,garamond,serif;font-size:35px;font-style:italic;">WELCOME TO NATIONAL ART
                    GALLERY</p>
            </h1>
            <h6>
                <p style="font-family:georgia,garamond,serif;font-size:20px;font-style:italic;">Register To Continue</p>
            </h6>

        </div>

        <div class="container" align="center">

            <div class="col-md-12" align="center">

                <div style="border:30px solid #5cb85c; background-color:whitesmoke; border-radius:10px; padding:16px;"
                    align="center">

                    <form method="post" action="clientRegister.php">
                        <input type="text" placeholder="Username" name="username" required>
                        <input type="email" placeholder="Email" name="email" required>
                        <input type="password" placeholder="Password" name="password_1" required>
                        <input type="password" placeholder="Re Password" name="password_2" required>
                        <input type="submit" name="reg_user" value="Register">
                    </form>
                    <p>
                        Already a member? <a href="clientLogin.php">Login</a>
                    </p>

                </div>

            </div>

        </div>

    </div>

</body>
</html>

<?php
  session_start();
  $conn = mysqli_connect('localhost','root','','product');

  if(isset($_POST["reg_user"]))
  {

      $query = mysqli_query($conn,"INSERT INTO table_client(client_Name,client_Email,client_Password) VALUES('".$_POST["username"]."','".$_POST["email"]."','".$_POST["password_1"]."') ") or die("Cannot Query With Database!");
      if($query)
      { 
      	  $_SESSION['username'] = $_POST['username'];
      ?>

        <!DOCTYPE html>
        <html>
        <body>

            <div align="center">
                <p>
                    <h5>You Are Now Registered</h5>
                    <h4>Click To Start <a href="clientProduct.php">Lets Begin</a></h4>
                </p>
            </div>

        </body>
        </html>

      <?php
      }
  }
?>
