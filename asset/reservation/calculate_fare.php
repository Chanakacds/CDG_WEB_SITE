<?php include '../includes/db.inc.php'; ?>
<?php 
function parisDestinations($destination){
	 $paris = array(
	"Gare du Nord", 

	"Gare d'Austerlitz", 

	"Gare de Bercy", 

	"Gare de Paris-Est",

	"Gare Montparnasse",

	"Gare Saint Lazarre"

	);
	if (in_array($destination, $paris)) {
		return $inParis = true;
	}
	else {
		return $inParis = false;
	}
}
function nightSurcharge($pickupTime){

	$pickupTime = date("H:i", strtotime(str_replace(' ', '',$pickupTime))); // convert AM/PM time to 24H time

	if ($pickupTime >= '21:00' || $pickupTime < '06:00') // find if pickup time falls betwee night surcharge times

	{

   		return true;

	}

	else

	{

		return false;

	}

}
function processFare($starting_fare, $passengers){
	//$starting_fare = 55;
	$standard_increment = 5;
	$tot_pas_van = 8;
	$minumum_num_pas = 3;
	$num_shuttles = ceil($passengers /$tot_pas_van); // number fo vans requred
	$remainder = ($passengers % $tot_pas_van);
	//$rate = $starting_fare + (($passengers-3)*$standard_increment);
	//echo $rate;
	//1 shuttle not full
	if (($num_shuttles <= 1) && $remainder != 0)
	{
		if ($remainder <= $minumum_num_pas) // if less than $minumum_num_pas do not add remainder
		{
		$rate = $starting_fare; 
		}
		else // if less more 3 passengers | take out $minumum_num_pas from tot number of passengers | then multiply remainder by $standard_increment (which is 5)
		{
		$rate = $starting_fare +(($remainder - $minumum_num_pas) * $standard_increment);	
		}
		//echo 'number of shuttles required is '. $num_shuttles; 
		//echo '<br>Rate: '.$rate;
		return $rate;
	}
	//1 shuttle full
	if (($num_shuttles <= 1) && $remainder == 0)
	{
		$rate = $starting_fare + 25;
		//echo 'number of shuttles required is '. $num_shuttles; 
		//echo '<br>Rate: '.$rate;
		return $rate;
	}
	//more than one shuttle not full
	if (($num_shuttles > 1) && $remainder != 0)
	{
		if ($remainder <=$minumum_num_pas) // if less than 3 passengers do not add remainder
		{
		$remainder_rate = $starting_fare;
		}
		else // if less more 3 passengers | take out 3 from tot number of passengers | then multiply remainder by $standard_increment (which is 5)
		{
		$remainder_rate = $starting_fare +(($remainder-$minumum_num_pas) * $standard_increment);	
		}
		$full_van_rate = ($starting_fare + 25) * ($num_shuttles - 1);
		$rate = $remainder_rate + $full_van_rate;
		//echo 'number of shuttles required is '. $num_shuttles; 
		//echo '<br>Rate: '.$rate;
		return $rate;
	}
	//more than one shuttle full
	if (($num_shuttles > 1) && $remainder == 0)
	{
		$rate = ($starting_fare + 25) * $num_shuttles;
		//echo 'number of shuttles required is '. $num_shuttles; 
		//echo '<br>Rate: '.$rate;
		return $rate;
	}
}
function calculateFare($passengers,$pickup,$drop){
	if(parisDestinations($pickup)){
	$pickup = "Paris";
	}
	if(parisDestinations($drop)){
	$drop = "Paris";
	}
	$query = 'SELECT `standard_rate` from `rate` WHERE ((`pickup`="'.$pickup.'" AND `drop`="'.$drop.'") OR (`pickup`="'.$drop.'" AND `drop`="'.$pickup.'"))';	
	$result_from_query=mysql_query($query);
	$number_of_results = mysql_numrows($result_from_query);
	$i=0;
	while ($i < $number_of_results) 
	{
	$starting_fare = mysql_result($result_from_query,$i,"standard_rate");
	++$i;
	}
	return processFare($starting_fare,$passengers); // find basic fare and send it to be calculated
}
function rateWithSurcharge($passengers,$pickup,$drop,$pickupTime){
		if (nightSurcharge($pickupTime)){
			$fare = calculateFare($passengers,$pickup,$drop);
			return array($fare,"1");
		}
		else{
			$fare = calculateFare($passengers,$pickup,$drop);
			return array($fare,"0");
		}
}
function displayRate($passengers,$pickup,$drop){
	echo calculateFare($passengers,$pickup,$drop);
}
function displayInvoice($passengers,$journeyType,$j1pickup,$j1drop,$j1pickupTime,$j2pickup,$j2drop,$j2pickupTime){
	if ($journeyType=="Oneway"){
		$j1data = rateWithSurcharge($passengers,$j1pickup,$j1drop,$j1pickupTime);
		$j1_fare = $j1data[0];
		$j1_nightCharge = $j1data[1];
		return array($j1_fare,$j1_nightCharge);
	}
	else{
		$j1data = rateWithSurcharge($passengers,$j1pickup,$j1drop,$j1pickupTime);
		$j2data = rateWithSurcharge($passengers,$j2pickup,$j2drop,$j2pickupTime);
		$j1_fare = $j1data[0];
		$j1_nightCharge = $j1data[1];
		$j2_fare = $j2data[0];
		$j2_nightCharge = $j2data[1];
		return array($j1_fare, $j1_nightCharge, $j2_fare, $j2_nightCharge);

	}
}
?>