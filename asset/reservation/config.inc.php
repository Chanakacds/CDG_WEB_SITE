<?php

/*Business Name*/

define("BUSINESS_NAME", ""); // Business Name Goes Here

define("BUSINESS_TELEPHONE", ""); // Business Telephone Goes Here


/*Meta Details*/


define("EMAIL_HOST", "mail.somedomain.com");

define("EMAIL_USERNAME", "bookings@somedomain.com");

define("EMAIL_PASSWORD", "password here");

define("EMAIL_FROM", "bookings@somedomain.com");

define("EMAIL_FROMNAME", "Email From Name");

define("EMAIL_SUBJECT", "Email Subject Goes here");



define("BUSINESS_EMAIL", "bookings@somedomain.com");

define("SEND_EMAIL", "bookings@somedomain.com");

define("REPLY_EMAIL", "bookings@somedomain.com");

define("REFERENCE_PREFIX", "TTT"); // Reference Prefix e.g. EFP-2563



// Invoice



define("NIGHT_SURCHARGE", "0");

define("FAILURE_MESSAGE",'<p style="color:#F00">Sorry! There was an error sending your email. Please call us using contact details on the Contact US page.</p>');

define("SUCCESS_MESSAGE",'<p style="color:#0f75bc;"><strong>Thank you! your reservation is successfully placed.<br>You will recive an email shortly.</strong><br><br><span style="color:#e11b4a;">Please re-confirm your journey by replying to that email.<br>If you cannot find the email in your inbox please check your JUNK email folder</span></p><p style="color:#0f75bc;">Call us on +33 783 077 327 for any queries you may have on this booking.</p><button id="BookAnotherJourney" OnClick="window.location=\'index.php\'" class="processbuttons" style="width:250px;">Book Another Journey</button>');

define("CONTACT_FAILURE_MESSAGE",'<p style="color:#F00">Sorry! There was an error sending your email. Please call us using contact details on the Contact US page.</p>');

define("CONTACT_SUCCESS_MESSAGE",'<p style="color:#060">Thank you! Your request has been sent. One of our agents will be in touch within 12-24 hours</p>');

?>