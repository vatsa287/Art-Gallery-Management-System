<html>

<head>
    <title>Admin Login</title>
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
                <p style="font-family:georgia,garamond,serif;font-size:35px;font-style:italic;">WELCOME TO NATIONAL
                    ARTGALLERY</p>
            </h1>
            <h6>
                <p style="font-family:georgia,garamond,serif;font-size:20px;font-style:italic;">Login As Administrator
                </p>
            </h6>

        </div>

    </div>


    <div class="container" align="center">

        <div class="col-md-12" align="center">

            <div style="border:30px solid #5cb85c; background-color:whitesmoke; border-radius:10px; padding:16px;"
                align="center">

                <form method="post" action="adminLogin.php">
                    <input type="text" placeholder="Username" name="username" required>
                    <input type="password" placeholder="Password" name="password" required>
                    <input type='submit' name="login_admin" value="Login">
                </form>

            </div>

        </div>

    </div>

</body>
</html>

<?php

$conn = mysqli_connect('localhost', 'root', '', 'product');

if (isset($_POST["login_admin"])) 
{

    $username = $_POST["username"];
    $password = $_POST["password"];
    $query = "SELECT * FROM table_admin WHERE admin_Name='$username' AND admin_Password='$password'";
    $results = mysqli_query($conn, $query);
    if (mysqli_num_rows($results) == 1) 
    {
    ?>
        <!DOCTYPE html>
        <html>
        <body>

            <div align="center">
                <p>
                    <h5>You Are Now Logged In As Administrator</h5>
                    <h4>Click To Start <a href="adminProduct.php">Lets Begin</a></h4>
                </p>
            </div>

        </body>
        </html>

    <?php
    } 
    else 
    {
    ?>

        <!DOCTYPE html>
        <html>
        <body>

            <div align="center">
                <p>
                    <h4>Wrong Password/Username Combination</h4>
                </p>
            </div>

        </body>
        </html>

    <?php 
    }

}
?>