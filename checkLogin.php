<?php

session_start();

//global variables

define( 'DB_NAME', 'couriertracker' );
define( 'DB_USER', 'oraonyemaobi' );
define( 'DB_PASSWORD', 'oraonyemaobi131471' );
define( 'DB_HOST', 'localhost' );

function checkLogin($username, $password) {

	// Create connection
	$conn = mysqli_connect('DB_HOST', 'DB_USER', 'DB_PASSWORD', 'DB_NAME');
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$check = "SELECT courier_id, username, password FROM couriers WHERE username = '$username' AND password = '$password'";
	
	$result = $conn->query($check);

	$_SESSION['courier_id'] = $row["courier_id"];

	if (mysqli_num_rows($result) > 0) {
 		// output data of each row
  		while($row = mysqli_fetch_assoc($result)) {
    		   //echo "id: " . $row["id"]. " - Username: " . $row["username"]." Pass: " . $row["password"]. "<br>";
  		}
		echo "username and password combination found."
	} else {
  		echo "0 results";
	}

	mysqli_close($conn);
	

}

checkLogin($_POST['username'], $_POST['password']);

?>