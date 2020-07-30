<?php

$conn = mysqli_connect("localhost", "root", "","myguest");
	mysqli_select_db($conn,"myguest") or die("Cannot connect to database");

 $qc_from = $_REQUEST['qc_from'];
 $qc_to = $_REQUEST['qc_to'];
$qc_passengers =  $_REQUEST['qc_passengers'];
//$dropoff =  $_REQUEST['dropoff'];
$e=23;
//$date =$_REQUEST['myDate'];
//$time = $_REQUEST['appt-time'];


//$passengers = $children + $adults;
if($qc_passengers<3)
	$qc_passengers = 3;

$sql = "Select * from pricelist Where Passenger='$qc_passengers' and ((Location1 ='$qc_from'and Location2 ='$qc_to')or(Location1 = '$qc_to'and Location2='$qc_from'))";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc())
        	{
		$price = $row["Price"];		
       echo "€" . $price.".00";
    }
	//$sql2="INSERT INTO final_cal (pickup, dropoff,date,time,price,Passanger) VALUES ('$pickup','$dropoff','$date','$time','$price','$passengers')";
	  // mysqli_query($conn, $sql2);
	  // header("location: form.php");
}


    
 else {
    echo "0.00 €" ;
}
?>
