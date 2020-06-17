<?php
	echo "Response Messages: \n";

	$conn = mysqli_connect('localhost','root','');
	mysqli_select_db($conn,'product');

	if($conn)		//if connection is successfull
	{
		echo "Database Connected! \n";
		echo "Database Name:Demo! \n";
		echo "Database Username:Root! ";
	}
	else			//if connection is not successfull
	{
		echo "Database Not Connected!";
	}
?>