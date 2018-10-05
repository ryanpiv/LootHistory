<!-- CSS -->
<!-- Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<link rel="stylesheet" href="css/index.css">


<!-- JS -->
<!-- Bootstrap and JQuery -->
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<!-- Pace -->
<link rel="stylesheet" href="libs/pace/fill_left.css">
<script src="libs/pace/pace.js"></script>

<!-- Vegas -->
<link rel="stylesheet" href="libs/vegas/vegas.min.css">
<script src="libs/vegas/vegas.min.js"></script>
<script src="libs/vegas/vegas_config.js"></script>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

<!-- JS Scripts -->
<script src="js/index.js"></script>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Didact+Gothic|Quicksand" rel="stylesheet">

<!-- Google OAuth -->
<!-- <script>
    function renderButton() {
      gapi.signin2.render('getting-started-login-button', {
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark'
      });
    }
</script>
<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
<meta name="google-signin-client_id" content="30633313634-u8la6rft8k3fkkom47h7bjif8hq4c84b.apps.googleusercontent.com"> -->
<script src="https://apis.google.com/js/api:client.js"></script>
<script>
    // Called when Google Javascript API Javascript is loaded
    function HandleGoogleApiLibrary() {
        // Load "client" & "auth2" libraries
        gapi.load('client:auth2', {
            callback: function() {
                // Initialize client & auth libraries
                gapi.client.init({
                    apiKey: googleApiKey,
                    clientId: googleClientId,
                    scope: 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me'
                }).then(
                    function(success) {
                        // Libraries are initialized successfully
                        // You can now make API calls
                    },
                    function(error) {
                        // Error occurred
                        // console.log(error) to find the reason
                    }
                );
            },
            onerror: function() {
                // Failed to load libraries
            }
        });
    }
</script>
<script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};HandleGoogleApiLibrary()" onreadystatechange="if (this.readyState === 'complete') this.onload()"></script>


<?php
    require_once "google/config.php";
    require_once 'blizzard/oauth/bnetConfig.php';

	if (isset($_SESSION['access_token'])) {
		//header('Location: index.php');
		//exit();
        //logged in
	}

	$loginURL = $gClient->createAuthUrl();
    $logoutURL = 'logout.php';
    $bnetAuthURL = $bnetOauthClient->getAuthenticationUrl($bnetOauthClient->baseurl[$bnetOauthClient->region]['AUTHORIZATION_ENDPOINT'], $bnetOauthClient->redirect_uri);
?>