<?php
require_once('PhpSIP.class.php');

try
{
  $api = new PhpSIP('78.46.64.50'); // IP we will bind to
  $api->setUsername('sip:test@opensips.org'); // authentication username
  $api->setPassword('test'); // authentication password
  // $api->setProxy('some_ip_here'); 
  $api->addHeader('Event: resync');
  $api->setMethod('MESSAGE');
  $api->setBody('Hi, can we meet at 5pm today?');
  $api->setFrom('sip:test@opensips.org');
  $api->setUri('sip:enum-test@sip.nemox.net');
  
  $res = $api->send();
  echo "res1: $res\n";
  
} catch (Exception $e) {
  
  echo $e->getMessage()."\n";
}

?>
