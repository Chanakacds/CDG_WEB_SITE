<?php $calltoajax ="onchange=\"xmlhttpPost('includes/calculate-rate.php', 'res-form', 'rate', 'Wait');\""; ?>
<div id="res-form" class="res-form">
    <form onsubmit="return false" id="res-form">
        <input type="hidden" value="res-form" name="display" id="display" />
        <input type="hidden" value="" name="rate_value" id="rate_value" />
        <div id="phase1">
            <span class="bigletters marginbottom20">Jouney Details</span>
            <p>Pickup Point</p><span class="error" id="pickup_error"></span>
            <select <?php echo $calltoajax; ?> id="pickup" name="pickup">
                <optgroup label="Airports">
                    <option selected="selected">Charles De Gaulle Airport</option>
                    <option>Beauvais Airport</option>
                    <option>Orly Airport</option>
                </optgroup>
                <optgroup label="Other">
                    <option>Paris</option>
                    <option>Disneyland</option>
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
            <p>Drop Point</p>
            <select <?php echo $calltoajax; ?> id="drop" name="drop">
                <optgroup label="Airports">
                    <option>Charles De Gaulle Airport</option>
                    <option>Beauvais Airport</option>
                    <option>Orly Airport</option>
                </optgroup>
                <optgroup label="Other">
                    <option>Paris</option>
                    <option selected="selected">Disneyland</option>
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
            <table style="width:100%; padding:0; margin:0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <p>Journey Type</p>
                        <select id="journey" name="journey" onchange="checkroundtrip();">
                            <option>One Way</option>
                            <option>Round Trip</option>
                        </select>

                    </td>
                    <td style="width:10px;"></td>
                    <td>
                        <p>Passengers</p>
                        <select <?php echo $calltoajax; ?> id="passengers" name="passengers">
                            <?php for ($i = 1; $i <= 30; $i++) { ?>
                            <?php echo '<option value="'.$i.'">'.$i.'</option>'; ?>
                            <?php } ?>
                        </select>
                    </td>
                <tr>
            </table>
            <span class="bigletters marginbottom20">Personal Details</span>
            <p>Name</p><span class="error" id="name_error"></span>
            <input name="name" id="name" type="text" value="" />
            <p>Email</p><span class="error" id="email_error"></span>
            <input name="email" type="text" id="email" placeholder="me@example.com" value="" />
            <p>Telephone</p><span class="error" id="telephone_error"></span>
            <input name="telephone" id="telephone" type="text" placeholder="e.g +44 77 214 5360" />
            <div class="button-row"><button onclick="processstage_1();" class="button_orange" id="button_orange">Enter
                    Journey Details ></button></div>
        </div>
        <!--phase1-->

        <div id="phase2">
            <div id="arrival">
                <span class="bigletters marginbottom20" id="journey_1_head">Pickup Journey Details</span>
                <p id="journey1_pickup_text">Pickup Address</p><span class="error"
                    id="journey1_pickup_address_error"></span>
                <input name="journey1_pickup_address" id="journey1_pickup_address" type="text" />
                <p id="journey1_drop_text">Drop Address</p><span class="error" id="journey1_drop_address_error"></span>
                <input name="journey1_drop_address" id="journey1_drop_address" type="text" />
                <table style="width:100%; padding:0; margin:0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <p>Pickup Date</p><span class="error" id="journey1_pickup_date_error"></span><input
                                name="journey1_pickup_date" id="journey1_pickup_date" type="text" />
                        </td>
                        <td style="width:10px;"></td>
                        <td>
                            <p>Pickup Time [use 24-hour]</p>
                            <span class="error" id="journey1_pickup_time_error"></span>
                            <span><input name="journey1_pickup_time" id="journey1_pickup_time" type="text"
                                    placeholder="00:00" /></span>
                        </td>
                    <tr>
                </table>
                <table style="width:100%; padding:0; margin:0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <p id="journey1_flight_no_text">Flight Number</p><span class="error"
                                id="journey1_flight_no_error"></span>
                            <input name="journey1_flight_no" id="journey1_flight_no" type="text" />
                        </td>
                        <td style="width:10px;"></td>
                        <td>
                            <p id="journey1_flight_origin_text">Flight Origin</p><span class="error"
                                id="journey1_flight_origin_error"></span>
                            <input name="journey1_flight_origin" id="journey1_flight_origin" type="text" />
                        </td>
                    <tr>
                </table>
            </div>
            <div id="departure">
                <span class="bigletters marginbottom20" id="journey_2_head">Departue Journey Details</span>
                <p id="journey2_pickup_text">Pickup Address</p><span class="error"
                    id="journey2_pickup_address_error"></span>
                <input name="journey2_pickup_address" id="journey2_pickup_address" type="text" />
                <p id="journey2_drop_text">Drop Address</p><span class="error" id="journey2_drop_address_error"></span>
                <input name="journey2_drop_address" id="journey2_drop_address" type="text" />
                <table style="width:100%; padding:0; margin:0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>
                            <p>Pickup Date</p><span class="error" id="journey2_pickup_date_error"></span><input
                                name="journey2_pickup_date" id="journey2_pickup_date" type="text" />
                        </td>
                        <td style="width:10px;"></td>
                        <td>
                            <p>Pickup Time [use 24-hour]</p>
                            <span class="error" id="journey2_pickup_time_error"></span><input
                                name="journey2_pickup_time" id="journey2_pickup_time" type="text" placeholder="00:00" />
                        </td>
                    <tr>
                </table>
            </div>
            <p id="extranotes_text">Extra Notes</p><span class="error" id="extranotes_error"></span>
            <input name="extranotes" id="extranotes" type="text" />
            <div class="rate_display">
                <div style="float:left; color:#828282; font-size:18px; padding-left:10px;" id="amountdisplay">Amount
                    &euro;</div>
                <div id="rate">...Please Wait...</div>
            </div>
            <div class="button-row"><button onclick="GotoStage(1);" id="edit_journey" class="button_orange"
                    style="margin-right:20px;">
                    < Go Back</button> <button onclick="processstage_2();" class="button_orange" id="btnsubmitform">
                        Submit Reservation >
                </button></div>

        </div>
        <!--phase4-->
    </form>
</div>
<!--qc-form-->

<script>
window.onload = function WindowLoad(event) {
    checkroundtrip();
    xmlhttpPost('includes/calculate-rate.php', 'res-form', 'rate', 'Wait');
}
</script>

<script>
$(function() {
    $("#journey1_pickup_date").datepicker({
        dateFormat: 'dd/mm/yy',
        minDate: 0
    }).val();
});
$(function() {
    $("#journey2_pickup_date").datepicker({
        dateFormat: 'dd/mm/yy',
        minDate: 0
    }).val();
});
</script>



<script>
function GotoStage(goto) {
    for (i = 1; i < 7; i++) {
        var phase = "phase" + i;
        if (i == goto) {
            _(phase).style.display = "block";
        } else
            _(phase).style.display = "none";
    }
}

function CheckAirport(location) {
    if (location == "Charles De Gaulle Airport" || location == "Orly Airport" || location == "Beauvais Airport" ||
        location == "Gare du Nord" || location == "Gare d'Austerlitz" || location == "Gare de Bercy" || location ==
        "Gare de Paris-Est" || location == "Gare de Paris-Est" || location == "Gare Saint Lazarre") {
        return airport = true;
    }
}

function checkroundtrip() {
    var status = _("journey").value
    if (status == "Round Trip") {
        _("departure").style.display = "block";
        xmlhttpPost('includes/calculate-rate.php', 'res-form', 'rate', 'Wait');
    }
    if (status == "One Way") {
        _("departure").style.display = "none";
        xmlhttpPost('includes/calculate-rate.php', 'res-form', 'rate', 'Wait');
    }
}


function Check_Empty(element_id, error) {
    var eid = _(element_id).value;
    var error_element = element_id + "_error";
    if (eid == "") {
        _(error_element).innerHTML = error;
        var error = 1;
        return error;
    } else {

        _(error_element).innerHTML = "";
        var error = 0;
        return error;
    }

}

function Validate_Email(element_id, required, empty_error, invalid_error) {
    var eid = _(element_id).value;
    var error_element = element_id + "_error";
    var re =
        /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (eid == "") {
        _(error_element).innerHTML = empty_error;
        var error = 1;
        return error;
    } else if (!re.test(eid)) {
        _(error_element).innerHTML = invalid_error;
        var error = 1;
        return error;
    } else {
        _(error_element).innerHTML = "";
        var error = 0;
        return error;
    }


}

function processstage_1() {
    var error = 0;
    var journey1_pickup_value = _("pickup").value;
    var journey1_drop_value = _("drop").value;
    var journey1_pickup_address = _("journey1_pickup_address");
    var journey1_pickup_text = _("journey1_pickup_text");
    var journey1_drop_address = _("journey1_drop_address");
    var journey1_drop_text = _("journey1_drop_text");
    var journey1_flight_no = _("journey1_flight_no");
    var journey1_flight_origin = _("journey1_flight_origin");


    var journey2_pickup_value = _("drop").value;
    var journey2_drop_value = _("pickup").value;
    var journey2_pickup_address = _("journey2_pickup_address");
    var journey2_pickup_text = _("journey2_pickup_text");
    var journey2_drop_address = _("journey2_drop_address");
    var journey2_drop_text = _("journey2_drop_text");



    error1 = Check_Empty("name", "name is required");
    error2 = Validate_Email("email", "true", "email is required", "email is incorrect");
    error3 = Check_Empty("telephone", "telephone is required");

    if (CheckAirport(journey1_pickup_value)) // If Journey 1 Pickup is an airport hide pickup address and text
    {
        journey1_pickup_text.style.display = "none";
        journey1_pickup_address.style.display = "none";
        journey1_flight_no.style.display = "block";
        journey1_flight_origin.style.display = "block";
        journey1_flight_no_text.style.display = "block";
        journey1_flight_origin_text.style.display = "block";
    } else {
        journey1_pickup_text.style.display = "block";
        journey1_pickup_address.style.display = "block";
        journey1_flight_no.style.display = "none";
        journey1_flight_origin.style.display = "none";
        journey1_flight_no_text.style.display = "none";
        journey1_flight_origin_text.style.display = "none";
    }

    if (CheckAirport(journey1_drop_value)) // If Journey 1 Drop is an airport hide drop address and text
    {
        journey1_drop_text.style.display = "none";
        journey1_drop_address.style.display = "none";
    } else {
        journey1_drop_text.style.display = "block";
        journey1_drop_address.style.display = "block";
    }

    if (CheckAirport(journey2_pickup_value)) // If Journey 2 Pickup is an airport hide drop address and text
    {
        journey2_pickup_text.style.display = "none";
        journey2_pickup_address.style.display = "none";
    } else {
        journey2_pickup_text.style.display = "block";
        journey2_pickup_address.style.display = "block";
    }

    if (CheckAirport(journey2_drop_value)) // If Journey 2 Drop is an airport hide drop address and text
    {
        journey2_drop_text.style.display = "none";
        journey2_drop_address.style.display = "none";
    } else {
        journey2_drop_text.style.display = "block";
        journey2_drop_address.style.display = "block";
    }
    //goto next stage
    if ((error1 == 0) && (error2 == 0) && (error3 == 0)) {
        xmlhttpPost('includes/calculate-rate.php', 'res-form', 'rate', 'Wait');
        _("journey_1_head").innerHTML = 'Journey 1: <span class="highlight">' + _("pickup").value +
            '</span> to <span class="highlight">' + _("drop").value + '</span>';
        _("journey_2_head").innerHTML = 'Journey 2: <span class="highlight">' + _("drop").value +
            '</span> to <span class="highlight">' + _("pickup").value + '</span>';
        _("rate_value").value = parseInt(_("rate").innerHTML);
        alert(_("rate_value").value);
        GotoStage(2);
    }
}

function processstage_2() {
    var error = "";
    var journey1_pickup_value = _("pickup").value;
    var journey1_drop_value = _("drop").value;
    var journey1_pickup_address = _("journey1_pickup_address");
    var journey1_drop_address = _("journey1_drop_address");
    var journey1_pickup_date = _("journey1_pickup_date");
    var journey1_pickup_time = _("journey1_pickup_time");
    var journey1_flight_no = _("journey1_flight_no");
    var journey1_flight_origin = _("journey1_flight_origin");

    var journey2_pickup_value = _("drop").value;
    var journey2_drop_value = _("pickup").value;
    var journey2_pickup_address = _("journey2_pickup_address");
    var journey2_drop_address = _("journey2_drop_address");
    var journey2_pickup_date = _("journey2_pickup_date");
    var journey2_pickup_time = _("journey2_pickup_time");

    if (_("journey").value == "Round Trip") {

        if (!CheckAirport(journey1_pickup_value)) //IF J1 Pickup is not an airport then verify J1 Pickup Address
        {
            error += Check_Empty("journey1_pickup_address", "journey 1 pickup address is required");
        } else {
            error += Check_Empty("journey1_flight_no", "flight landing time is required");
            error += Check_Empty("journey1_flight_origin", "flight origin is required");
        }

        if (!CheckAirport(journey1_drop_value)) //IF J1 Pickup is not an airport then verify J1 Pickup Address
        {
            error += Check_Empty("journey1_drop_address", "journey 1 drop address is required");

        }

        if (!CheckAirport(journey2_pickup_value)) //IF J1 Pickup is not an airport then verify J1 Pickup Address
        {
            error += Check_Empty("journey2_pickup_address", "journey 2 pickup address is required");
        }
        if (!CheckAirport(journey2_drop_value)) //IF J1 Pickup is not an airport then verify J1 Pickup Address
        {
            error += Check_Empty("journey2_pickup_address", "journey 2 drop address is required");
        }
        error += Check_Empty("journey1_pickup_date", "journey 1 pickup date is required");
        error += Check_Empty("journey1_pickup_time", "journey 1 pickup time is required");

        error += Check_Empty("journey2_pickup_date", "journey 2 pickup date is required");
        error += Check_Empty("journey2_pickup_time", "journey 2 pickup time is required");
        //IF J1 Drop is an airport then do not verify J1 Srop Address
    } else {
        if (!CheckAirport(journey1_pickup_value)) //IF J1 Pickup is not an airport then verify J1 Pickup Address
        {

            error += Check_Empty("journey1_pickup_address", "journey 1 pickup address is required");
        } else {
            error += Check_Empty("journey1_flight_no", "flight landing time is required");
            error += Check_Empty("journey1_flight_origin", "flight origin is required");
        }

        if (!CheckAirport(journey1_drop_value)) //IF J1 Pickup is not an airport then verify J1 Pickup Address
        {
            error += Check_Empty("journey1_drop_address", "journey 1 drop address is required");
        }
        error += Check_Empty("journey1_pickup_date", "journey 1 pickup date is required");
        error += Check_Empty("journey1_pickup_time", "journey 1 pickup time is required");
    }
    //alert (error);
    var what = error.match(/[0-9]+/)
    //alert (what);
    if (!error.match(/[1-9]+/)) {

        $ajaxrequest = xmlhttpPost('includes/send_email.inc.php', 'res-form', 'rate', 'Wait');
        //_("btnsubmitform").style.display="none";
        //_("amountdisplay").style.display="none";
        //_("edit_journey").style.display="none";

    }
}
</script>