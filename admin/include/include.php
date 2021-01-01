<!-- extract the server name -->
<?php

if(siteURL() == 'http://localhost/') {
    $server_name = siteURL()."mosque/";
}
else if(siteURL() == 'http://annoorjummamusjid1.lk/'){
    $server_name = siteURL();
}
else {
    return false;
}

function siteURL()
{
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $domainName = $_SERVER['HTTP_HOST'].'/';
    return $protocol.$domainName;
}

echo $server_name;
?>

