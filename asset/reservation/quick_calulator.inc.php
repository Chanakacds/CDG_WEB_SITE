<?php include 'reservation/calculate_fare.php'; 

$journeytype = "Oneway";
$passengers = $_POST["qc_passengers"];
$j1pickup = $_POST["qc_from"];
$j1drop = $_POST["qc_to"];
$j1pickuptime = "12:00AM";
$j2pickup = "";
$j2drop = "";
$j2pickuptime = "";

$nightCharge = 10;

$journey_date = displayInvoice($passengers, $journeytype, $j1pickup, $j1drop, $j1pickuptime, $j2pickup, $j2drop, $j2pickuptime);

$j1fare = $journey_date[0];
$j1Nightcharge = $journey_date[1];

if($journeytype == "Roundtrip")
{
$j2fare = $journey_date[2];
$j2Nightcharge =  $journey_date[3];	
}

$total = $j1fare;
echo '<p style="#666666;  margin-top:0; font-size:20px;">&#8364;<strong>'.$total.'.00 </strong> <a onClick="booknow();" style="cursor:pointer; font-size:15px; background:#F60; padding:3px; border-radius:3px; ">Book Journey</a></p>';
?>