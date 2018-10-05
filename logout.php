<?php
	require_once "google/config.php";
	$guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
	$gClient->setHttpClient($guzzleClient);
	unset($_SESSION['access_token']);
	//$gClient->revokeToken();
	session_destroy();
	header('Location: index.php');
	exit();
?>