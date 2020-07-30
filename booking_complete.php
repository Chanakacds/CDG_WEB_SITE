
<html>

<head>


    <?php require 'asset/reservation/config.inc.php'; ?>
    <title>
        Thank you. Your Booking is Done
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,100' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <!--Essential-->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <!--Essential-->
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!--Essential-->
    <link rel="stylesheet" type="text/css" href="asset/css/jquery.ptTimeSelect.css" />
    <!--Essential-->
    <script type="text/javascript" src="asset/js/jquery.ptTimeSelect.js"></script>
    <!--Essential-->
    <link href="asset/css/full-width.css" rel="stylesheet" type="text/css">
    <link href="asset/css/mobile.css" rel="stylesheet" type="text/css" media="screen and (max-width: 635px)">
    <script src="https://use.fontawesome.com/664fd5ebaa.js"></script>
    <link rel="icon" href="asset/images/icon.png">
    <link href="asset/reservation/stylesheet.css" rel="stylesheet" type="text/css">
    <!--Essential-->
    <!-- Event snippet for Completed Booking conversion page -->
    <!-- Global site tag (gtag.js) - Google AdWords: 826365036 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-826365036"></script>
    <script>

    </script>
    <script>

    </script>


</head>

<body>


    <?php include_once("asset/includes/analyticstracking.php") ?>
    <!--top header-->
    <!--\top header-->
    <div
        style="background:#fff; text-align:center; height:60px;  line-height:60px; width:100%;  color:#118dce; font-family:Verdana, Geneva, sans-serif; font-size:27px;">
        <div style="max-width:450px; margin:0 auto; text-align:center; line-height:50px;"><img
                src="asset/images/cdg_paris_logo.png" width="300" alt="CDG Disney Transfers"></div>
    </div>

    <!--Booking Form-->
    <div id="booking_complete">
        <div class="wrap_900" id="reservaation_text">
            <div id="calculator">
                <div id="res-container" class="res-container">
                    <center>
                        <?php echo SUCCESS_MESSAGE; ?>
                        <p style="color:#0f75bc;"><strong>Your reference number is</strong>
                            PREFIX-<?php echo $_GET['id']; ?></p>
                    </center>
                    <br><Br>
                </div>
            </div>
        </div>
    </div>


    <!--footer-->
    <div id="footer" style="background:#c580d5;  margin:0px; padding:10px;">
        <p class="mainp" style="color:#FFF; margin:0px; font-size:18px;">Fast, Raliable and Family Friendly Private
            Shuttle Service from CDG to Marne-la-Vall�e � Chessy</p>
    </div>
    <!--/footer-->
</body>

</html>