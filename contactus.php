<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Contact Us</title>
    <meta name="description"
        content="Cheap Transfers from Beauvais, Orly and CDG Airports to Paris City and Disneyland Paris" />
    <meta name="LANGUAGE" content="EN" />
    <meta name="COPYRIGHT" content="Paris Airport Transfers" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300|Source+Sans+Pro|Fugaz+One:300" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.min.css" />
    <!--Essential-->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

    <link rel="stylesheet" href="asset/css/full-width.css" />
    <!--Essential-->
    <link rel="stylesheet" href="asset/css/offer.css" />
    <!--Essential-->
    <link rel="stylesheet" href="asset/css/form_elements.css" />
    <!--Essential-->
    <link rel="stylesheet" href="asset/reservation/stylesheet.css" />
    <!--Essential-->
    <link href="asset/css/mobile.css" rel="stylesheet" type="text/css" media="screen and (max-width: 635px)" />
    <link rel="icon" href="asset/images/icon.png" />

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
        <div class="offer-text vibrate-1">15% off for Chrismas & New Year</div>
    </div>
    <div id="logo_bar">
        <div id="logo_container">
            <img src="asset/images/paris_airport_transfers.png" alt="CDG Disney Transfers" />
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
    <!--contactus-->
    <div id="contactus">
        <div class="wrap_900" id="contact_text">
            <h2>Contact Us</h2>
            <p>
                We try our best to reply back as soon as we recives your queries.
                However, please allo up to 24 hours.
            </p>
            <form onSubmit="return false" id="contact-form"
                style=" border:1px #d2d4d3 solid; background:#EFEFEF; border:1px #999 solid; border-radius:10px; padding:10px; margin-bottom:0px; padding-bottom:0px;">
                <p class="inline">Name</p>
                <p class="error" id="contact_name_error"></p>
                <input name="contact_name" id="contact_name" type="text" value="" />
                <p class="inline">Email</p>
                <p class="error" id="contact_email_error"></p>
                <input name="contact_email" type="text" id="contact_email" value="" />
                <p class="inline">Telephone</p>
                <p class="error" id="contact_telephone_error"></p>
                <input name="contact_telephone" type="text" id="contact_telephone" value="" />
                <p class="inline">Your Message</p>
                <p class="error" id="contact_message_error"></p>
                <textarea name="contact_message" id="contact_message" style="height:100px;"></textarea>
                <div id="contactform" style="text-align:center;"></div>
                <div id="button-row" class="button-row">
                    <button class="btn_email" style="margin-top:20px;" id="contact">
                        Submit Request
                    </button>
                </div>
            </form>
            <br /><br /><br />
        </div>
    </div>
    <!--footer-->
    <div id="footer">
        Cheap Transfers from Beauvais, Orly and CDG Airports
    </div>
    <script>
    $('.handle').on('click', function() {
        $('nav ul').toggleClass('show_menu')
    });

    $("#contact").click(function() {
        contact_error = Processcontactform();
        if (!contact_error.match(/1/)) {
            contactForm();
        } else {
            //alert("ok");
        }

    });

    function Processcontactform() {
        var contact_error = "";
        contact_error += Check_Empty("contact_name", "required", "5");
        contact_error += Validate_Email("contact_email", "true", "required", "invalid email", "6");
        contact_error += Check_Empty("contact_telephone", "required", "5");
        return contact_error;
    }


    function contactForm() {
        $("#sendmail").html('<img src="asset/reservation/wait.gif" height="200">').show();
        var url = "asset/includes/contact_form.php";

        $.post(url, {
            j2dropaddress: $("#j2dropaddress").val(),
            name: $("#contact_name").val(),
            email: $("#contact_email").val(),
            telephone: $("#contact_telephone").val(),
            message: $("#contact_message").val()
        }, function(data) {
            $("#contactform").html(data).show();
        });
    }
    </script>
</body>

</html>