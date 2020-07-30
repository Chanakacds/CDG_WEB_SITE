 <?php include 'calculate_fare.php'; 



$journeytype = $_POST["journeytype"];

$passengers = $_POST["passengers"];

$j1pickup = $_POST["j1pickup"];

$j1drop = $_POST["j1drop"];

$j1pickuptime = $_POST["j1pickuptime"];

$j2pickup = $_POST["j2pickup"];

$j2drop = $_POST["j2drop"];

$j2pickuptime = $_POST["j2pickuptime"];



$nightCharge = 0;



$journey_date = displayInvoice($passengers, $journeytype, $j1pickup, $j1drop, $j1pickuptime, $j2pickup, $j2drop, $j2pickuptime);



$j1fare = $journey_date[0];

$j1Nightcharge = $journey_date[1];



if($journeytype == "Roundtrip")

{

$j2fare = $journey_date[2];

$j2Nightcharge =  $journey_date[3];	

}



$total = $j1fare;

$j1display = $j1pickup.' > '. $j1drop;

echo '<p style="font-weight:bold; text-align:left; font-size:14px;">Your Fare</p><hr>';

echo '<table style="width:100%; font-size:13px;">';

echo "<tr><td text-align:left;>".$j1display." <a onclick=\"GotoStage(1)\" style=\"color:#F30; cursor:pointer;\">(edit)</a></td><td style='text-align:right;'>".number_format($j1fare, 2, '.', ' ')."</td></tr>";

if($j1Nightcharge == "1")

{

$total += $nightCharge;	

echo "<tr><td text-align:left;>Journey Night Charge</td><td style='text-align:right;'>".number_format($nightCharge, 2, '.', ' ')."</td></tr>";

}



if($journeytype == "Roundtrip")

{

	$total += $j2fare;

	$j2display = $j2pickup.' > '. $j2drop;

	echo "<tr><td text-align:left;>".$j2display." <a onclick=\"GotoStage(1)\" style=\"color:#F30; cursor:pointer;\">(edit)</a></td><td style='float:right; text-align:right'>".number_format($j2fare, 2, '.', ' ')."</td></tr>";

	if($j2Nightcharge == "1")

	{

	$total += $nightCharge;

	echo "<tr><td text-align:left;>Journey Night Charge</td><td style='text-align:right;'>".number_format($nightCharge, 2, '.', ' ')."</td></tr>";

	}	

}

echo "<tr><td text-align:left;>Total</td><td style='text-align:right;'>"."&euro;".number_format($total, 2, '.', ' ')."</td></tr>";

echo "</table>";

?>