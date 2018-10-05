<div class="col-12 my-5">
    <h2 class="display-4">Authorize Battle.net</h2>
    <p class="lead">This process will automatically find any available guilds your Battle.net profile is a part of.  You'll be able to select the guilds you want to manage or request access to view ones you're already a part of.</p>
    <hr class="my-4">
    <?php if (!(isset($_SESSION['bnet_access_token']))) { ?>
    <a id="getting-started-login-button" class="btn btn-primary btn-lg" href= <?php echo '"' . $bnetAuthURL . '"'; ?> role="button">Authorize Battle.net</a>
    <?php } else { ?>
    <a id="getting-started-login-button" class="btn disabled btn-lg" role="button">You have already authorized Battle.net</a>
    <?php } ?>
</div>
          
<?php if (isset($_SESSION['bnet_access_token'])) { ?>
<div class="col-12 mt-5">
    <h2 class="display-4">Select Your Server and Guild</h2>
    <p class="lead">Choose the guild you would like to manage. If this guild has already been claimed you may request access to it.</p>
    <p class="lead">You must be in a guild.</p>
    <hr class="my-4">
</div>
<div class="col-lg-3 col-12">
    <div class="dropdown">
        <button class="btn btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Server-Guild
        </button>
        <div id="guildRealmList" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        </div>
    </div>
</div>
<div class="col-12 mt-5">
    <a id="from-submit" class="btn btn-success btn-lg" href="#" onclick=" return false;">Submit</a>
</div>
<?php } ?>