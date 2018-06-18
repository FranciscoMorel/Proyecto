<?php 
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

require __DIR__.'/vendor/autoload.php';

$apiContext = new ApiContext(
	new OAuthTokenCredential(
'AYYwZEzMfqNe3oAd9CgclZtstaRLiCB3taSF96DNdSzHGzFwDrhkAuGpymrU4FVwe8MpCVwAaVsOz8uK',
'EGiOCPs9Xg9DhIas7EGU8mqp1OcPzIkWp5-7bP4F8c995saAuI8dSTZukuHJlXKg1Gek-2Ah9CikOAEl'
	)
);

$apiContext->setConfig(
	array(
		'mode' => 'sandbox',
		'http.ConnectionTimeOut' => 30,
		'log.LogEnable' => true,
		'log.Filename' => 'PayPal.log',
		'log.LogLevel' => 'DEBUG',

	)
);

 ?>