<?php 
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!--
	<script>
		function insertPerson() {
				val1 = $("#firstname").val();
				val2 = $("#lastname").val();
				val3 = $("#telephone").val();
				$.get("./confirmDelivery.php",{"cmd": "insert", "firstname" : val1, "lastname" : val2, "telephone" : val3}, function(data) {
					//alert("Test");
					$("#showpeople").html(data);
				});
				return(false);
			}
	</script>
	
	<script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: '/delete.php',
               type: 'GET',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+id).remove();
                    alert("Record removed successfully");  
               }
            });
        }
    });
-->

</script>
</head>
<body style="margin: 50px;">
    <h1>Deliveries</h1>
    <br>
    <table class="table">
        <thead>
			<tr>
				<th>Delivery ID</th>
				<th>Courier ID</th>
				<th>Store ID</th>
				<th>Customer Name</th>
				<th>Customer Address</th>
				<th>Customer Email</th>
				<th>Delivery Total</th>
				<th>Courier Pay</th>
				<th>Delivery Status</th>
				<th>Confirm Delivery</th>
			</tr>
		</thead>

        <tbody>
            <?php
				$servername = "localhost";
				$username = "oraonyemaobi";
				$password = "oraonyemaobi131471";
				$database = "couriertracker";

				// Create connection
				$connection = new mysqli($servername, $username, $password, $database);

				// Check connection
				if ($connection->connect_error) {
					die("Connection failed: " . $connection->connect_error);
				}

				// read all rows from database table
				$sql = "SELECT * FROM deliveries";
				$result = $connection->query($sql);

				if (!$result) {
					die("Invalid query: " . $connection->error);
				}

				// read data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr>
						<td>" . $row["delivery_id"] . "</td>
						<td>" . $row["courier_id"] . "</td>
						<td>" . $row["store_id"] . "</td>
						<td>" . $row["customer_name"] . "</td>
						<td>" . $row["customer_address"] . "</td>
						<td>" . $row["customer_email"] . "</td>
						<td>" . $row["delivery_total"] . "</td>
						<td>" . $row["courier_pay"] . "</td>
						<td>" . $row["delivery_status"] . "</td>
						<td>
							<a class='btn btn-primary btn-sm' onclick="confirmDelivery($row["delivery_id"], $_SESSION['courier_id'], $row["customer_email"])" href='update'>Confirm</a>
							
						</td>
					</tr>";
				}

				function confirmDelivery($delivery_id, $courier_id, $customer_email){
						$sql = "UPDATE deliveries SET courier_id = '$courier_id', WHERE delivery_id = .$_GET['delivery_id']";
						$mysqli->query($sql);	

						$_SESSION['delivery_id'] = $delivery_id;

						//when courier_id of a delivery is updated, also send the customer delivery status
						// the message
						$msg = "First line of text\nSecond line of text";

						// use wordwrap() if lines are longer than 70 characters
						$msg = wordwrap($msg,70);

						// send email
						mail($customer_email,"Your Delivery Status",$msg);
				}

				$connection->close();

				
            ?>
			<script>

			</script>
        </tbody>
    </table>
</body>
</html>
<!-- 
<a class='btn btn-danger btn-sm' href='delete'>Delete</a>
define( 'DB_NAME', 'couriertracker' );
define( 'DB_USER', 'oraonyemaobi' );
define( 'DB_PASSWORD', 'oraonyemaobi131471' );
define( 'DB_HOST', 'localhost' );

// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Check connection
if (!$conn) {
  	die("Connection failed: " . mysqli_connect_error());
}

function showDeliveries() {
	global $conn;
	
	$sql = "SELECT delivery_id, courier_id, store_id, customer_name, customer_address, customer_email, delivery_total, courier_pay, delivery_status FROM deliveries";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
 		// output data of each row
  		while($row = mysqli_fetch_assoc($result)) {
		   $id = $row["delivery_id"];
		   $delurl = "[<a href='' onclick=return(deletePerson('$id'))>delete</a>]";
    		   echo "delivery_id: " . $row["delivery_id"]. " - courier_id: " . $row["courier_id"]. " " . $row["lastname"]." " . $row["telephone"]. " $delurl<br>";
  		}
	} else {
  		echo "0 results";
	}
	
}
-->