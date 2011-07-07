<?php
/*require_once('PhpSIP.class.php');

try
{
  $api = new PhpSIP('78.46.64.50'); // IP we will bind to
  $api->setMethod('MESSAGE');
  $api->setFrom('sip:test@opensips.org');
  $api->setUri('sip:alpay@opensips.org');
  $api->setBody('Hi, can we meet at 5pm today?');
  $res = $api->send();
  echo "res1: $res\n";
  
} catch (Exception $e) {
  
  echo $e->getMessage()."\n";
}
*/
?>
<?php
require_once('PhpSIP.class.php');

try
{
  $api = new PhpSIP('78.46.64.50'); // IP we will bind to
  $api->setUsername('sip:98751@opensips.org'); // authentication username
  $api->setPassword('2552411984'); // authentication password
  // $api->setProxy('some_ip_here'); 
  $api->addHeader('Event: resync');
  $api->setMethod('NOTIFY');
  $api->setFrom('sip:98751@opensips.org');
  $api->setUri('sip:98751@opensips.org');
  $res = $api->send();
  echo "res1: $res\n";
  
} catch (Exception $e) {
  
  echo $e->getMessage()."\n";
}

?>
