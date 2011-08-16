<?php
require_once('../PhpSIP.class.php');

try
{
  $api = new PhpSIP('78.46.64.50'); // IP we will bind to
  $api->setUsername('sip:test@opensips.org'); // authentication username
  $api->setPassword('test'); // authentication password
  
  $api->setMethod('MESSAGE');
  $api->setFrom('sip:test@opensips.org');
  $api->setUri('sip:alpay@opensips.org');
  $api->setBody('Hi, can we meet at 5pm today?');
  $res = $api->send();
  echo "res1: $res\n";
  
} catch (Exception $e) {
  
  echo $e->getMessage()."\n";
}

?>
