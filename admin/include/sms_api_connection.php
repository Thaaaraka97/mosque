<?php 
// today date
$today = date('Y-m-d');

// get from url
$contact_no = $_GET["contact"];
$type = $_GET["type"];
$amount = $_GET["amount"];

echo $amount."+".$contact_no;

// url to revert back
$URL = "../forms.php?inserted_record=1";


error_reporting(E_ALL); 
date_default_timezone_set('Asia/Colombo'); 
$now = date("Y-m-d\TH:i:s"); 
$username = "annoormasjd"; 
$password = "R@1231456"; 
$digest=md5($password); 
$body = "";

if ($type == "friday") {
    $msg = 'An-Noor Jumma Masjid, Moragala. \n\nNon-Mahalla Friday Collection Notification. \n\nPaid Amount - Rs. '.$amount.' \nDate - '.$today.' \n\nJazak Allah khair.';
    $body = '{ 
        "messages": [
            {
                "number": "'.$contact_no.'",
                "mask": "AnNoorMasjd",
                "text": "'.$msg.'",
                "campaignName": "annoor"            
            }
        ] 
        }';
    
    // echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    // echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}
else if ($type == "lailathul") {
    $msg = 'An-Noor Jumma Masjid, Moragala. \n\nLaylat al-Qadr Collection Notification. \n\nPaid Amount - Rs. '.$amount.' \nDate - '.$today.' \n\nJazak Allah khair.';
    $body = '{ 
        "messages": [
            {
                "number": "'.$contact_no.'",
                "mask": "AnNoorMasjd",
                "text": "'.$msg.'",
                "campaignName": "annoor"            
            }
        ] 
        }';
    
    // echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    // echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}
else if ($type == "nonmahalla") {
    $msg = 'An-Noor Jumma Masjid, Moragala. \n\nNon-Mahalla Sandha Payment Notification. \n\nPaid Amount - Rs. '.$amount.' \nDate - '.$today.' \n\nJazak Allah khair.';
    $body = '{ 
        "messages": [
            {
                "number": "'.$contact_no.'",
                "mask": "AnNoorMasjd",
                "text": "'.$msg.'",
                "campaignName": "annoor"            
            }
        ] 
        }';
    
    // echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    // echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}
else if ($type == "festival") {
    $msg = 'An-Noor Jumma Masjid, Moragala. \n\nFestival Collection Notification. \n\nPaid Amount - Rs. '.$amount.' \nDate - '.$today.' \n\nJazak Allah khair.';
    $body = '{ 
        "messages": [
            {
                "number": "'.$contact_no.'",
                "mask": "AnNoorMasjd",
                "text": "'.$msg.'",
                "campaignName": "annoor"            
            }
        ] 
        }';
    
    // echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    // echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}
else if ($type == "allvillagers") {
    $index = $_GET["index"];
    $sub = $_GET["sub"];
    $msg = 'An-Noor Jumma Masjid, Moragala. \n\nNew User Registration. \n\nYour index - '.$index.' \nYour subdivision - '.$sub.' \nYour due - Rs. '.$amount.' \nDate - '.$today.' \n\nJazak Allah khair.';
    $body = '{ 
        "messages": [
            {
                "number": "'.$contact_no.'",
                "mask": "AnNoorMasjd",
                "text": "'.$msg.'",
                "campaignName": "annoor"            
            }
        ] 
        }';
    
    // echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    // echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}
else if ($type == "allvillagers_addanother") {
    $URL = "../form_villagers-registration-form-step2.php?inserted_record=1";
    $index = $_GET["index"];
    $sub = $_GET["sub"];
    $msg = 'An-Noor Jumma Masjid, Moragala. \n\nNew User Registration. \n\nYour index - '.$index.' \nYour subdivision - '.$sub.' \nYour due - Rs. '.$amount.' \nDate - '.$today.' \n\nJazak Allah khair.';
    $body = '{ 
        "messages": [
            {
                "number": "'.$contact_no.'",
                "mask": "AnNoorMasjd",
                "text": "'.$msg.'",
                "campaignName": "annoor"            
            }
        ] 
        }';
    
    // echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    // echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}
else if ($type == "rental") {
    // $URL = "../form_villagers-registration-form-step2.php?inserted_record=1";
    $pay_start = $_GET["pay_start"];
    $pay_end = $_GET["pay_end"];
    $msg = 'An-Noor Jumma Masjid, Moragala. \n\nRent Payment Notification. \n\nAmount - Rs. '.$amount.' \nPaid for - '.$pay_start.' to '.$pay_end.' \nDate - '.$today.' \n\nJazak Allah khair.';
    $body = '{ 
        "messages": [
            {
                "number": "'.$contact_no.'",
                "mask": "AnNoorMasjd",
                "text": "'.$msg.'",
                "campaignName": "annoor"            
            }
        ] 
        }';
    
    // echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    // echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
}
else if ($type == "saandha") {
    // $URL = "../form_villagers-registration-form-step2.php?inserted_record=1";
    $pay_start = $_GET["pay_start"];
    $pay_end = $_GET["pay_end"];
    $msg = 'An-Noor Jumma Masjid, Moragala. \n\nSaandha Payment Notification. \n\nAmount - Rs. '.$amount.' \nPaid for - '.$pay_start.' to '.$pay_end.' \nDate - '.$today.' \n\nJazak Allah khair.';
    $body = '{ 
        "messages": [
            {
                "number": "'.$contact_no.'",
                "mask": "AnNoorMasjd",
                "text": "'.$msg.'",
                "campaignName": "annoor"            
            }
        ] 
        }';
    
    // echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    // echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
echo "\n".$pay_start." and ".$pay_end."\n";
}


// $body = "'".writeBody($type, $contact_no)."'";

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL,"https://richcommunication.dialog.lk/api/sms/send"); 
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS,$body); //Post Fields 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = [ 
    'Content-Type: application/json', 
    'USER: '.$username, 
    'DIGEST: '.$digest, 
    'CREATED: '.$now 
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
$server_output = curl_exec ($ch);

curl_close ($ch); 

$data = json_decode($server_output);
echo $data->resultCode;
echo "\n";
  
echo $data->resultDesc;

echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';

// header('Location: testing.html');