<?php



$msg ="The following information has been received from your website:\n\n";
$msg .= "From: ".$_REQUEST['input-name']." at ".$_REQUEST['input-email']."\n";
$msg .= "Additional Information: ".$_REQUEST['textarea-additional-you']."\n";
$msg .= "Company Name: ".$_REQUEST['company-name']." at ".$_REQUEST['company-url']."\n";
$msg .= "Additional Information: ".$_REQUEST['textarea-additional-company']."\n";
$msg .= "Date Requested: ".$_REQUEST['date-select']."\n";
$msg .= "Time Requested: ".$_REQUEST['select-times-interested']."\n";

//var_dump(get_option('admin_email'));
//wp_mail( $_REQUEST['e'], "Inquiry to Become a New Partner", $msg );
$headers = 'From: '.$_REQUEST['input-email'] . "\r\n" .
    'Reply-To: '.$_REQUEST['input-email'] . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($_REQUEST['e'], "Become a Partner INQUIRY", $msg, $headers);

return true;

?>