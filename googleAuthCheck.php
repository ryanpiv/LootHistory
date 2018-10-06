<?php
	require_once "google/config.php";
    //check if logged in with google
    if (!(isset($_SESSION['access_token']))) {
    	$loginURL = $gClient->createAuthUrl();
        header('Location: ' . $loginURL);
        exit();
    }
?>