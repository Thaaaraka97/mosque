<?php 
// today date
$today = date('Y-m-d');

// get from url
$contact_no = $_GET["contact"];
$type = $_GET["type"];
$amount = $_GET["amount"];
$name = $_GET["name"];
$collector = "";
if (isset($_GET["collector"])) {
    $collector = $_GET["collector"];
}


echo $amount."+".$contact_no;

// url to revert back
$URL = "../forms.php?inserted_record=1";


error_reporting(E_ALL); 
date_default_timezone_set('Asia/Colombo'); 
$now = date("Y-m-d\TH:i:s"); 
$username = "annoormasjd"; 
$password = "ha#!99XN"; 
$digest=md5($password); 
$body = "";

if ($type == "friday") {
    $msg = 'An-Noor Jumma Masjid, Moragala. \nNon-Mahalla Friday Collection Notification. \nName : '.$name.' \nPaid Amount : Rs. '.$amount.' \nDate : '.$today.' \nCollector : '.$collector.' \nJazak Allah khair.';
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
    $msg = 'An-Noor Jumma Masjid, Moragala. \nLaylat al-Qadr Collection Notification. \nName : '.$name.' \nPaid Amount : Rs. '.$amount.' \nDate : '.$today.' \nCollector : '.$collector.' \nJazak Allah khair.';
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
    $msg = 'An-Noor Jumma Masjid, Moragala. \nNon-Mahalla Sandha Payment Notification. \nName : '.$name.'\nPaid Amount : Rs. '.$amount.' \nDate : '.$today.' \nCollector : '.$collector.' \nJazak Allah khair.';
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
    $msg = 'An-Noor Jumma Masjid, Moragala. \nFestival Collection Notification. \nName : '.$name.' \nPaid Amount : Rs. '.$amount.' \nDate : '.$today.' \nCollector : '.$collector.' \nJazak Allah khair.';
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
else if ($type == "quickform") {
    $URL = "../form_quick_form.php?inserted_record=1";
    $index = $_GET["index"];
    $sub = $_GET["sub"];
    $msg = 'An-Noor Jumma Masjid, Moragala. \nNew User Registration. \nName : '.$name.' \nYour index : '.$index.' \nYour subdivision : '.$sub.' \nYour due : Rs. '.$amount.' \nDate : '.$today.' \nJazak Allah khair.';
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
    // echo '<META HTTP:EQUIV="refresh" content="0;URL=' . $URL . '">';
}
else if ($type == "allvillagers") {
    $index = $_GET["index"];
    $sub = $_GET["sub"];
    $msg = 'An-Noor Jumma Masjid, Moragala. \nNew User Registration. \nName : '.$name.' \nYour index : '.$index.' \nYour subdivision : '.$sub.' \nYour due : Rs. '.$amount.' \nDate : '.$today.' \nJazak Allah khair.';
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
    // echo '<META HTTP:EQUIV="refresh" content="0;URL=' . $URL . '">';
}
else if ($type == "allvillagers_addanother") {
    $URL = "../form_villagers-registration-form-step2.php?inserted_record=1";
    $index = $_GET["index"];
    $sub = $_GET["sub"];
    $msg = 'An-Noor Jumma Masjid, Moragala. \nNew User Registration. \nName : '.$name.' \nYour index : '.$index.' \nYour subdivision : '.$sub.' \nYour due : Rs. '.$amount.' \nDate : '.$today.' \nJazak Allah khair.';
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
    $ref1 = $_GET["ref1"];
    $ref2 = $_GET["ref2"];
    $due = $_GET["due"];
    $msg = 'An-Noor Jumma Masjid, Moragala. \nRent Payment Notification. \nName : '.$name.' \nReference No : '.$ref1.'-'.$ref2.' \nAmount : Rs. '.$amount.' \nPaid for : '.$pay_start.' to '.$pay_end.' \nBalance amount : Rs. '.$due.' \nDate : '.$today.' \nCollector : '.$collector.' \nJazak Allah khair.';
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
    $ref1 = $_GET["ref1"];
    $ref2 = $_GET["ref2"];
    $due = $_GET["due"];
    $collector = $_GET["collector"];
    $msg = 'An-Noor Jumma Masjid, Moragala. \nSaandha Payment Notification. \nName : '.$name.' \nReference No : '.$ref1.'-'.$ref2.' \nAmount : Rs. '.$amount.' \nPaid for : '.$pay_start.' to '.$pay_end.' \nBalance amount : Rs. '.$due.' \nDate : '.$today.' \nCollector : '.$collector.' \nJazak Allah khair.';
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
// echo "\n".$pay_start." and ".$pay_end."\n";
}
else if ($type == "alert") {
    $URL = "../form_collection_alert.php?inserted_record=1";
    $date = $_GET["date"];
    $collector = $_GET["collector"];
    $msg = 'An-Noor Jumma Masjid, Moragala. \nWe here by notify that sandha collection will be executed on '.$date.' by '.$collector.'\nYour sandha due : Rs. '.$amount.' \nJazak Allah khair.';
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
    
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
// echo "\n".$pay_start." and ".$pay_end."\n";
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
// echo $data->resultCode;
// echo "\n";
  
// echo $data->resultDesc;

echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';

// header('Location: testing.html');