<?php  
$conn =  mysqli_connect("localhost", "root", "", "myguest");
mysqli_select_db($conn, "myguest") or die("Cannot connect to database");
$qc_to = "";
$qc_from = " ";
$qc_passengers = "";

$qc_from = $_REQUEST['qc_from'];
 $qc_to = $_REQUEST['qc_to'];
$qc_passengers =  $_REQUEST['qc_passengers'];



if (array_key_exists('qc_to', $_REQUEST)) {

    $qc_from = $_REQUEST['qc_from'];
    $qc_to = $_REQUEST['qc_to'];
    $qc_passengers =  $_REQUEST['qc_passengers'];
}



 
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






<!DOCTYPE html>
<html lang="en">

<head>
    <title>Book Your Transfer</title>
    <meta name="description"
        content="Cheap Transfers from Beauvais, Orly and CDG Airports to Paris City and Disneyland Paris" />
    <meta name="LANGUAGE" content="EN" />
    <meta name="COPYRIGHT" content="Paris Airport Transfers" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <<link href='https://fonts.googleapis.com/css?family=Roboto:300|Source+Sans+Pro|Fugaz+One:300' rel='stylesheet'
        type='text/css'>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.min.css">
        <!--Essential-->
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
        <!--Essential-->
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <!--Essential-->
        <link rel="stylesheet" href="asset/css/jquery.ptTimeSelect.css" />
        <script type="text/javascript" src="asset/js/jquery.ptTimeSelect.js"></script>

        <link rel="stylesheet" href="asset/css/full-width.css" />
        <link rel="stylesheet" href="asset/css/offer.css" />
        <link rel="stylesheet" href="asset/css/form_elements.css" />
        <link rel="stylesheet" href="asset/reservation/stylesheet.css">

        <link href="asset/css/mobile.css" rel="stylesheet" type="text/css" media="screen and (max-width: 635px)" />
        <link rel="icon" href="asset/images/icon.png">

        <!-- Global site tag (gtag.js) - Google AdWords: 826365036 -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-826365036"></script>
        <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-826365036');
        </script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-112756098-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-112756098-1');
        </script>
</head>

<body>

    <!--logo header-->
    <div class="offer-bar">
        <div class="offer-text vibrate-1"> 15% off for Chrismas & New Year </div>
    </div>
    <div id="logo_bar">
        <div id="logo_container">
            <img src="asset/images/paris_airport_transfers.png" alt="CDG Disney Transfers">
        </div>
    </div>
    <!--nav-->
    <nav>
        <ul>
            <a href="index.php" onClick="showhome();">
                <li>HOME</li>
            </a>
            <a href="booking.php" onClick="booknow();">
                <li>BOOK YOUR TRANSFER</li>
            </a>
            <a href="contactus.php" onClick="contactus();">
                <li>CONTACT</li>
            </a>
            <a href="tel:+33000000000">
                <li>Tel: +33 000 000 000</li>
            </a>
        </ul>
        <div class="handle">
            <span style="margin-left:15px;">MENU</span>
            <img src="asset/images/responsive_menu.png" height="45" align="right" style="margin-right:10px;" />
        </div>
    </nav>


    <div id="quickcalc">
        <div class="wrap_900" id="reservaation_text">
            <h2>Booking Form</h2>
            <p><strong>Please fill the booking form below.</strong> <br>To Confirm Your booking. Simply check the
                automated email you get from us, and confirm the journy by replying back to the email. That's it!</p>
            <div id="calculator">
                <div id="res-container" class="res-container">
                    <form onsubmit="return false" id="reservation" class="form">
                        <div id="phase1">
                            <p class="title">Journey Details</p>
                            <hr />
                            <table style="width:100%;">
                                <tr>
                                    <td style="width:50%;">
                                        <p class="inline">Journey Type</p>
                                    </td>
                                    <td>
                                        <p class="inline">Passengers</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select id="journeytype" name="journeytype">
                                            <option value="Oneway">Oneway</option>
                                            <option value="Roundtrip">Roundtrip</option>
                                        </select>
                                    </td>
                                    <form action="booking.php" method ="post">
                                    <td>
                                        <select id="passengers" name="passengers" onchange="executeQuickCalc();">
                                        <option value="" selected>   <?php echo ""   . $qc_passengers. ""; ?> </option>
                                            <?php for ($i = 1; $i <= 30; $i++) { ?>
                                            <?php echo '<option value="'.$i.'">'.$i.'</option>'; ?>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <hr class="break" />
                            <!-- Joutney 1-->
                            <p class="title titletopspace">Journey 1 Details</p>
                            <hr />
                            <p id="j1pickuptext" class="inline">Pickup Point</p>
                            <p class="error" id="j1pickup_error"></p>
                            <select id="j1pickup" name="j1pickup" onchange="executeQuickCalc();">
                                <option value="">Select Pickup Point</option>
                                <option value="" selected>   <?php echo ""   . $qc_from . ""; ?> </option>
                                <optgroup label="Airports">
                                    <option value="Charles De Gaulle Airport">CDG Airport</option>
                                    <option value="Beauvais Airport">Beauvais Airport</option>
                                    <option value="Orly Airport">Orly Airport</option>
                                </optgroup>
                                <optgroup label="Other">
                                    <option value="Paris">Paris</option>
                                    <option value="Disneyland">Disneyland (Any Hotel / Address)</option>
                                </optgroup>
                                <optgroup label="Paris Train Stations">
                                    <option value="Gare du Nord">Gare du Nord</option>
                                    <option value="Gare d'Austerlitz">Gare d'Austerlitz</option>
                                    <option value="Gare de Bercy">Gare de Bercy</option>
                                    <option value="Gare de Paris-Est">Gare de Paris-Est</option>
                                    <option value="Gare Montparnasse">Gare Montparnasse</option>
                                    <option value="Gare Saint Lazarre">Gare Saint Lazarre</option>
                                </optgroup>
                            </select>
                            <p id="j1pickupaddresstext" class="inline">Pickup Address or Hotel Name</p>
                            <p class="error" id="j1pickupaddress_error"></p>
                            <input id="j1pickupaddress" name="j1pickupaddress" type="text" value="" />
                            <hr class="break" />
                            <!--J1 Pickup Data-->
                            <table style="width:100%;">
                                <tr>
                                    <td>
                                        <p id="j1pickupdatetext" class="inline">Pickup Date</p>
                                        <p class="error" id="j1pickupdate_error"></p>
                                    </td>
                                    <td>
                                        <p id="j1pickuptimetext" class="inline">Pickup Time</p>
                                        <p class="error" id="j1pickuptime_error"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="" id="j1pickupdate" name="j1pickupdate" value="" />
                                    </td>
                                    <td>
                                        <input type="text" class="" id="j1pickuptime" name="j1pickuptime" value=""
                                            placeholder="e.g. 03:15 AM" />
                                    </td>
                                </tr>
                            </table>
                            <!--J1 Flight Data-->
                            <table id="j1flightdetails" style="width:100%;">
                                <tr>
                                    <td>
                                        <p id="j1flightnotext" class="inline">Flight No</p>
                                        <p class="error" id="j1flightno_error"></p>
                                    </td>
                                    <td>
                                        <p id="j1origintext" class="inline">Flight Origin</p>
                                        <p class="error" id="j1origin_error"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" id="j1flightno" name="j1flightno" value="" />
                                    </td>
                                    <td>
                                        <input type="text" id="j1origin" name="j1origin" value="" />
                                    </td>
                                </tr>
                            </table>
                            <p id="j1droptext" class="inline">Drop Point</p>
                            <p class="error" id="j1drop_error"></p>
                            <select id="j1drop" name="j1drop" onchange="executeQuickCalc();">
                                <option value="">Select Drop Point</option>
                                <option value="" selected>   <?php echo ""   . $qc_to . ""; ?> </option>s
                                <optgroup label="Airports">
                                    <option value="Charles De Gaulle Airport">CDG Airport</option>
                                    <option value="Beauvais Airport">Beauvais Airport</option>
                                    <option value="Orly Airport">Orly Airport</option>
                                </optgroup>
                                <optgroup label="Other">
                                    <option value="Paris">Paris</option>
                                    <option value="Disneyland">Disneyland (Any Hotel / Address)</option>
                                </optgroup>
                                <optgroup label="Paris Train Stations">
                                    <option value="Gare du Nord">Gare du Nord</option>
                                    <option value="Gare d'Austerlitz">Gare d'Austerlitz</option>
                                    <option value="Gare de Bercy">Gare de Bercy</option>
                                    <option value="Gare de Paris-Est">Gare de Paris-Est</option>
                                    <option value="Gare Montparnasse">Gare Montparnasse</option>
                                    <option value="Gare Saint Lazarre">Gare Saint Lazarre</option>
                                </optgroup>
                            </select>
                            <p id="j1dropaddresstext" class="inline">Drop Address or Hotel Name</p>
                            <p class="error" id="j1dropaddress_error"></p>
                            <input type="text" id="j1dropaddress" name="j1dropaddress" value="" />
                            <!-- Joutney 2-->
                            <div id="j2">
                                <hr class="break" />
                                <p class="title titletopspace">Journey 2 Details</p>
                                <hr />
                                <p id="j2pickuptext" class="inline">Pickup Point</p>
                                <p class="error" id="j2pickup_error"></p>
                                <select id="j2pickup" name="j2pickup" onchange="executeQuickCalc();">
                                    <option value="">Select Pickup Point</option>
                                    <optgroup label="Airports">
                                        <option value="Charles De Gaulle Airport">CDG Airport</option>
                                        <option value="Beauvais Airport">Beauvais Airport</option>
                                        <option value="Orly Airport">Orly Airport</option>
                                    </optgroup>
                                    <optgroup label="Other">
                                        <option value="Paris">Paris</option>
                                        <option value="Disneyland">Disneyland (Any Hotel / Address)</option>
                                    </optgroup>
                                    <optgroup label="Paris Train Stations">
                                        <option value="Gare du Nord">Gare du Nord</option>
                                        <option value="Gare d'Austerlitz">Gare d'Austerlitz</option>
                                        <option value="Gare de Bercy">Gare de Bercy</option>
                                        <option value="Gare de Paris-Est">Gare de Paris-Est</option>
                                        <option value="Gare Montparnasse">Gare Montparnasse</option>
                                        <option value="Gare Saint Lazarre">Gare Saint Lazarre</option>
                                    </optgroup>
                                </select>
                                <p id="j2pickupaddresstext" name ="j2pickupaddresstext"  class="inline">Pickup Address or Hotel Name</p>
                                <p class="error" id="j2pickupaddress_error"></p>
                                <input id="j2pickupaddress" name="j2pickupaddress" type="text" value="" />
                                <hr class="break" />
                                <table style="width:100%;" class="j2">
                                    <tr>
                                        <td>
                                            <p id="j2pickupdatetext" name="j2pickupdatetext" class="inline">Pickup Date</p>
                                            <p class="error" id="j2pickupdate_error"></p>
                                        </td>
                                        <td>
                                            <p id="j2pickuptimetext" name ="j2pickuptimetext" class="inline">Pickup Time</p>
                                            <p class="error" id="j2pickuptime_error"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="calendar_icon" id="j2pickupdate"
                                                name="j2pickupdate" value="" />
                                        </td>
                                        <td>
                                            <input type="text" class="clock_icon" id="j2pickuptime" name="j2pickuptime"
                                                value="" placeholder="e.g. 03:15 AM" />
                                        </td>
                                    </tr>
                                </table>
                                <table id="j2flightdetails" style="width:100%;">
                                    <tr>
                                        <td>
                                            <p id="j2flightnotext" class="inline">Flight No</p>
                                            <p class="error" id="j2flightno_error"></p>
                                        </td>
                                        <td>
                                            <p id="j2origintext" class="inline">Flight Origin</p>
                                            <p class="error" id="j2origin_error"></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" id="j2flightno" name="j2flightno" value="" />
                                        </td>
                                        <td>
                                            <input type="text" id="j2origin" name="j2origin" value="" />
                                        </td>
                                    </tr>
                                </table>
                                <p id="j2droptext" class="inline">Drop Point</p>
                                <p class="error" id="j2drop_error"></p>
                                <select id="j2drop" name="j2drop" onchange="executeQuickCalc();">
                                    <option value="">Select Drop Point</option>
                                    <optgroup label="Airports">
                                        <option value="Charles De Gaulle Airport">CDG Airport</option>
                                        <option value="Beauvais Airport">Beauvais Airport</option>
                                        <option value="Orly Airport">Orly Airport</option>
                                    </optgroup>
                                    <optgroup label="Other">
                                        <option value="Paris">Paris</option>
                                        <option value="Disneyland">Disneyland (Any Hotel / Address)</option>
                                    </optgroup>
                                    <optgroup label="Paris Train Stations">
                                        <option value="Gare du Nord">Gare du Nord</option>
                                        <option value="Gare d'Austerlitz">Gare d'Austerlitz</option>
                                        <option value="Gare de Bercy">Gare de Bercy</option>
                                        <option value="Gare de Paris-Est">Gare de Paris-Est</option>
                                        <option value="Gare Montparnasse">Gare Montparnasse</option>
                                        <option value="Gare Saint Lazarre">Gare Saint Lazarre</option>
                                    </optgroup>
                                </select>
                                <p id="j2dropaddresstext" class="inline">Drop Address or Hotel Name</p>
                                <p class="error" id="j2dropaddress_error"></p>
                                <input type="text" id="j2dropaddress" name="j2dropaddress" value="" />
                            
                            </div>
                            <script>
									function executeQuickCalc(){
										if ($(qc_from).val() == "" || $(qc_to).val() == "" || $(qc_passengers).val() ==""){
										}
										else{
											var url = "price.php";
											$("#qc_result").html('<img src="reservations/loading.gif" height="15">').show();
											$.post(url,{	   
												qc_passengers : $("#qc_passengers").val(),
												qc_from: $("#qc_from").val(), 
											qc_to: $("#qc_to").val()}, function(data)
											{
												$("#qc_result").html(data).show();
											});
										}
									}
									
									function executeQuickCalc1(){
										if ($(qc_from).val() == "" || $(qc_to).val() == "" || $(qc_passengers).val() =="" ||$(qc_from1).val() == "" || $(qc_to1).val() == "" ){
											$(document).ajaxError(function(){
												alert("An error occured!");
											});
											}else{
											var url = "two_location.php";
											$("#qc_result1").html('<img src="reservations/loading.gif" height="15">').show();
											$.post(url,{	   
												qc_passengers1 : $("#qc_passengers").val(),
												qc_from1: $("#qc_from1").val(), 
											qc_to1: $("#qc_to1").val(),
											qc_from2: $("#qc_from1").val(), 
										qc_to2: $("#qc_to1").val()},
										function(data)
										{
											$("#qc_result1").html(data).show();
										});
									}
									}
									
								</script> 

                            <hr class="break" />
                            <div class="show_price"
                                style="text-align:center; padding-top:15px; padding-bottom: 15px; font-size: 1.7rem">
                                <?php echo "€" . $price .   ".00"; ?></div>
                            <button id="ProcessStage3" class="processbuttons" style="width:250px; margin-top:10px;">Get
                                Price & Complete Booking</button>
                        </div>

                        <div id="phase2">
                            <div id="invoice" style="text-align:center;"></div>
                            <!-- Personal Details -->
                            <p class="title titletopspace">Personal Details</p>
                            <hr />
                            <p class="inline">Name</p>
                            <p class="error" id="name_error"></p>
                            <input type="text" id="name" name="name" value="" />
                            <p class="inline">Email</p>
                            <p class="error" id="email_error"></p>
                            <input type="text" id="email" name="email" value="" />
                            <p class="inline">Telephone (With County Code)</p>
                            <p class="error" id="phone_error"></p>
                            <input type="text" id="phone" name="phone" value="" />
                            <p class="inline">Extra Notes (e.g: Provide 1 baby car seat)</p>
                            <p class="error" id="notes_error"></p>
                            <input type="text" id="notes" name="notes"
                                placeholder="e.g: Provide one car seat and one booter seat." value="" />

                            <!-- Journey Details -->
                            <button class="processbuttons" onclick="GotoStage(1);">Go Back</button>
                            <button id="SubmitReservation" class="processbuttons">Submit Reservation</button>
                        </div>
                    </form>
                    <div id="sendmail" style="text-align:center;"></div>
                </div>
                <script src="asset/reservation/calculator.js"></script>
                <!--Essential-->
            </div>
            <br><br>
        </div>
    </div>

    <!--footer-->
    <div id="footer">
        Cheap Transfers from Beauvais, Orly and CDG Airports
    </div>

    <script>
    function Processcontactform() {
        var contact_error = "";
        contact_error += Check_Empty("contact_name", "required", "5");
       contact_error += Validate_Email("contact_email", "true", "required", "invalid email", "6");
        contact_error += Check_Empty("contact_telephone", "required", "5");
        return contact_error;
   }


    //function contactForm() {
       /// $("#sendmail").html('<img src="asset/reservation/wait.gif" height="200">').show();
       /// var url = "asset/includes/contact_form.php";

      //  $.post(url, {
          //  j2dropaddress: $("#j2dropaddress").val(),
          //  name: $("#contact_name").val(),
          //  email: $("#contact_email").val(),
          //  telephone: $("#contact_telephone").val(),
          //  message: $("#contact_message").val()
      //  }, function(data) {
          //  $("#contactform").html(data).show();
      //  });
   // }
    </script>
</body>

</html>