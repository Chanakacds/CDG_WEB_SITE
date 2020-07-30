<!DOCTYPE html>
<html lang="en">

<head>l
    <?php require 'asset/reservation/config.inc.php'; ?>
    <title>
        Paris Airport Transfers | Cheap Transfers from Beauvais, Orly and CDG
        Airports
    </title>
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
    <!--Essential-->
    <!-- <script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> -->
    <!--Essential-->
    <!-- <link rel="stylesheet" href="/asset/css/jquery.ptTimeSelect.css" /> -->
    <!--Essential-->
    <!-- <script type="text/javascript" src="./asset/js/jquery.ptTimeSelect.js"> -->
    <!--Essential-->
    <link rel="stylesheet" href="asset/css/full-width.css" />
    <!--Essential-->
    <link rel="stylesheet" href="asset/css/offer.css" />
    <!--Essential-->
    <link rel="stylesheet" href="asset/css/form_elements.css" />
    <!--Essential-->
    <link rel="stylesheet" href="asset/reservation/stylesheet.css">
    <!--Essential-->
    <link href="asset/css/mobile.css" rel="stylesheet" type="text/css" media="screen and (max-width: 635px)" />
    <!-- <link rel="icon" href="asset/images/icon.png"> -->

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
        <div class="offer-text vibrate-1"> 15% off for Christmas & New Year </div>
    </div>
    <div id="logo_bar">
        <div id="logo_container">
            <img src="asset/images/paris_airport_transfers.png" alt="CDG Disney Transfer">
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

    <!--slider-->
    <form action="booking.php" method ="post">
    <div id="slider">
        <h1>PARIS AIRPORT TRANSFERS</h1>
        <br>
        <div id="quick_calculator">
            <p>Find Your Fare:</p>
            <select name="qc_from" id="qc_from"
            onchange="executeQuickCalc(); "required> >
             <!-- DissableOption($("#qc_from").val(),document.getElementById("qc_to"));'> -->
                <option value="" selected="selected">From</option>
                <optgroup label="Airports">
                    <option value="CDG Airport">CDG Airport</option>
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
            <br />
            <select name="qc_to" id="qc_to"
            onchange="executeQuickCalc();"required> >
            <!-- DissableOption($("#qc_from").val(),document.getElementById("qc_to"));'> -->
                <option value="" selected="selected">To</option>
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
            <br />
            <select id="qc_passengers" name="qc_passengers" onchange="executeQuickCalc();">
                <option value="">Pax</option>
                <?php for ($i = 1; $i <= 30; $i++) { ?>
                <?php echo '<option value="'.$i.'">'.$i.'</option>'; ?>
                <?php } ?>
            </select>
            <br />
            <div id="qc_result">00.00 &euro;</div>
        </div>
        <script>
                            function executeQuickCalc() {
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
                        </script> 
        <!-- <script>
        var _0x7f97 = ['html', '<img\x20src=\x22asset/reservation/loading.gif\x22\x20height=\x2215\x22>', 'show',
            'post',
            '#qc_to', 'val', 'reservations/quick_calulator.inc.php', '#qc_result'
        ];
        (function(_0x19bab0, _0xdae5d0) {
            var _0x57719b = function(_0x2ec85d) {
                while (--_0x2ec85d) {
                    _0x19bab0['push'](_0x19bab0['shift']());
                }
            };
            _0x57719b(++_0xdae5d0);
        }(_0x7f97, 0xa5));
        var _0x56f1 = function(_0x427c6f, _0x517e3f) {
            _0x427c6f = _0x427c6f - 0x0;
            var _0x533658 = _0x7f97[_0x427c6f];
            return _0x533658;
        };

        function executeQuickCalc() {
            if ($(qc_from)[_0x56f1('0x0')]() == '' || $(qc_to)[_0x56f1('0x0')]() == '' || $(qc_passengers)[_0x56f1(
                    '0x0')]() == '') {} else {
                var _0x192eab = _0x56f1('0x1');
                $(_0x56f1('0x2'))[_0x56f1('0x3')](_0x56f1('0x4'))[_0x56f1('0x5')]();
                $[_0x56f1('0x6')](_0x192eab, {
                    'qc_passengers': $('#qc_passengers')['val'](),
                    'qc_from': $('#qc_from')[_0x56f1('0x0')](),
                    'qc_to': $(_0x56f1('0x7'))['val']()
                }, function(_0x1331b1) {
                    $(_0x56f1('0x2'))[_0x56f1('0x3')](_0x1331b1)[_0x56f1('0x5')]();
                });
            }
        }
        </form>
        </script> -->
        <center>
            <button onClick="booknow();" class="book_now_button">BOOK NOW - PAY LATER</button>
        </center>
    </div>
    <!--/slider-->
    <div id="paylater" class="white">

        <div class="main_content">
            <div class="wrap_1300" id="maintext">
                <center>
                    <div class="icon_box box_1">
                        <div class="icon-wrapper">
                            <i class="fa fa-plane fa-4x custom-icon icon_color_gray"> <span
                                    class="fix-editor">&nbsp;</span></i>
                        </div>
                        <h3>Paris Airport Transfers </h3>
                        <table class="icon_box_list" cellpadding="0" cellspacing="0">
                            <tr>
                                <td class="icon_box_list_left"><img src="asset/images/black_tick.png" width="20"
                                        height="20">
                                </td>
                                <td>No obligation booking. Pay driver at the destination.</td>
                            </tr>
                            <tr>
                                <td class="icon_box_list_left"><img src="asset/images/black_tick.png" width="20"
                                        height="20">
                                </td>
                                <td>Family friendly private shuttle.</td>
                            </tr>
                            <tr>
                                <td class="icon_box_list_left"><img src="asset/images/black_tick.png" width="20"
                                        height="20">
                                </td>
                                <td>Door to Door shuttle service</td>
                            </tr>
                            <tr>
                                <td class="icon_box_list_left"><img src="asset/images/black_tick.png" width="20"
                                        height="20">
                                </td>
                                <td>Fixed rates. No hidden charges.</td>
                            </tr>
                            <tr>
                                <td class="icon_box_list_left"><img src="asset/images/black_tick.png" width="20"
                                        height="20">
                                </td>
                                <td>No flight delay charges</td>
                            </tr>
                            <tr>
                                <td class="icon_box_list_left"><img src="asset/images/black_tick.png" width="20"
                                        height="20">
                                </td>
                                <td>Free baby seats &amp; Kids DVDs</td>
                            </tr>
                        </table>
                    </div>

                    <div class="icon_box box_2">
                        <div class="icon-wrapper"><i class="fa fa-train fa-4x custom-icon icon_color_orange"><span
                                    class="fix-editor">&nbsp;</span></i></div>
                        <h3>CDG to Disneyland (3 PAX)</h3>
                        <center>
                            <table class="rates_table" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>CDG</td>
                                    <td>Disneyland</td>
                                    <td>&#8364;60</td>
                                </tr>
                                <tr class="rates_table_alter_color">
                                    <td>BVA</td>
                                    <td>Eurodisney</td>
                                    <td>&#8364;110</td>
                                </tr>
                                <tr>
                                    <td>Orly</td>
                                    <td>Eurodisney</td>
                                    <td>&#8364;65</td>
                                </tr>
                                <tr class="rates_table_alter_color">
                                    <td>BVA</td>
                                    <td>Paris</td>
                                    <td>&#8364;110</td>
                                </tr>
                                <tr>
                                    <td>CDG</td>
                                    <td>Paris</td>
                                    <td>&#8364;55</td>
                                </tr>
                                <tr class="rates_table_alter_color">
                                    <td>Orly</td>
                                    <td>Paris</td>
                                    <td>&#8364;55</td>
                                </tr>
                                <tr>
                                    <td>BVA</td>
                                    <td>CDG</td>
                                    <td>&#8364;110</td>
                                </tr>
                                <tr class="rates_table_alter_color">
                                    <td>CDG</td>
                                    <td>Orly</td>
                                    <td>&#8364;85</td>
                                </tr>
                                <tr>
                                    <td>Orly</td>
                                    <td>BVA</td>
                                    <td>&#8364;135</td>
                                </tr>
                            </table>
                        </center>
                        <p>&nbsp;</p>
                    </div>
                    <div class="icon_box box_3">
                        <div class="icon-wrapper"><i class="fa fa-clock-o fa-4x custom-icon icon_color_gray"><span
                                    class="fix-editor">&nbsp;</span></i></div>
                        <h3>FAQ's</h3>
                        <table class="icon_box_list" cellpadding="0" cellspacing="0">
                            <tr>
                                <td class="icon_box_list_left"><img src="asset/images/q.png" width="20" height="20">
                                </td>
                                <td><strong>When do I pay?</strong></td>
                            </tr>
                            <tr>
                                <td class="icon_box_list_left"><img src="asset/images/a.png" width="20" height="20">
                                </td>
                                <td>You pay at the end of journey.</td>
                            </tr>
                            <tr>
                                <td class="icon_box_list_left"><img src="asset/images/q.png" width="20" height="20">
                                </td>
                                <td><strong>Where do I meet the driver? </strong></td>
                            </tr>
                            <tr>
                                <td class="icon_box_list_left"><img src="asset/images/a.png" width="20" height="20">
                                </td>
                                <td>Your driver will meet at the arrivals gate. He will be holding a name-board</td>
                            </tr>
                            <tr>
                                <td class="icon_box_list_left"><img src="asset/images/q.png" width="20" height="20">
                                </td>
                                <td><strong>Do I share the vehicle?</strong></td>
                            </tr>
                            <tr>
                                <td class="icon_box_list_left"><img src="asset/images/a.png" width="20" height="20">
                                </td>
                                <td>No, the shuttle is just for you.</td>
                            </tr>


                        </table>
                    </div>
                    <div class="icon_box aboutusp box_4">
                        <div class="icon-wrapper"><i class="fa fa-thumbs-up fa-4x custom-icon icon_color_orange"><span
                                    class="fix-editor">&nbsp;</span></i></div>
                        <h3>About US</h3>
                        <p
                            style="font-family: 'Source Sans Pro', sans-serif; text-align:justify; margin-top:-10px; font-size:17px;  padding:5px; line-height:22px;">
                            Paris Airport Transits is family friendly private shuttle serivice. We provide transfers
                            from all major Paris Airports such as Beauvais (BVA), Charles de Gaulle (CDG), Orly (ORY) to
                            Eurodisney Paris and Paris city. <br><br>
                            We have a fleet of clean, safe and well maintained vehicles driven by english spekaing
                            drivers.
                        </p>

                    </div>

            </div>

        </div>
        <!--main_content-->

    </div>
    <script>
    $('.handle').on('click', function() {
        $('nav ul').toggleClass('show_menu')
    });
    </script>
    <!--/book-now-button-->
    <!--footer-->
    <div id="footer">
        Cheap Transfers from Beauvais, Orly and CDG Airports.
    </div>
</body>

</html>