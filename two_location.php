<?php

$conn = mysqli_connect("localhost", "root", "","myguest");
	mysqli_select_db($conn,"myguest") or die("Cannot connect to database");

 $qc_from = $_REQUEST['qc_from'];
 $qc_to = $_REQUEST['qc_to'];
$qc_passengers1 =  $_REQUEST['qc_passengers'];
//$dropoff =  $_REQUEST['dropoff'];
$e=23;
//$date =$_REQUEST['myDate'];
//$time = $_REQUEST['appt-time'];


//$passengers = $children + $adults;
if($qc_passengers<3)
	$qc_passengers = 3;

$sql = "Select * from pricelist Where Passenger='$qc_passengers1' and ((Location1 ='$qc_from'and Location2 ='$qc_to')or(Location1 = '$qc_to'and Location2='$qc_from'))";


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

if (array_key_exists('qc_to1', $_REQUEST)) {
	-
	-
	-    $qc_from = $_REQUEST['qc_from'];
	-    $qc_to = $_REQUEST['qc_to'];
	-    $qc_from1 = $_REQUEST['qc_from1'];
	-    $qc_to1 = $_REQUEST['qc_to1'];
	-    $qc_passengers1 =  $_REQUEST['qc_passengers'];
	-    //$qc_from = $_REQUEST['qc_from'];
	-    //$qc_to = $_REQUEST['qc_to'];
	-    //$qc_passengers =  $_REQUEST['qc_passengers'];
	-
	-    if ($qc_passengers1 < 3)
	-        $qc_passengers1 = 3;
	-
	-
	-    $sql = "Select * from pricelist Where Passenger='$qc_passengers1' and ((Location1 ='$qc_from1'and Location2 ='$qc_to1')
	-or(Location1 = '$qc_to1'and Location2='$qc_from1'))";
	 
	 
	-    $result = $conn->query($sql);
	-
	-    if ($result->num_rows > 0) {
	-        // output data of each row
	-        while ($row = $result->fetch_assoc()) {
	-            $price1 = $row["Price"];
	-        }
	-        //$sql2="INSERT INTO final_cal (pickup, dropoff,date,time,price,Passanger) VALUES ('$pickup','$dropoff','$date','$time','$price','$passengers')";
	-        // mysqli_query($conn, $sql2);
	-        // header("location: form.php");
	-    } else {
	-        echo "0 results";
	-    }
	-    $sq2 = "Select * from pricelist Where Passenger='$qc_passengers1' and ((Location1 ='$qc_from2'and Location2 ='$qc_to2')
	-or(Location1 = '$qc_to2'and Location2='$qc_from2'))";
	-
	-
	-    $result1 = $conn->query($sq2);
	-
	-    if ($result1->num_rows > 0) {
	-        // output data of each row
	-        while ($row = $result1->fetch_assoc()) {
	-            $price2 = $row["Price"];
	-            $finalvalue = $price1 + $price2;
	-            echo "€" . $finalvalue  . ".00";
	-        }
	-        //$sql2="INSERT INTO final_cal (pickup, dropoff,date,time,price,Passanger) VALUES ('$pickup','$dropoff','$date','$time','$price','$passengers')";
	-        // mysqli_query($conn, $sql2);
	-        // header("location: form.php");
	-    } else {
	-        echo "0 results";
	-    }
	-}
	 
	 
	 
	 ?>