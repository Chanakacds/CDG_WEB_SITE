<?php
include 'db.inc.php';
function CheckAirport($location)
{
if($location == "Charles De Gaulle Airport" || $location == "Orly Airport" || $location == "Beauvais Airport" || $location == "Gare du Nord" || $location == "Gare d'Austerlitz" || $location == "Gare de Bercy" || $location == "Gare de Paris-Est" || $location == "Gare de Paris-Est" || $location == "Gare Saint Lazarre")
	{ 
	return $airport = true; 
	}	
}

function dbRowInsert($table_name, $form_data)
{
    // retrieve the keys of the array (column titles)
    $fields = array_keys($form_data);

    // build the query
    $sql = "INSERT INTO ".$table_name."
    (`".implode('`,`', $fields)."`)
    VALUES('".implode("','", $form_data)."')";

    // run and return the query result resource
    mysql_query($sql);
	return mysql_insert_id();
	
}

// again where clause is left optional
function dbRowUpdate($table_name, $form_data, $where_clause='')
{
    // check for optional where clause
    $whereSQL = '';
    if(!empty($where_clause))
    {
        // check to see if the 'where' keyword exists
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE')
        {
            // not found, add key word
            $whereSQL = " WHERE ".$where_clause;
        } else
        {
            $whereSQL = " ".trim($where_clause);
        }
    }
    // start the actual SQL statement
    $sql = "UPDATE ".$table_name." SET ";

    // loop and build the column /
    $sets = array();
    foreach($form_data as $column => $value)
    {
         $sets[] = "`".$column."` = '".$value."'";
    }
    $sql .= implode(', ', $sets);

    // append the where statement
    $sql .= $whereSQL;

    // run and return the query result
    return mysql_query($sql);
}



$data = array(
	'pickup' => $_POST["pickup"],
	'drop'   => $_POST["drop"],
	'journeytype' => $_POST["journey"],
	'passengers' => $_POST["passengers"],
	'amount' => $_POST["rate_value"],
	'name' => $_POST["name"],
	'email' => $_POST["email"],
	'telephone' => $_POST["telephone"],
	'j1pickupaddress' => $_POST["journey1_pickup_address"],
	'j1dropupaddress' => $_POST["journey1_drop_address"],
	'j1pickupdate' => $_POST["journey1_pickup_date"],
	'j1pickuptime' => $_POST["journey1_pickup_time"],
	'flightno' => $_POST["journey1_flight_no"],
	'flightorigin' => $_POST["journey1_flight_origin"],
	'j2pickupaddress' => $_POST["journey2_pickup_address"],
	'j2dropupaddress' => $_POST["journey2_drop_address"],
	'j2pickupdate' => $_POST["journey2_pickup_date"],
	'j2pickuptime' => $_POST["journey2_pickup_time"],
	'extranotes' => $_POST["extranotes"]
	);	

$reference = dbRowInsert('reservation', $data);

$update_index = array(
	'journey1refno' => "PDS".$reference."-".$data['j1pickupdate']."-J1"
	);

if ($data['journeytype']=="Round Trip")
	{
	$update_index['journey2refno'] = "PDS".$reference."-".$data['j2pickupdate']."-J2";
	}
	
dbRowUpdate('reservation', $update_index, "WHERE `id` = $reference");
	

$clientblurb =<<< EOT
<!--header-->
<table style="max-width:500px; padding:1px; margin: 0 auto; font-family:Arial, Helvetica, sans-serif; font-size:14px; border:1px solid #d3d4d4; color:#a1a1a1; margin-left:auto; margin-right:auto; border-radius:5px; font-weight:normal;">
<tr>
<td style="background:#9fcfff; height:50px; line-height:50px; text-align:center; border-radius:5px 5px 0 0; border:1px solid #63affa; font-size:20px; font-weight:normal; color:#0c2f52;" colspan="2">
Welcome to Business Name
</td>
</tr>
<tr>
<td colspan="2">
<br>
<p style="font-weight:normal;">Dear @NAME@,<br><br> 
Thank you for Business Name<br>
<center>
<span style="width:100%; text-align:center; background:#9fcfff; height:40px; line-height:40px; font-size:20px; border:#a0a0a0 solid 1px; padding:5px; color:#03366a;">YOUR REFERENCE NO: Prefix - @REFERENCENO@ </span></center><br>
<span style="color:#03366a;">PLEASE CHECK ALL JOURNEY DETAILS BELOW AND RECONFIRM YOUR BOOKING! (Unconfirmed bookings are not valid)</span><br><br>
* Your driver will be waiting for you at the customs exit with your name printed on a board.<br>
* Please make sure that you have a copy of the online invoice upon arrival<br>
* Please have your cell phone switched on as soon as you land, so that our drivers could easily contact you.<br>
* If you have any trouble finding your driver , please do not hesitate to contact our hotline <strong>Tel Number </strong><br><br>
Thank You,<br> <br> 
Best Regards,<br> 
Business Name</p>
</td>
</tr>
<!--/header-->
<tr><td class="subheaders" colspan="2">Journey Details</td></tr>
<tr><td class="data-title">Pickup Point</td><td>@PICKUPPOINT@</td></tr>
<tr><td class="data-title">Drop Point</td><td>@DROPPOINT@</td></tr>
<tr><td class="data-title">Journey Type</td><td>@JOURNEYTYPE@</td></tr>
<tr><td class="data-title">Number of Passengers</td><td>@PASSENGERS@</td></tr>
<tr><td class="data-title">Amount</td><td>@AMOUNT@</td></tr>
<tr><td class="subheaders" colspan="2">Personal Details</td></tr>
<tr><td class="data-title">Name</td><td>@NAME@</td></tr>
<tr><td class="data-title">Email</td><td>@EMAIL@</td></tr>
<tr><td class="data-title">Telephone</td><td>@TELEPHONE@</td></tr>
EOT;


$clientblurb .=<<< EOT
<tr><td class="subheaders" colspan="2">Journey 1: @PICKUPPOINT@ to @DROPPOINT@</td></tr>
EOT;

if (!CheckAirport($data['pickup']))
{
$clientblurb .=<<< EOT
<tr><td class="data-title">Pickup Address</td><td>@J1PICKUPADDRESS@</td></tr>
EOT;
}

if (!CheckAirport($data['drop']))
{
$clientblurb .=<<< EOT
<tr><td class="data-title">Drop Address</td><td>@J1DROPADDRESS@</td></tr>
EOT;
}

$clientblurb .=<<< EOT
<tr><td class="data-title">Pickup Date</td><td>@J1PICKUPDATE@</td></tr>
<tr><td class="data-title">pickup Time</td><td>@J1PICKUPTIME@</td></tr>
EOT;

if (CheckAirport($data['pickup']))
{
$clientblurb .=<<< EOT
<tr><td class="data-title">Flight Number</td><td>@J1FLIGHTNUMBER@</td></tr>
<tr><td class="data-title">Flight Origin</td><td>@J1FLIGHTORIGIN@</td></tr>
EOT;
}


if ($data['journeytype']=="Round Trip")
{
$clientblurb .=<<< EOT
<tr><td class="subheaders" colspan="2">Journey 2: @DROPPOINT@ to @PICKUPPOINT@</td></tr>
EOT;
if (!CheckAirport($data['drop']))
{
$clientblurb .=<<< EOT
<tr><td class="data-title">Pickup Address</td><td>@J2PICKUPADDRESS@</td></tr>
EOT;
}

if (!CheckAirport($data['pickup']))
{
$clientblurb .=<<< EOT
<tr><td class="data-title">Drop Address</td><td>@J2DROPADDRESS@</td></tr>
EOT;
}
$clientblurb .=<<< EOT
<tr><td class="data-title">Pickup Date</td><td>@J2PICKUPDATE@</td></tr>
<tr><td class="data-title">Pickup Time</td><td>@J2PICKUPTIME@</td></tr>
EOT;
}

if ($data['extranotes']!="")
{
$clientblurb .=<<< EOT
<tr><td colspan="2" class="subheaders"	>Extra Notes</td></tr>
<tr><td colspan="2">@EXTRANOTES@</td></tr>
EOT;
}


$clientblurb .=<<< EOT
</table>
</div>
EOT;

$clientblurb = str_replace('@REFERENCENO@',$reference, $clientblurb);
$clientblurb = str_replace('@PICKUPPOINT@',$data['pickup'], $clientblurb);
$clientblurb = str_replace('@DROPPOINT@',$data['drop'], $clientblurb);
$clientblurb = str_replace('@JOURNEYTYPE@',$data['journeytype'], $clientblurb);
$clientblurb = str_replace('@PASSENGERS@',$data['passengers'], $clientblurb);
$clientblurb = str_replace('@NAME@',$data['name'], $clientblurb);
$clientblurb = str_replace('@EMAIL@',$data['email'], $clientblurb);
$clientblurb = str_replace('@TELEPHONE@',$data['telephone'], $clientblurb);

if ($data['journeytype']=="Round Trip")
{
	$amount = $data['amount'] / 2;
	$amount_para = 'Journey 1: ('.number_format($amount, 2, '.', ' ').') + Journey 2: ('.number_format($amount, 2, '.', ' ').') = '.number_format($data['amount'], 2, '.', ' ').'  &#8364;';
	$clientblurb = str_replace('@AMOUNT@',$amount_para, $clientblurb);
}
else
{
	$amount_para = number_format($data['amount'], 2, '.', ' ').' &#8364;';
	$clientblurb = str_replace('@AMOUNT@',$amount_para, $clientblurb);
}

$clientblurb = str_replace('@J1PICKUPADDRESS@',$data['j1pickupaddress'], $clientblurb);
$clientblurb = str_replace('@J1DROPADDRESS@',$data['j1dropupaddress'], $clientblurb);
$clientblurb = str_replace('@J1PICKUPDATE@',$data['j1pickupdate'], $clientblurb);
$clientblurb = str_replace('@J1PICKUPTIME@',$data['j1pickuptime'], $clientblurb);
$clientblurb = str_replace('@J1FLIGHTNUMBER@',$data['flightno'], $clientblurb);
$clientblurb = str_replace('@J1FLIGHTORIGIN@',$data['flightorigin'], $clientblurb);

$clientblurb = str_replace('@J2PICKUPADDRESS@',$data['j2pickupaddress'], $clientblurb);
$clientblurb = str_replace('@J2DROPADDRESS@',$data['j2dropupaddress'], $clientblurb);
$clientblurb = str_replace('@J2PICKUPDATE@',$data['j2pickupdate'], $clientblurb);
$clientblurb = str_replace('@J2PICKUPTIME@',$data['j2pickuptime'], $clientblurb);

$clientblurb = str_replace('@EXTRANOTES@',$data['extranotes'], $clientblurb);
$clientblurb = str_replace('class="subheaders"','style="color:#ffffff; background:#419fff; font-weight:bold; padding:4px;"', $clientblurb);
$clientblurb = str_replace('class="data-title"','style="color:#03366a; background:#9fcfff; font-weight:normal; padding:4px;"', $clientblurb);



//echo $clientblurb;

require '../phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'localhost';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = '';                 // SMTP username
$mail->Password = '';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to
$fullname = "Business Name"; // add business name
$mail->From = 'bookings@sampledomain.com'; //from email
$mail->FromName = 'Business Name'; // from name
$mail->addAddress($data['email'], $data['name']);     // Add a recipient
$mail->AddBCC('test@replytoaddress.com', 'BBC NAME'); // Add blind copy to business
$mail->addReplyTo('test@replytoaddress.com', 'Business Name');
//$mail->addAttachment($pdffile);         // Add attachments
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject="Subject Here - Prefix-".$reference; // Add Subject Here
$mail->Body    = $clientblurb;

	if(!$mail->send()) {
    echo '<p style="color:#F00">Sorry! There was an error sending your email. Please call us using contact details on the Contact US page.</p>';
	//echo 'Mailer Error: ' . $mail->ErrorInfo;
	}	
	else
	{
	echo '<p style="color:#060">Thank you! your reservation is successfully placed</p>';
	}
	
	
	


?>