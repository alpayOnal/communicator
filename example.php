<?php
require_once('PhpSIP.class.php');

/* Sends NOTIFY to reset Linksys phone */

try
{
  $api = new PhpSIP('opensips.org');
  $api->setDebug(true);
  $api->setUsername('alpay@opensips.org'); // authentication username
  $api->setPassword('2552411984'); // authentication password
  //$api->setProxy('78.46.64.50'); 
  $api->addHeader('Event: resync');
  $api->setMethod('MESSAGE');
  $api->setFrom('sip:test@opensips.org');
  $api->setUri('sip:alpay@opensips.org');
  $res = $api->send();

  echo "response: $res<br>";
  
} catch (Exception $e) {
  
  echo $e;
}

?>
