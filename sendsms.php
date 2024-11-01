<?php
$client = new SoapClient("http://www.smartsms.co/SendTextMessage.asmx?wsdl");
$params = array(
		'loginId'  => $_REQUEST['loginId'],
		'loginPass' => $_REQUEST['loginPass'],
		'contact' => $_REQUEST['contact'],
		'sms' => $_REQUEST['sms']
		);

echo $client->SendMessage($params)->SendMessageResult;
?>