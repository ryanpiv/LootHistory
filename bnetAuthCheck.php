<?php 
	require_once "blizzard/oauth/bnetConfig.php";

	if(!(isset($_SESSION['bnet_access_token']))) { 
		$bnetAuthURL = $bnetOauthClient->getAuthenticationUrl($bnetOauthClient->baseurl[$bnetOauthClient->region]['AUTHORIZATION_ENDPOINT'], $bnetOauthClient->redirect_uri);
        header('Location: ' . $bnetAuthURL);
        exit();
	}

?>