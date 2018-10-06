<?php

	/* 
		1. Get guild and realm from query string
		2. Check with Bnet to verify account has guild and realm in it.
			a. If no, return to index with error
		3. Determine if guild is already claimed
			a. If yes, show apply for access to guild button
			b. If no, show apply to claim guild button

		Guild apply for access sequence
			1. Click button
			2. Verify logged in with Google
				a. If not, prompt login and redirect back to page
					- This might not be possible
			3. Query DB for email associated with guild
			4. Generate email and send to owner with clickable link to allow access
		Guild claim ownership sequence
			1. Verify logged in with Google then Bnet
				a. Redirect back to index with error information about not being logged in if either fail
			2. Create guild unique identifier 
				a. Query DB to ensure ID is unique
			3. Insert guild information to DB
			4. Redirect to unique guild page
	*/

	//require_once "googleAuthCheck.php";
	//require_once "bnetAuthCheck.php";

	//<?php if (isset($_SESSION['bnet_access_token'])) {

	//1. Get guild, realm and region from query string
	$guild = $_GET["guild"];
	$realm = $_GET["realm"];
	$region = $_GET["region"];
	$foundBool = false;

	//2. Check with Bnet to verify account has guild and realm in it.
	if(isset($_SESSION['wow_oauth_profile'])){
		$wowProfile = $_SESSION['wow_oauth_profile'];
		foreach($wowProfile['result']['characters'] as $i => $item) {
			if(isset($item['guild']) && isset($item['realm'])){
				if($item['guild'] == $guild && $item['realm'] == $realm){
					$foundBool = true;
				}
			}
		}
	} else {
		//2a. If no, return to index with error
		$_SESSION['error'] = 'This Battle.net account is not associated with ' . $realm . '-' . $guild;
		//header('Location: index.php');
		//exit();
	}

	$claimedBool = false;
	//3. Determine if guild has already been claimed
	if($foundBool == true){
		$sql = "SELECT * FROM loothistory.guilds WHERE region='" . $region . "' AND name='" . $guild . "' AND realm='" . $realm . "'";
		$result = $con->query($sql);
		if($result->num_rows > 0){
			//3a. If yes, show apply for access to guild button
			$claimedBool = true;
		}
	}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'head.php';?>
    <link rel="stylesheet" href="css/submit.css">
</head>
<body>
	<div class="container-fluid d-flex h-100 justify-content-center align-items-center">
		<div class="col-lg-4 col-12 container-submit">
			<div class="card">
				<div class="card-header"><?php echo "&lt;" . $guild . "&gt;, " . $region . "-" . $realm; ?></div>
				<?php if($claimedBool == true){ ?>
					<div class="card-body">
						<h5 class="card-title">Request Access</h5>
						<p class="card-text"><?php echo "&lt;" . $guild . "&gt;" ?> has already been claimed.  You may request the owner for access.  You will receive a follow-up email when your access has been approved.</p>
						
						<a href="#" class="btn btn-primary">Request Access</a>
					</div>
				<?php } else { ?>
					<div class="card-body">
						<h5 class="card-title">Claiming <?php echo "&lt;" . $guild . "&gt;" ?></h5>
						<p class="card-text"><?php echo "&lt;" . $guild . "&gt;" ?> has not yet been claimed.</p>
						<p class="card-text">Use the button below to claim ownership of this guild.</p>
						<a href="#" class="btn btn-primary" onclick="claimGuild(); return false;">Claim Guild</a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</body>

<script>
	console.log( <?php echo json_encode($_SESSION['wow_oauth_profile']); ?> );

	var guild = <?php echo $_GET["guild"]; ?>;
	var realm = <?php echo $_GET["realm"]; ?>;
	var region = <?php echo $_GET["region"]; ?>;

	function claimGuild(){
		$.ajax({
			url: '/claimGuild.php',
			type: 'POST',
			data: { 
				guild : guild,
				realm : realm,
				region : region
			 },
			success: function(output){
				debugger;
			}
	    });
	}

	function requestAccess(){
		
	}

</script>

</html>