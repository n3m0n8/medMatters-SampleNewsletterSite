<?php 
//////////////////DATABASE KEYS\\\\\\\\\\\\\\\\
// Site Settings 
    $siteName = 'Mediterranean Matters'; 
    $siteEmail = 'webadmin@medmatters.infinityfreeapp.com'; 
// Database configuration 
    define('DB_HOST', '***********'); 
    define('DB_PORT', '***********'); 
    define('DB_USERNAME', '***********'); 
    define('DB_PASSWORD', '***********'); 
    define('DB_NAME', '***********');  
/* Self-reference to fetch current URL  */ 
    $siteURLPrelim = 'https://'; 
    $siteURL = $siteURLPrelim.$_SERVER["SERVER_NAME"].dirname($_SERVER['REQUEST_URI']).'/'; 
///////////////// EMAIL KEYS\\\\\\\\\\\\\\\\\\\\
//FROM CONSTS
define('SUBSCRB_EMAIL_FROM_ADDRESS', 'webadmin@medmatters.infinityfreeapp.com');
define('SUBSCRB_EMAIL_FROM_NAME', 'Mediterranean Matters Newsletter Subscription Service');
// REPLY CONSTS
define('SUBSCRB_EMAIL_REPLY_ADDRESS', 'no-reply@medmatters.infinityfreeapp.com');
define('SUBSCRB_EMAIL_REPLY_NAME', 'Do Not Reply To This Email');
//SMTP SERVICE CONSTS
define('SUBSCRB_EMAIL_SMTP_HOSTNAME', 'smtp.gmail.com');
define('SUBSCRB_EMAIL_SMTP_USERNAME', '***********');
define('SUBSCRB_EMAIL_SMTP_PASSWORD', '***********');


// SMTP SETTINGS CONSTS
define('SUBSCRB_EMAIL_SMTP_PORT', 587);
define('SUBSCRB_EMAIL_SMTP_ENCRYPTION', 'tls');

////////////HCAPTCHA KEY \\\\\\\\\\\\\\\\\
define('CONTACTFORM_HCAPTCHA_SECRET_KEY', '***********');
?>