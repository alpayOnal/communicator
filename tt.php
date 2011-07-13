<?php
	$sip_server_address = '192.168.2.63';
	$sip_server_port = 5061;

	$fp = fsockopen($sip_server_address,$sip_server_port,$errno,$errstr);
	stream_set_blocking($fp, 0);

	$check = 'Our_SIP_String_Will_Go_Here';

	fputs($fp, "$check\r");
	sleep(5);

	$response = fread($fp, 256);

	echo $response;
?>
