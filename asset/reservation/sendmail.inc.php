<?php require'calculate_fare.php'; require'config.inc.php';
function CheckAirport($t0){
	$f1=array("Charles De Gaulle Airport","Orly Airport","Beauvais Airport","Gare du Nord","Gare d'Austerlitz","Gare de Bercy","Gare de Paris-Est","Gare de Paris-Est","Gare Saint Lazarre");
	if(in_array($t0,$f1)){
		return $o2=true;
	}
	else{
		return $o2=false;
	}
}
function dbRowInsert($b3,$t4){
	$v5=array_keys($t4);$d6="INSERT INTO ".$b3."(`".implode('`,`',$v5)."`)VALUES('".implode("','",$t4)."')";
	mysql_query($d6);
	return mysql_insert_id();
}
	$s7=displayInvoice($_POST["passengers"],$_POST["journeytype"],$_POST["j1pickup"],$_POST["j1drop"],$_POST["j1pickuptime"],$_POST["j2pickup"],$_POST["j2drop"],$_POST["j2pickuptime"]);
	$j8=$s7[0];
	$x9=$s7[2];
	$g10=array('journeytype'=>$_POST["journeytype"],'passengers'=>$_POST["passengers"],'j1pickup'=>$_POST["j1pickup"],'j1pickupaddress'=>$_POST["j1pickupaddress"],'j1pickupdate'=>$_POST["j1pickupdate"],'j1pickuptime'=>$_POST["j1pickuptime"],'j1flightno'=>$_POST["j1flightno"],'j1origin'=>$_POST["j1origin"],'j1drop'=>$_POST["j1drop"],'j1dropaddress'=>$_POST["j1dropaddress"],'j2pickup'=>$_POST["j2pickup"],'j2pickupaddress'=>$_POST["j2pickupaddress"],'j2pickupdate'=>$_POST["j2pickupdate"],'j2pickuptime'=>$_POST["j2pickuptime"],'j2flightno'=>$_POST["j2flightno"],'j2origin'=>$_POST["j2origin"],'j2drop'=>$_POST["j2drop"],'j2dropaddress'=>$_POST["j2dropaddress"],'name'=>$_POST["name"],'email'=>$_POST["email"],'telephone'=>$_POST["phone"],'j1price'=>$j8,'j2price'=>$x9,'extranotes'=>$_POST["notes"]);
	$x11=dbRowInsert('reservation_new',$g10);$u12=displayInvoice($g10['passengers'],$g10['journeytype'],$g10['j1pickup'],$g10['j1drop'],$g10['j1pickuptime'],$g10['j2pickup'],$g10['j2drop'],$g10['j2pickuptime']);
	$m13=$u12[0];$j14=$u12[1];$e15="";
	$e16="";
	if($_POST["journeytype"]=="Roundtrip"){
		$e15=$u12[2];
		$e16=$u12[3];
	}
	$a17=<<< EOT
<!--header-->
<table @CLASSTABLE@>
<tr>
<td @MAINTITLE@ colspan="2">@BUSINESS_NAME@ BOOKING CONFIRMATION</td></tr>
<tr><td @CLASSDATA@ colspan="2">Dear @NAME@,</td><tr>
<tr><td @CLASSDATA@ colspan="2">Thank you for choosing @BUSINESS_NAME@</td></tr>
<tr><td @CLASSREFERENCE@ colspan="2"><strong>YOUR REFERENCE NO</strong>: @REFERENCE_PREFIX@-@REFERENCENO@</td></tr>
<tr><td @CLASSREFERENCE@ colspan="2"><strong>YOUR FARE</strong>: &#8364;@TOTAL@ <span syle="font-size:9px;">(Detailed Invoice Below)</span></td></tr>
<tr><td @CLASSDATA@ colspan="2"><strong style="color:#F60; text-align:center;">IMPORTANT! CHECK IF THE BELOW DETAILS ARE ACCURATE AND REPLY "CONFIRM" to CONFIRM YOUR JOURNEY WITH US</strong></td></tr>
<tr><td @CLASSINSTRUCTIONS@ colspan="2">* Your driver will meet you at the arrivals gate.</td></tr>
<tr><td @CLASSINSTRUCTIONS@ colspan="2">* Please provide a printed or digital copy of this email to the driver.</td></tr>  
<tr><td @CLASSINSTRUCTIONS@ colspan="2">* Please swith mobile on upon arrival so, we can get in touch if needed.</td></tr>
<tr><td @CLASSINSTRUCTIONS@ colspan="2">* Payments must be settled at the end of each journey.</td></tr>
<tr><td @CLASSINSTRUCTIONS@ colspan="2">* If you cannot locate the driver, please call our hotline <strong>@BUSINESS_TEL@</strong></td></tr>
<tr><td @CLASSINSTRUCTIONS@ colspan="2">Thank You,</td></tr>
<tr><td @CLASSINSTRUCTIONS@ colspan="2">Best Regards,</td></tr>
<tr><td @CLASSINSTRUCTIONS@ colspan="2">@BUSINESS_NAME@</td></tr>
</td>
</tr>
<!--/header-->
EOT;$a17.=<<< EOT
<tr><td @CLASSTITLE@ colspan="2">Your Invoice (in &#8364;) (Passengers: @PASSENGERS@)</td></tr>
<tr><td @CLASSDATA@>Journey 1 Fare </td><td>@J1FARE@</td></tr>
EOT;$h18=$m13;if($j14=="1"){$a17.=<<< EOT
<tr><td @CLASSDATA@>Journey 1 Night Charge</td><td>@J1NIGHTCHARGE@</td></tr>
EOT;$h18+=NIGHT_SURCHARGE;}if($g10['journeytype']=="Roundtrip"){$a17.=<<< EOT
<tr><td @CLASSDATA@>Journey 2 Fare </td><td>@J2FARE@</td></tr>
EOT;$h18+=$e15;if($e16=="1"){$a17.=<<< EOT
<tr><td @CLASSDATA@>Journey 2 Night Charge </td><td>@J2NIGHTCHARGE@</td></tr>
EOT;$h18+=NIGHT_SURCHARGE;}}$a17.=<<< EOT
	<tr><td @CLASSDATA@>Total </td><td>@TOTAL@</td></tr>
EOT;$a17.=<<< EOT
<tr><td @CLASSTITLE@ colspan="2">Journey 1 Details</td></tr>
EOT;if(!CheckAirport($g10['j1pickup'])){$a17.=<<< EOT
<tr><td @CLASSDATA@>Pickup Address</td><td>@J1PICKUPADDRESS@, @J1PICKUP@</td></tr>
EOT;}else{$a17.=<<< EOT
<tr><td @CLASSDATA@>Pickup Point</td><td>@J1PICKUP@</td></tr>
EOT;}$a17.=<<< EOT
<tr><td @CLASSDATA@>Pickup Date / Time</td><td>@J1PICKUPDATE@ at @J1PICKUPTIME@</td></tr>
EOT;if(CheckAirport($g10['j1pickup'])){$a17.=<<< EOT
<tr><td @CLASSDATA@>Flight / Train Details</td><td>@J1FLIGHTNO@ from @J1FLIGHTORIGIN@</td></tr>
EOT;}if(!CheckAirport($g10['j1drop'])){$a17.=<<< EOT
<tr><td @CLASSDATA@>Drop Address</td><td>@J1DROPADDRESS@, @J1DROP@</td></tr>
EOT;}else{$a17.=<<< EOT
<tr><td @CLASSDATA@>Drop Point</td><td>@J1DROP@</td></tr>
EOT;}if($g10['journeytype']=="Roundtrip"){$a17.=<<< EOT
<tr><td @CLASSTITLE@ colspan="2">Journey 2 Details</td></tr>
EOT;if(!CheckAirport($g10['j2pickup'])){$a17.=<<< EOT
<tr><td @CLASSDATA@>Pickup Address</td><td>@J2PICKUPADDRESS@, @J2PICKUP@</td></tr>
EOT;}else{$a17.=<<< EOT
<tr><td @CLASSDATA@>Pickup Point</td><td>@J2PICKUP@</td></tr>
EOT;}$a17.=<<< EOT
<tr><td @CLASSDATA@>Pickup Date / Time</td><td>@J2PICKUPDATE@ at @J2PICKUPTIME@</td></tr>
EOT;if(CheckAirport($g10['j2pickup'])){$a17.=<<< EOT
<tr><td @CLASSDATA@>Flight / Train Details</td><td>@J2FLIGHTNO@ from @J2FLIGHTORIGIN@</td></tr>
EOT;}if(!CheckAirport($g10['j2drop'])){$a17.=<<< EOT
<tr><td @CLASSDATA@>Drop Address</td><td>@J2DROPADDRESS@, @J2DROP@</td></tr>
EOT;}else{$a17.=<<< EOT
<tr><td @CLASSDATA@>Drop Point</td><td>@J2DROP@</td></tr>
EOT;}}$a17.=<<< EOT
	<tr><td @CLASSTITLE@ colspan="2">Personal Details</td></tr>
	<tr><td @CLASSDATA@>Name</td><td>@NAME@</td></tr>
	<tr><td @CLASSDATA@>Email</td><td>@EMAIL@</td></tr>
	<tr><td @CLASSDATA@>Telephone</td><td>@TELEPHONE@</td></tr>
	<tr><td @CLASSDATA@ colspan="2"><strong>notes:</strong> @EXTRANOTES@</td></tr>
EOT;
$a17=str_replace('@BUSINESS_NAME@',BUSINESS_NAME,$a17);
$a17=str_replace('@BUSINESS_TEL@',BUSINESS_TELEPHONE,$a17);
$a17=str_replace('@REFERENCE_PREFIX@',REFERENCE_PREFIX,$a17);
$a17=str_replace('@JOURNEYTYPE@',$g10['journeytype'],$a17);
$a17=str_replace('@PASSENGERS@',$g10['passengers'],$a17);
$a17=str_replace('@NAME@',$g10['name'],$a17);
$a17=str_replace('@EMAIL@',$g10['email'],$a17);
$a17=str_replace('@TELEPHONE@',$g10['telephone'],$a17);
$a17=str_replace('@EXTRANOTES@',$g10['extranotes'],$a17);
$a17=str_replace('@REFERENCENO@',$x11,$a17);
$a17=str_replace('@J1FARE@',number_format($m13,2,'.',' '),$a17);
$a17=str_replace('@J1NIGHTCHARGE@',number_format(NIGHT_SURCHARGE,2,'.',' '),$a17);
if($g10['journeytype']=="Roundtrip"){
	$a17=str_replace('@J2FARE@',number_format($e15,2,'.',' '),$a17);
	$a17=str_replace('@J2NIGHTCHARGE@',number_format(NIGHT_SURCHARGE,2,'.',' '),$a17);
}
$a17=str_replace('@TOTAL@',number_format($h18,2,'.',' '),$a17);
$a17=str_replace('@J1PICKUPADDRESS@',$g10['j1pickupaddress'],$a17);
$a17=str_replace('@J1PICKUP@',$g10['j1pickup'],$a17);
$a17=str_replace('@J1PICKUPDATE@',$g10['j1pickupdate'],$a17);
$a17=str_replace('@J1PICKUPTIME@',$g10['j1pickuptime'],$a17);
$a17=str_replace('@J1FLIGHTNO@',$g10['j1flightno'],$a17);
$a17=str_replace('@J1FLIGHTORIGIN@',$g10['j1origin'],$a17);
$a17=str_replace('@J1DROPADDRESS@',$g10['j1dropaddress'],$a17);
$a17=str_replace('@J1DROP@',$g10['j1drop'],$a17);
$a17=str_replace('@J2PICKUPADDRESS@',$g10['j2pickupaddress'],$a17);
$a17=str_replace('@J2PICKUP@',$g10['j2pickup'],$a17);
$a17=str_replace('@J2PICKUPDATE@',$g10['j2pickupdate'],$a17);
$a17=str_replace('@J2PICKUPTIME@',$g10['j2pickuptime'],$a17);
$a17=str_replace('@J2FLIGHTNO@',$g10['j2flightno'],$a17);
$a17=str_replace('@J2FLIGHTORIGIN@',$g10['j2origin'],$a17);
$a17=str_replace('@J2DROPADDRESS@',$g10['j2dropaddress'],$a17);
$a17=str_replace('@J2DROP@',$g10['j2drop'],$a17);
$a17=str_replace('@CLASSTABLE@','style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:#666; max-width:500px; padding:5px; border-radius:5px; border: 1px solid #999; margin: 0 auto; background:#fff;"',$a17);
$a17=str_replace('@MAINTITLE@','style="background:#b98be1; text-align:center; padding:3px; color:#fff; height:30px; font-size:18px; line-height:30px;"',$a17);
$a17=str_replace('@CLASSTITLE@','style="background:#E8E8E8; height:20px; line-height:20px; padding:0 5px 0 5px;"',$a17);
$a17=str_replace('@CLASSREFERENCE@','style="background:#E8E8E8; text-align:center; height:25px; line-height:25px;"',$a17);
$a17=str_replace('@CLASSDATA@','style="height:20px; width:170px; line-height:20px; padding:0 5px 0 5px;"',$a17);
$a17=str_replace('@CLASSINSTRUCTIONS@','style="font-size:11px; height:15px; line-height:18px; padding:0 5px 0 5px;"',$a17);
$a17;require'../phpmailer/PHPMailerAutoload.php';
$m19=new PHPMailer;
$m19->isSMTP();
$m19->$i20=EMAIL_HOST;
$m19->$z21=true;
$m19->$u22=EMAIL_USERNAME;
$m19->$k23=EMAIL_PASSWORD;
$m19->$m24='ssl';
$m19->$r25=465;$m19->$k26=EMAIL_FROM;$m19->$e27=EMAIL_FROMNAME;
$m19->addAddress($g10['email'],$g10['name']);
$m19->addReplyTo(REPLY_EMAIL,BUSINESS_NAME);
$m19->isHTML(true);
$m19->$k28=EMAIL_SUBJECT;
$m19->$m29=$a17;
if(!$m19->send()){
	echo FAILURE_MESSAGE;
	}
	else{
		echo SUCCESS_MESSAGE;
		}
		$m19->$k26=$g10['email'];
		$m19->$e27=$g10['name'];
		$m19->addAddress(BUSINESS_EMAIL,BUSINESS_NAME);
		$m19->ClearReplyTos();
		$m19->addReplyTo($g10['email'],$g10['name']);
		if(!$m19->send()){

		}
		else
		{?>
<script>
window.location = "booking_complete.php?id=<?php echo $x11;?>&value=<?php echo $h18;?>"
</script>
<?php }?>