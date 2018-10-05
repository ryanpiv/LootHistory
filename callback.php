<?php
	require_once "google/config.php";
	require_once "db/connect.php"; 
	$_SESSION['error'] = '';
	$_SESSION['sql_error'] = '';

	$guzzleClient = new \GuzzleHttp\Client(array( 'curl' => array( CURLOPT_SSL_VERIFYPEER => false, ), ));
	$gClient->setHttpClient($guzzleClient);

	if (isset($_SESSION['access_token']))
		$gClient->setAccessToken($_SESSION['access_token']);
	else if (isset($_GET['code'])) {
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token;
	} else {
		//$_SESSION['error'] = 
		header('Location: index.php');
		exit();
	}

	$oAuth = new Google_Service_Oauth2($gClient);
	$userData = $oAuth->userinfo_v2_me->get();

	$_SESSION['googleId'] = $userData['id'];
	$_SESSION['googleEmail'] = $userData['email'];
	$_SESSION['googleGivenName'] = $userData['givenName'];
	$_SESSION['googleLoggedInStatus'] = false;
	$_SESSION['googleLoggedInId'] = '';

	$_SESSION['testResult'] = '';

	//if success, return logged in, else return error
	if($userData['email']) { 
		$sql = "select * from loothistory.users where email = '" . $userData['email'] . "'";
		$result = $con->query($sql);
		//$_SESSION['testResult'] = $result->num_rows;
		if($result->num_rows > 0){
			//user already exists, return logged in
			$_SESSION['googleLoggedInStatus'] = true;
			$value = $result->fetch_object();
			$_SESSION['googleLoggedInId'] = $value->id;
		} else {
			$sql = "insert into loothistory.users (email, name) values ('" . $userData['email'] . "', '" . $userData['givenName'] ."')";
			//$result = $con->query($sql);
			if ($con->query($sql) === TRUE) {
				$_SESSION['googleLoggedInId'] = $con->insert_id;
				$_SESSION['googleLoggedInStatus'] = true;
			} else {
				$_SESSION['sql_error'] = $con->error;
			}
		}
	} else {
		//for some reason the user doens't have an email from google, return error
		$_SESSION['error'] = 'User account query did not return a Google email address.';
	}

	header('Location: index.php');
	exit();
?>
