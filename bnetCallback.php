<?php
	require_once "blizzard/oauth/bnetConfig.php";
    require_once "google/config.php";

    session_start();
    $_SESSION['error'] = '';
    $_SESSION['sql_error'] = '';
    $_SESSION['bnet_access_token'] = '';

    //check if logged in with google
    if (isset($_SESSION['access_token'])) {
        $params = array('code' => $_GET['code'], 'auth_flow' => 'auth_code', 'redirect_uri' => $bnetOauthClient->redirect_uri);
        $response = $bnetOauthClient->getAccessToken($bnetOauthClient->baseurl[$bnetOauthClient->region]['TOKEN_ENDPOINT'], 'authorization_code', $params);
        $bnetOauthClient->setAccessToken($response['result']['access_token']);
        $_SESSION['bnet_access_token'] = $response['result']['access_token'];        

        $response = $bnetOauthClient->fetch('wow_oauth_profile',array('source'=>'account'));

        $_SESSION['wow_oauth_profile'] = $response;

        header('Location: index.php');
    exit();
    } else {
        $loginURL = $gClient->createAuthUrl();
        header('Location: ' . $loginURL);
        exit();
    }
?>