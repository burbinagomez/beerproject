<?php
define("RECAPTCHA_V3_SECRET_KEY", '6LdoJcQUAAAAAIFFWhivPNnhPBSZCfGySiOOeINh');

$token = $_POST['token'];
$action = 'homepage';


// call curl to POST request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$arrResponse = json_decode($response, true);

// verify the response
if($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) {
    // valid submission
  
    header('location: ../contacts.php');
    exit;
   
    
    // go ahead and do necessary stuff
} else {
    // spam submission
    header('location: ../contacts.php');
    exit;
    // show error message
}