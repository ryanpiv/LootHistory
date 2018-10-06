<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php include 'head.php';?>
</head>

<body class="vegas">
    <nav id="nav-main" class="navbar navbar-expand-md navbar-dark fixed-top">
        <a class="navbar-brand" href="#">Loot Analytics</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse justify-content-end" id="navbarCollapse" style="">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#section-about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#">Discord</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#">Patreon</a>
                </li>
                <?php 
                if (isset($_SESSION['access_token'])) {
                    echo '<li class="nav-item"><a onclick="window.location=' . "'" . $logoutURL . "'" . '" class="nav-link" href="#">Sign Out</a>
                </li>';
                } else {
                    echo '<li class="nav-item"><a onclick="window.location=' . "'" . $loginURL . "'" . '" class="nav-link" href="#">Sign In</a>
                </li>';
                }
                ?>
                <!-- <li class="nav-item">
                    <a id="nav-google-login-button" class="nav-link google-login-button" href="#">Sign In</a>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="https://us.battle.net/oauth/authorize?client_id=vpy2aban78ysyz44bk8me6qzzx249kgz&scope=wow.profile&state=test&redirect_uri=http://localhost:8080/LootHistory&response_type=code">Sign In</a>
                </li> -->
            </ul>
        </div>
    </nav>
    <section id="main" class="container-fluid main py-5">
        <div class="row justify-content-center align-items-center">
            <div class="jumbotron jumbotron-fluid bg-dark round-border transparent">
                <div class="container text-align-center">
                    <div class="row">
                        <h1 class="display-4 col-12">World of Warcraft Loot Analytics</h1>
                    </div>
                    <div class="row">
                        <p class="lead col-12">The items you earn viewed in the ways you need. An insightful view into your guild's item distribution history with RC Loot Council and Big Dumb Loot Council.</p>
                    </div>
                    <div class="row justify-content-around">
                        <button id="btn-learn" class="btn btn-outline-light btn-lg col-12 col-lg-3">Learn More</button>
                        <button id="btn-demo" class="btn btn-outline-light btn-lg col-12 col-lg-3">View the Demo</button>
                        <button id="btn-start" class="btn btn-outline-light btn-lg col-12 col-lg-3 google-sign-in">Get Started</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="section-about" class="container-fluid bg-dark py-5 h-100 py-5">
        <div class="row justify-content-center align-items-center text-align-center py-5">
            <div class="col-12">
                <h1 class="display-3 bold my-5">How it Works</h1>
            </div>
            <div class="col-12 col-lg-3">
                <h1>Collect Loot Data</h1>
                <p>Use either RC Loot Council or Big Dumb Loot Council and enable their settings to track loot history. Then, use either addon to distribute the loot you've earned in WoW.</p>
            </div>
            <div class="col-1">
                <i class="fas fa-chevron-right fa-3x"></i>
            </div>
            <div class="col-12 col-lg-3">
                <h1>Submit to WoW Analytics</h1>
                <p>Once you've achieved a sizeable portion of data, upload the text file to WoW Analytics. The robots will begin work on making this data useful.</p>
            </div>
            <div class="col-1">
                <i class="fas fa-chevron-right fa-3x"></i>
            </div>
            <div class="col-12 col-lg-3">
                <h1>View Results</h1>
                <p>After the data has been processed, it will be available to you at your guild's portal. Many maniputable graphs and charts will help to give you a clearer insight to the loot distribution.</p>
            </div>
            <div class="col-lg-4 m-0 p-0">
                <div class="embed-responsive embed-responsive-16by9">
                    <video class="embed-responsive-item" width="100%" height="100%" autoplay loop>
                        <source src="media/PassionateDisfiguredBarasinga.webm" type="video/mp4" /> Your browser does not support the video tag.
                    </video>
                </div>
            </div>
            <div class="col-lg-4 m-0 p-0">
                <div class="embed-responsive embed-responsive-16by9">
                    <video class="embed-responsive-item" width="100%" height="100%" autoplay loop>
                        <source src="media/PassionateDisfiguredBarasinga.webm" type="video/mp4" /> Your browser does not support the video tag.
                    </video>
                </div>
            </div>
            <div class="col-lg-4 m-0 p-0">
                <div class="embed-responsive embed-responsive-16by9">
                    <video class="embed-responsive-item" width="100%" height="100%" autoplay loop>
                        <source src="media/GenuineFakeBluefintuna.webm" type="video/mp4" /> Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>
        <div class="row justify-content-center align-items-end text-align-center py-5">
            <div class="col-12">
                <h3>Scroll down to get started.</h3>
            </div>
        </div>
    </section>
    <section id="section-start" class="container-fluid py-5">
        <div class="row justify-content-center align-items-center text-align-center py-5">
            <div class="col-12 my-5">
                <h1 class="display-3 bold">Get Started</h1>
            </div>
            <div class="col-12 my-5">
                <h2 class="display-4">Login with Google</h2>
                <p class="lead">This will link your Google account with Loot Analytics. This information is necessarry to uniquely identify you in our system for managing your guild.</p>
                <hr class="my-4">
                <?php 
                if (isset($_SESSION['access_token'])) {
                    echo '<a id="getting-started-login-button" class="btn disabled btn-lg google-login-button" role="button">You are already logged in</a>';
                } else {
                    echo '<a id="getting-started-login-button" class="btn btn-primary btn-lg google-login-button" href="' . $loginURL . '" role="button">Sign In</a>';
                }
                ?>
                <!-- <a id="getting-started-login-button" class="btn btn-lg google-login-button g-signin2" href="#" role="button">Sign In</a> -->
            </div>

            <?php if(isset($_SESSION['access_token'])) { include 'section-bnet.php'; } ?>

            <?php if(isset($_SESSION['error']) && !empty($_SESSION['error'])) { ?>
                <div id="application-error" class="col-lg-6 col-12 alert alert-danger mt-5" role="alert">
                    <span>Error: <?php> echo $_SESSION['error']; ?></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['sql_error']) && !empty($_SESSION['sql_error'])) { ?>
                <div id="application-sql-error" class="col-lg-6 col-12 alert alert-danger mt-5" role="alert">
                    <span>Error: <?php> echo $_SESSION['sql_error']; ?></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php } ?>
        </div>
    </section>
    <section id="section-pricing" class="container-fluid bg-light py-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <h1 class="display-4 text-align-center">Extra Benefits</h1>
            </div>
            <div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-align-center">
                <p class="lead">Upgrade to create more raid teams, allow for more players per team and keep track of larger item pools throughout your guild's history.</p>
                <p class="lead">On average a guild will require 1,000 item entries to track 1 difficulty of raid loot per tier.</p>
                <p class="lead">In other words, a guild tracking all heroic difficulty loot from week one until the end of the Uldir raid tier in BfA will accrue approximately 1,000 items.</p>
            </div>
            <div class="container">
                <div class="card-deck mb-3 text-center">
                    <div class="card mb-3 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Free</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>1,000 item entries before auto delete</li>
                                <li>1 raid team</li>
                                <li>30 member maximum</li>
                            </ul>
                            <button type="button" class="btn btn-lg btn-block btn-outline-primary">Sign up for free</button>
                        </div>
                    </div>
                    <div class="card mb-3 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Clan</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$1 <small class="text-muted">/ mo</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>2,500 item entries per raid team before auto delete</li>
                                <li>2 raid teams</li>
                                <li>Max of 40 members per team</li>
                                <li>Discord benefits</li>
                            </ul>
                            <button type="button" class="btn btn-lg btn-block btn-primary">Upgrade</button>
                        </div>
                    </div>
                    <div class="card mb-3 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Guild</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$3 <small class="text-muted">/ mo</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>5,000 item entries per raid team before auto delete</li>
                                <li>4 raid teams</li>
                                <li>Max of 50 members per team</li>
                                <li>Discord benefits</li>
                            </ul>
                            <button type="button" class="btn btn-lg btn-block btn-primary">Upgrade</button>
                        </div>
                    </div>
                    <div class="card mb-3 shadow-sm">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Empire</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">$5 <small class="text-muted">/ mo</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>10,000 item entries per raid before auto delete</li>
                                <li>10 raid teams</li>
                                <li>Max of 60 members per team</li>
                                <li>Discord benefits</li>
                            </ul>
                            <button type="button" class="btn btn-lg btn-block btn-primary">Upgrade</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="section-about" class="container-fluid bg-light py-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-12">
                <h1 class="display-4">Why was this created?</h1>
            </div>
            <div class="col-12">
                <p>This website relies entirely on a guild's self collection of loot history data via the addons RC Loot Council and Big Dumb Loot Council. Both addons have methods for keeping a history of loot distributed through it. While the data itself is extremely useful, the format it's presented in is not.</p>
                <p>Seeing this, I made the original version of this website for my guild during Tomb of Sargeras progression. I wanted to know where my guild's loot was going to ensure and prove that we were being fair the group as a whole as a trustworthly loot council. Today, I'm attempting to share this with the rest of the World of Warcraft player base.</p>
                <p>I'm Smaktat and I've been playing this game for quite a long time. Being able to give back like this is extremely exciting for me. I hope you find my tool to be useful for your purposes.</p>
            </div>
        </div>
    </section>
</body>
<script>
$(document).ready(function() {
    //recheck bnet and google access tokens every time page is loaded to ensure validity



    //check to see if user is already logged in with google




    //get oauth profile from session
    var wow_oauth_profile = <?php if(isset($_SESSION['wow_oauth_profile']) && !empty($_SESSION['wow_oauth_profile'])) {
         echo json_encode($_SESSION['wow_oauth_profile']);
    } else {
        echo '[]';
    } ?>;

    if(wow_oauth_profile){
        if(wow_oauth_profile.result){
            //iterate through profile to build server-guild dropdown
            var guildRealms = [];
            if(wow_oauth_profile.result.characters.length > 0) {
                //build dropdown
                wow_oauth_profile.result.characters.forEach(function(character){
                    var guildRealmSwitch = 0;
                    guildRealms.forEach(function(guildRealm){ 
                        if(guildRealm == character['realm'] + '-' + character['guild'] || typeof(character['guild']) == 'undefined') { 
                            guildRealmSwitch = 1; 
                        } 
                    });
                    if(guildRealmSwitch == 0 && typeof(character['guild']) != 'undefined' ) { 
                        guildRealms.push(character['realm'] + '-' + character['guild']); 
                    }
                });
                guildRealms.sort();

                if(guildRealms.length == 0 ) {
                    var a = document.createElement('a');
                    a.text = 'At least one of your characters must be a part of a guild.';
                    a.href = '#';
                    $(a).addClass('dropdown-item');
                    $(a).attr('onclick', 'return false;');
                    $('#guildRealmList').append(a);
                } else {
                    guildRealms.forEach(function(guildRealm){
                        var a = document.createElement('a');
                        a.text = guildRealm;
                        a.href = '#';
                        $(a).addClass('dropdown-item');
                        $(a).attr('onclick', 'dropDownSelect(this); return false;');
                        $('#guildRealmList').append(a);
                    });
                }
            }
        }
    }

    function phpDebug(bool){
        if(bool == true){
            console.log("googleLoggedInStatus: " + <?php if(isset($_SESSION['googleLoggedInStatus']) && !empty($_SESSION['googleLoggedInStatus'])) { echo '"' . $_SESSION['googleLoggedInStatus'] . '"'; } else { echo '""'; } ?>);
            console.log("googleLoggedInId: " + <?php if(isset($_SESSION['googleLoggedInId']) && !empty($_SESSION['googleLoggedInId'])) { echo '"' . $_SESSION['googleLoggedInId'] . '"'; } else { echo '""'; } ?>);
            console.log("googleEmail: " + <?php if(isset($_SESSION['googleEmail']) && !empty($_SESSION['googleEmail'])) { echo '"' . $_SESSION['googleEmail'] . '"'; } else { echo '""'; } ?>);
            console.log("googleGivenName: " + <?php if(isset($_SESSION['googleGivenName']) && !empty($_SESSION['googleGivenName'])) { echo '"' . $_SESSION['googleGivenName'] . '"'; } else { echo '""'; } ?>);
            console.log("error: " + <?php if(isset($_SESSION['error']) && !empty($_SESSION['error'])) { echo '"' . $_SESSION['error'] . '"'; } else { echo '""'; } ?>);
            console.log("sql_error: " + <?php if(isset($_SESSION['sql_error']) && !empty($_SESSION['sql_error'])) { echo '"' . $_SESSION['sql_error'] . '"'; } else { echo '""'; } ?>);
            console.log("testResult: " + <?php if(isset($_SESSION['testResult']) && !empty($_SESSION['testResult'])) { echo '"' . $_SESSION['testResult'] . '"'; } else { echo '""'; } ?>);
        }
    }
    phpDebug(true);
});
</script>

</html>