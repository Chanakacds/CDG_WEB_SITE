<?php $calltoajax ="onchange=\"xmlhttpPost('includes/calculate-rate.php', 'qc-form', 'result', 'Wait');\""; ?>
<div id="qc-form" class="qc-form">
    <span class="bigletters" style="margin-bottom:20px;">Book Online</span>
    <form onsubmit="return false" id="qc-form">
        <input type="hidden" value="qc-form" name="display" id="display" />
        <p>Pickup Point</p>
        <select <?php echo $calltoajax; ?> id="pickup" name="pickup">
            <option>Beauvais Airport</option>
            <option>Orly Airport</option>
            <option>Paris</option>
            <option selected="selected">Charles De Gaulle Airport</option>
            <option>Disneyland</option>
        </select>
        <p>Drop Point</p>
        <select <?php echo $calltoajax; ?> id="drop" name="drop">
            <option>Beauvais Airport</option>
            <option>Orly Airport</option>
            <option>Paris</option>
            <option>Charles De Gaulle Airport</option>
            <option selected="selected">Disneyland</option>
        </select>
        <div style="float:left; width:47.5%;">
            <p>Journey Type</p>
            <select <?php echo $calltoajax; ?> id="journey" name="journey">
                <option>One Way</option>
                <option>Round Trip</option>
            </select>
        </div>
        <div style="width:5%; height:100%; float:left;">&nbsp;</div>
        <div style="float:right; width:47.5%;">
            <p>Passengers</p>
            <select <?php echo $calltoajax; ?> id="passengers" name="passengers">
                <?php for ($i = 1; $i <= 30; $i++) { ?>
                <?php echo '<option value="'.$i.'">'.$i.'</option>'; ?>
                <?php } ?>
            </select>
        </div>
        <div id="result" class="result">
            <span class="threequarter">
                <span class="bigletters">your rate is &#8364;60</span>
                <a href="reservations.php">book your ride now</a></span>
            <span class="quarter"><button class="button_orange" id="sada">Calculate</button></span>
        </div>
    </form>
</div>
<!--qc-form-->