<?php 
 
session_start();

define( 'DB_NAME', 'oonyemaobi1' );
define( 'DB_USER', 'oonyemaobi1' );
define( 'DB_PASSWORD', 'oonyemaobi1' );
define( 'DB_HOST', 'localhost' );

function InsertCourier($username, $password, $firstname, $lastname) {
	// Create connection
	$conn = mysqli_connect('DB_HOST', 'DB_USER', 'DB_PASSWORD', 'DB_NAME');
	// Check connection
	if (!$conn) {
  		die("Connection failed: " . mysqli_connect_error());
	}
	
	$insert = "INSERT INTO couriers SET username = '$username', password = '$password', firstname = '$firstname', lastname = '$lastname' ";
	
	$result = $conn->query($insert);

	mysqli_close($conn);

}

InsertCourier($_POST['username'], $_POST['password'],$_POST['firstname'], $_POST['lastname']);

?>