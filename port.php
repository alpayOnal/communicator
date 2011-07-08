<?php

$site = "opensips.org";
$port = 5060;

$fp = fsockopen($site,$port,$errno,$errstr,10);
if(!$fp)
{
echo "Cannot connect to server";
}
else{
echo "Connect was successful - no errors on Port ".$port." at ".$site;
fclose($fp);
}

?>
