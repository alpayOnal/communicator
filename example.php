<?php
require_once('PhpSIP.class.php');

/* Sends NOTIFY to reset Linksys phone */

try
{
  $api = new PhpSIP('78.46.64.50');
  $api->setDebug(true);
  $api->setUsername('alpay'); // authentication username
  $api->setPassword('2552411984'); // authentication password
  //$api->setProxy('some_ip_here'); 
  $api->addHeader('Event: resync');
  $api->setMethod('NOTIFY');
  $api->setFrom('sip:alpay@opensips.org');
  $api->setUri('sip:test@opensips.org');
  $res = $api->send();

  echo "response: $res\n";
  
} catch (Exception $e) {
  
  echo $e;
}

?>
