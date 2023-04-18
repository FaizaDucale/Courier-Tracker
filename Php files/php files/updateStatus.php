<?php 
	session_start();
?>
<!--
<!DOCTYPE html>
<html>
<body>

<button onclick="confirmDelivery()">Try it</button>

<p id="demo"></p>

<script>
function confirmDelivery() {
  var txt;
  if (confirm("Press a button!")) {
    txt = "You pressed OK!";
  } else {
    txt = "You pressed Cancel!";
  }
  document.getElementById("demo").innerHTML = txt;
}
</script>

</body>
</html>
-->

<?php

//global variables

define( 'DB_NAME', 'couriertracker' );
define( 'DB_USER', 'oraonyemaobi' );
define( 'DB_PASSWORD', 'oraonyemaobi131471' );
define( 'DB_HOST', 'localhost' );

function updateStatus($delivery_id){
  
  // Create connection
  $conn = mysqli_connect('DB_HOST', 'DB_USER', 'DB_PASSWORD', 'DB_NAME');
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  $check = "SELECT delivery_status+0 FROM deliveries WHERE delivery_id = '$delivery_id'"

  $result = $conn->query($check);

  $current_status = NULL;

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
     while($row = mysqli_fetch_assoc($result)) {
          $current_status = $row["delivery_status"];
     }
  } else {
      echo "0 results";
  }

  $update = "";
  if($current_status == 1){
    $update = "UPDATE deliveries SET delivery_status = 2 WHERE delivery_id = '$delivery_id'";
    $result = $conn->query($update);
  }else if($current_status == 2){
    $update = "UPDATE deliveries SET delivery_status = 3 WHERE delivery_id = '$delivery_id'";
    $result = $conn->query($update);
  } else if($current_status == 3){
    $update = "UPDATE deliveries SET delivery_status = 4 WHERE delivery_id = '$delivery_id'";
    $result = $conn->query($update);
  }
}

updateStatus($_SESSION['delivery_id'];)

/*
function addCourierDelivery($courier_id) {
	global $conn;
	
	$insert = "INSERT INTO  SET firstname = '$firstname', lastname = '$lastname', telephone = '$telephone' ";
	$result = $conn->query($insert);
}
function updateDeliveryCourier($courier_id, $delivery_id){
    global $conn;

    $update =  "UPDATE deliveries SET courier_id = '$courier_id', WHERE delivery_id = $delivery_id";
	$result = $conn->query($update);

    //addCourierDelivery($courier_id);
}
$cmd = $_GET['cmd'];

if($cmd == 'insert') { //if insert or delete then show people
	$firstname = $_GET['firstname'];
    	$lastname =  $_GET['lastname'];
    	$telephone = $_GET['telephone'];
	InsertPerson($firstname, $lastname, $telephone);
}else if($cmd == 'delete') {
    $id = $_GET['id'];
    DeletePerson($id);
}else if($cmd == '') {
    ShowPeople();
}

ShowPeople();

mysqli_close($conn);	


*/
?>