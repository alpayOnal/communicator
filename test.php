<?php
require_once('PhpSIP.class.php');

try
{
  $api = new PhpSIP('botego.local'); // IP we will bind to
  $api->setMethod('MESSAGE');
  $api->setFrom('sip:alpay@BOTEGO.LOCAL');
  $api->setUri('sip:ekim@BOTEGO.LOCAL');
  $api->setBody('Hi, can we meet at 5pm today?');
  $res = $api->send();
  echo "res1: $res\n";
  
} catch (Exception $e) {
  
  echo $e->getMessage()."\n";
}

?>
