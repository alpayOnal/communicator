<?php $src_ip = '192.168.2.63' /* Change this to your server IP address */ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">

<head><title>PHP-SIP Click to Call</title></head>

<body>

<?php if (isset($_POST['from']) && isset($_POST['to'])) : ?>

  <?php require_once('PhpSIP.class.php') ?>

  <?php $from = $_POST['from']; $to = $_POST['to'] ?>

  Trying call from <?php echo $from ?> to <?php echo $to ?> ...<br />

  <?php flush(); ?>

  <pre>
  <?php 
    try{
      $api = new PhpSIP($src_ip);
      $api->setDebug(true);
      //$api->setUsername('sip:alpay@192.168.2.63');
      //$api->setPassword('Boteklif5');
      //$api->addHeader('Subject: test');
     // $api->setMethod('MESSAGE');
	  $api->setBody('Hi, mustafa?');
	  $api->setMethod('INVITE');
      $api->setFrom('sip:test@'.$src_ip);
      $api->setUri($from);

      $res = $api->send();

      if ($res == 200)
      {	 
		  
		$api->setMethod('SUBSCRIBE');
        $res = $api->send();
        echo $res;
        $api->setMethod('REFER');
        $api->addHeader('Refer-to: '.$to);
        $api->addHeader('Referred-By: sip:test@'.$src_ip);
        $api->send();
		
        $api->setMethod('BYE');
        $api->send();
		
        $api->listen('INFO');
        $api->reply(481,'Call Leg/Transaction Does Not Exist');
      }

      if ($res == 'No final response in 5 seconds.')
      {
        $api->setMethod('CANCEL');
        $res = $api->send();
      }

      echo $res;

    } catch (Exception $e) {

      echo "Opps... Caught exception:";
      echo $e;
    }
  ?>
  </pre>
  <hr />

  <a href="<?php echo $_SERVER['PHP_SELF']; ?>">Back</a>

<?php else : ?>

  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <fieldset>
      From: <input type="text" name="from" size="25" value="" />
      To: <input type="text" name="to" size="25" value="sip:
 enum-test@sip.nemox.net " />
      <input type="submit" value="Call" />
    </fieldset>
  </form>

<?php endif ?>

</body>
</html>
