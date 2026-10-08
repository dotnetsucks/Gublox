<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "core/components/metadata.php";

$stmt = $db->prepare("
    SELECT * FROM games WHERE is_cool = 1
");

$stmt->execute();
$coolGames = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div id="MasterContainer" style="height: auto !important;">
<div id="Container">
  <?php require_once "core/components/header.php" ?>
  <div id="Body">
    <div id="SplashContainer">
      <div id="SignInPane">
        <div id="LoginViewContainer">
          <form id="LoginView" method="post" action="/Login/Default.aspx">
            <?php if (!empty($_USER)): ?>
              <h5>Logged In</h5>
            <?php else: ?>
              <h5>Member Login</h5>
            <?php endif; ?>

            <div class="AspNet-Login">
              <div class="AspNet-Login">
                <?php if (!empty($_USER)): ?>
                  <img src="http://gblx08.lol/thumbs/avatar/<?= $_USER["id"] ?>.png" style="display:inline-block;width:145px;margin-top:15px;" border="0" id="img" alt="<?= $_USER["username"] ?>">
                <?php else: ?>
                  <div class="AspNet-Login-UserPanel">
                    <label
                      for="ctl00_cphRoblox_rbxLoginView_lvLoginView_lSignIn_UserName"
                      id="ctl00_cphRoblox_rbxLoginView_lvLoginView_lSignIn_UserNameLabel"
                      class="Label"
                      >Character Name</label
                    >
                    <input
                      name="Username"
                      type="text"
                      id="ctl00_cphRoblox_rbxLoginView_lvLoginView_lSignIn_UserName"
                      tabindex="1"
                      class="Text"
                    />
                  </div>
                  <div class="AspNet-Login-PasswordPanel">
                    <label
                      for="ctl00_cphRoblox_rbxLoginView_lvLoginView_lSignIn_Password"
                      id="ctl00_cphRoblox_rbxLoginView_lvLoginView_lSignIn_PasswordLabel"
                      class="Label"
                      >Password</label
                    >
                    <input
                      name="Password"
                      type="password"
                      id="ctl00_cphRoblox_rbxLoginView_lvLoginView_lSignIn_Password"
                      tabindex="2"
                      class="Text"
                    />
                  </div>
                  <!--div class="AspNet-Login-RememberMePanel"-->

                  <!--/div-->
                  <div class="AspNet-Login-SubmitPanel">
                    <button
                      id="ctl00_cphRoblox_rbxLoginView_lvLoginView_lSignIn_Login"
                      tabindex="4"
                      class="Button"
                      type="submit"
                    >Login</button>
                   <div class="AspNet-Login-SubmitPanel">
						   	<a tabindex="4" class="Button" href="Login/New.aspx">Register</a>
						</div>
                  </div>
                  <div class="AspNet-Login-PasswordRecoveryPanel">
                    <a
                      id="ctl00_cphRoblox_rbxLoginView_lvLoginView_lSignIn_hlPasswordRecovery"
                      tabindex="5"
                      href="Login/ResetPasswordRequest.aspx"
                      >Forgot your password?</a
                    >
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </form>
          <div id="Figure">
            <a
              id="ctl00_cphRoblox_LoginView1_ImageFigure"
              disabled="disabled"
              title="Figure"
              onclick="return false;"
              style="display: inline-block"
              ><img
                src="/images/NewFrontPageGuy.png"
                border="0"
                alt="Figure"

            /></a>
          </div>
        </div>
      </div>
      <div id="RobloxAtAGlance">
        <h2><?= $header ?></h2>
        <h3><?= $paragraph ?></h3>
        <ul id="ThingsToDo">
          <li id="Point1">
            <h3><?= $build1 ?></h3>
            <div>
              <?= $build1d ?>
            </div>
          </li>
          <li id="Point2">
            <h3><?= $build2 ?></h3>
            <div>
              <?= $build2d ?>
            </div>
          </li>
          <li id="Point3">
            <h3><?= $build3 ?></h3>
            <div>
              <?= $build3d ?>
            </div>
          </li>
        </ul>
        <div id="Showcase">
          <iframe
            width="400"
            height="326"
            src="https://www.youtube.com/embed/dtH_rhfh69Y"
            title="YouTube video player"
            frameborder="0"
            allow="
              accelerometer;
              autoplay;
              clipboard-write;
              encrypted-media;
              gyroscope;
              picture-in-picture;
              web-share;
            "
            referrerpolicy="strict-origin-when-cross-origin"
            allowfullscreen
          ></iframe>
          <div id="Install" style="margin-right: 138px">
            <div id="CompatibilityNote">Works with your<br />Windows PC!</div>
           <div id="DownloadAndPlay">
									<a href="Install/Default.aspx">
									<img src="/images/PlayNowGreenFader.gif" alt="FREE - Download and Play!" border="0">
									</a>
								</div>
          </div>
          <div id="ForParents">
            <a
              id="ctl00_cphRoblox_RobloxAtAGlanceLoginView_RobloxAtAGlance_Anonymous_hlKidSafe"
              title="GUBLOX is kid-safe!"
              href="Parents.aspx"
              style="display: inline-block"
              ><img
                title="GUBLOX is kid-safe!"
                src="/images/GamerSeal.png"
                border="0"
            /></a>
          </div>
        </div>
      </div>
     <div id="UserPlacesPane">
							<div id="UserPlaces_Content">
								<table width="100%" cellspacing="0" border="0">
									<tbody>
										<tr>
											<td class="UserPlace">
												<a title="Our Discord Server" href="https://discord.gg/UxWgS8K" style="display:inline-block;cursor:pointer;margin-top:-10px;"><img src="/images/discord.png" id="img" alt="Our Discord Server" border="0" width="85" height="85"></a>
											</td>
											<td class="UserPlace">
												<a title="Our Twitter Page" href="/" style="display:inline-block;cursor:pointer;margin-left:30px;"><img src="/images/Twitter1.png" id="img" alt="Our Twitter Page" border="0" height="50" width="50"></a>
											</td>
											<td class="UserPlace">
												<a title="E-mail us!" href="/" style="display:inline-block;cursor:pointer;"><img src="/images/mail.png" id="img" alt="E-mail us!" width="80" height="80" border="0"></a>
											</td>
											<td class="UserPlace">
												<a title="Our Subreddit!" href=/" style="display:inline-block;cursor:pointer;margin-top:-10px;"><img src="/images/reddit.png" id="img" alt="Our Subreddit!" height="75" width="75" border="0"></a>
											</td>
											<td class="UserPlace">
												<a title="Our YouTube Channel" href="/" style="display:inline-block;cursor:pointer;"><img src="/images/youtube.png" id="img" alt="Our YouTube Channel" border="0"></a>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div id="UserPlaces_Header" style="min-height:70px;">
								<h3>GUBLOX Links</h3>
								<p>Check out our important links that you could visit!</p>
							</div>
						</div>
					</div>
				</div>
  <?php require_once "core/components/footer.php" ?>
</div>
 </div>
