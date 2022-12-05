<?php
////////////////////COMPILATION\\\\\\\\\\\\\\\\\\
// require DBconnect
require_once __DIR__.'***********/dbConnect.php'; 
// require config.php    
require_once __DIR__.'***********/config.php'; 
//require subscription session redirects:
require_once __DIR__.'***********/subscriptionSession.php'; 
// require the phpMailer package
require_once __DIR__.'***********/composer/vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\Exception;
session_start();    
$subscribeError;
//define('SUBSCRB_RSLT_REDIRECT', 'https://medmatters.infinityfreeapp.com/subscriptionForm.php#status');
//check for post request header
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //H-Captcha Validation
    if (empty($_POST['h-captcha-response'])) {
        $subscribeError = 'Please complete the 
        hCaptcha.';
        //header(SUBSCRB_RSLT_REDIRECT);
        subscriptionError($subscribeError);
        exit();
    }
    else{
        //H-Captcha Execution\\
        $captchaData = array(
        'secret' => CONTACTFORM_HCAPTCHA_SECRET_KEY,
        'response' => $_POST['h-captcha-response']
        );
        $verifyCaptcha = curl_init();
            curl_setopt($verifyCaptcha, CURLOPT_URL, "https://hcaptcha.com/siteverify");
            curl_setopt($verifyCaptcha, CURLOPT_POST, true);
            curl_setopt($verifyCaptcha, CURLOPT_POSTFIELDS, http_build_query($captchaData));
            curl_setopt($verifyCaptcha, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verifyCaptcha);
        $captchaResponse = json_decode($response);
        //On Captcha Success:  
        if($captchaResponse->success) { 
            //check for a POST input on variables 
            if (isset($_POST['subEmail']) && isset($_POST['subName'])){
                // server-side validation of input 
                if (filter_var($_POST['subEmail'],FILTER_VALIDATE_EMAIL) && preg_match(***********, $_POST['subName'])){    
                    // assign POST subscription form variable values:
                    $name = htmlspecialchars(stripslashes(trim($_POST['subName'])));   
                    $email = htmlspecialchars(stripslashes(trim($_POST['subEmail'])));    
                    $datetime = date('Y-m-d\x20H:i:s');
//////////////////RUNTIME EXECUTION\\\\\\\\\\\\\\
 //check if email record exists:
                    // prepare PDO objects' statement parameter 
                    $qrySttmnt = $dbObject->prepare('SELECT * FROM *********** WHERE *********** = ?');
                    // execute the PDO SQL statement    
                    $qrySttmnt->execute(array($email));
                    // if an existing email is found, exit process 
                        if ($qrySttmnt->fetch(PDO::FETCH_ASSOC)){
                            //echo 'Problem with executing query on existing subscription.';
                            $subscribeError = 'You are already subscribed.';
                            //header(SUBSCRB_RSLT_REDIRECT);
                            subscriptionError($subscribeError);
                            exit();
                        }
// otherwise process with inputting email to databse and sending out email with             verification code        
                        else {
                            // assign email verification related values:        
                            $veri_code = bin2hex(random_bytes(16));
                            $verifyLink = $siteURL.'subscriptionVerification.php?email_verify='.$veri_code;     
                            //insert email, veri_code & timestamp into DB:
                            $qrySttmnt = $dbObject->prepare('INSERT INTO ***********(***********, ***********, ***********) VALUES (?,?,?)');
                            $qrySttmnt->execute(array($email, $veri_code, $datetime));
                                try {
                                // mail out verification:
                                $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
                                //Server settings
                                    $mail->SMTPDebug = false;
                                    $mail->do_debug = 0;
                                    $mail->isSMTP();
                                    $mail->Host = SUBSCRB_EMAIL_SMTP_HOSTNAME;
                                    $mail->SMTPAuth = true;
                                    $mail->Username =   SUBSCRB_EMAIL_SMTP_USERNAME;
                                    $mail->Password = SUBSCRB_EMAIL_SMTP_PASSWORD;
                                    $mail->SMTPSecure = SUBSCRB_EMAIL_SMTP_ENCRYPTION;
                                    $mail->Port = SUBSCRB_EMAIL_SMTP_PORT;
                                    $mail->isHTML(true);
                                    // Recipients
                                    $mail->setFrom(SUBSCRB_EMAIL_FROM_ADDRESS, SUBSCRB_EMAIL_FROM_NAME);
                                    $mail->addAddress($email, $name);
                                    $mail->addReplyTo(SUBSCRB_EMAIL_REPLY_ADDRESS,SUBSCRB_EMAIL_REPLY_NAME);
                                    // Content
                                    $mail->Subject = "You just Subscribed to MedMatters | Verify Your Subscription Now.";
                                    $mail->Body = '<!DOCTYPE html>
                                        <h1 style="font-size:22px;margin:18px 0 0; padding:0;text-align:left;color:#000000;background-color:#F8F0E9">Email Confirmation</h1> 
                                        <p style="background-color:#F8F0E9;text-align:left;padding-top:15px;padding-right:40px;padding-bottom:30px;padding-left:40px;font-size:18px;color:#000000">Thank you for subscribing to the Mediterranean Matters Newsletter. <br> Please confirm your email address by clicking the link below.</p>
                                        <br>
                                        <p style="text-align:center;"><a href="'.$verifyLink.'" style="border-radius:.25em;background-color:#ffffff;font-weight:400;min-width:180px;font-size:16px;line-height:100%;padding-top:18px;padding-right:30px;padding-bottom:18px;padding-left:30px;color:#000000 text-decoration:none">Verify Subscription</a>
                                        <br>
                                        If you did not subscribe to this newsletter and have recieved this email in error, please delete this email and ignore its contents- you will not recieve any further emails.
                                        </p>
                                        <br>
                                        <p style="background-color:#F8F0E9;text-align:left;padding-top:15px;padding-right:40px;padding-bottom:30px;padding-left:40px;font-size:18px";color:#000000><strong> From the MedMatters Newsletter Team.</strong>
                                        </p>; 
                                        </html>';
                                    $mail->send();
                                    //exit with success:
                                    //$subscriptionStatus = '';
                                    //header(SUBSCRB_RSLT_REDIRECT);
                                    subscriptionSuccess();
                                    exit();
                                }
                                //error with sending email
                                catch (Exception $e) {
                                    $subscribeError = 'An error occurred while trying to send your subscription confirmation email. \n Please try again. \n If the problem persist, contact us sharing the error information below: '.$mail->ErrorInfo;
                                    //header(SUBSCRB_RSLT_REDIRECT);
                                    subscriptionError($subscribeError);
                                    exit();
                                }
                        }
                }
                //failed to validate inputted data
                else {
                    $subscribeError = 'Sorry there was an issue. Please make sure to enter your details correctly.';
                    //header(SUBSCRB_RSLT_REDIRECT);
                    subscriptionError($subscribeError);
                    exit();
                }
            }     
            //missing data fields in submission
            else {
                $subscribeError = 'Sorry please make sure to fill in both fields of the form correctly.';
                //header(SUBSCRB_RSLT_REDIRECT);
                subscriptionError($subscribeError);
                exit();
            }
        }
        //error with verifying the hCaptcha
        else {
            $subscribeError =  'Something Went Wrong with hCaptcha verification. Please try again later';
            //header(SUBSCRB_RSLT_REDIRECT);
            subscriptionError($subscribeError);
            exit();
        } 
    }
}
//error with recieving the Post request:
else{
    $subscribeError = 'Sorry there was a problem with your form submission. Please try again later.';
    //header(SUBSCRB_RSLT_REDIRECT);
    subscriptionError($subscribeError);
    exit(); 
}   
?>