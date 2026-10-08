<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/core/config.php";

if (!empty($_USER)) {
  $stmt = $db->prepare("
  SELECT COUNT(*) 
  FROM messages 
  WHERE messenger_id = ? AND is_read = 0
  ");

  $stmt->execute([$_USER["id"]]);

  $unreadmsgs = $stmt->fetchColumn();
}

$theme = $_USER["theme"] ?? "default";

$themes = [
  "default" => [
    "homepageusr" => "My GUBLOX",
    "gamesname" => "Games",
    "catalogtitle" => "Catalog",
    "browsetitle" => "People",
    "bctitle" => "Builders Club",
    "forumtitle" => "Forum",
    "logo" => "/images/logo.png",
    "banner" => "/images/BuildermanBanner.png",
    "header" => "GUBLOX Virtual Playworld",
    "paragraph" => "GUBLOX is Free!",
    "build1" => "Build your personal Place",
    "build1d" => "Create buildings, vehicles, scenery, and traps with thousands of virtual bricks.",
    "build2" => "Meet new friends online",
    "build2d" => "Visit your friend's place, chat in 3D, and build together.",
    "build3" => "Battle in the Brick Arenas",
    "build3d" => 'Play with the slingshot, rocket, or other brick battle tools. Be careful not to get "bloxxed".'
  ],

 
];

$current = $themes[$theme] ?? $themes["default"];

extract($current);
?>

<div id="Header">
  <div id="Banner">
    <div id="Options">
      <div id="Authentication">
        <?php if (!empty($_USER)): ?>
            <span>
                Logged in as 
                <strong><?= htmlspecialchars($_USER['username']) ?></strong>
                <strong>|</strong>
                <a href="/Logout.aspx">Logout</a>
            </span>
        <?php else: ?>
            <span>
                <a href="/Login/Default.aspx">Login</a>
            </span>
        <?php endif; ?>
      </div>
      <div id="Settings"></div>
    </div>

    <div id="Logo">
      <a
        id="ctl00_rbxImage_Logo"
        title="ROBLOX"
        href="/"
        style="display: inline-block; cursor: pointer"
        ><img src="<?= $logo ?>" border="0" alt="GuBlox"
      /></a>
    </div>

    <div id="Alerts" style="padding-right:38px">
      <?php
      if (!empty($_USER)) {
        ?>
        <table style="width:100%;height:100%;padding-right:40px">
            <tbody><tr>
                              <td valign="middle">
                  <table style="width:123%;height:101%;padding-right:10px;font-size: 12px;font-weight:bold">
                    <tbody>
                      <tr>
                        <td valign="middle">

                          <div>
                            <div id="AlertSpace">
                              <?php
                              if ($unreadmsgs > 0) {
                                ?>
                                <div id="MessageAlert">
                                  <a id="ctl00_rbxAlerts_MessageAlertIconHyperLink" class="MessageAlertIcon" href="/My/Inbox.aspx"><img src="/images/Message.gif" style="border-width:0px;" /></a>&nbsp;
                                  <a id="ctl00_rbxAlerts_MessageAlertCaptionHyperLink" class="MessageAlertCaption" href="/My/Inbox.aspx"><?= $unreadmsgs ?> new messages</a>
                                </div>
                                <?php
                              }
                              ?>
                                                            <div>
                                                                <div id="RobuxAlert">
                                  <a class="GoldbuxAlertIcon"><img src="/images/Robux.png" style="border-width:0px;filter: "></a>&nbsp;
                                  <a href="/My/AccountBalance.aspx"  class="GoldbuxAlertCaption"><?= $_USER["robux"] ?> GUBUX</a>
                                </div>
                                <div id="TicketsAlert">
                                  <a class="TicketsAlertIcon"><img src="/images/Tickets.png" style="border-width:0px;"></a>&nbsp;
                                  <a href="/My/AccountBalance.aspx" class="TicketsAlertCaption"><?= $_USER["tix"] ?> Tickets</a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>            </tr>
          </tbody></table>
        <?php
      } else {
        ?>
        <table style="width: 100%; height: 100%">
        <tbody>
          <tr>
            <td valign="middle">
              <a
                id="ctl00_BannerAlertsLoginView_BannerAlerts_Anonymous_rbxAlerts_SignupAndPlayHyperLink"
                class="SignUpAndPlay"
                text="Sign-up and Play!"
                href="/Login/New.aspx?ReturnUrl=%2fGames.aspx"
                style="display: inline-block; cursor: pointer"
                ><img src="/images/BannerPlay.png" border="0"
              /></a>
            </td>
          </tr>
        </tbody>
      </table>
        <?php
      }
      ?>
    </div>
  </div>
  <div class="Navigation">
    <span
      ><a id="ctl00_Menu_hlMyRoblox" class="MenuItem" href="/User.aspx"
        ><?= $homepageusr ?></a
      ></span
    >
    <span class="Separator">&nbsp;|&nbsp;</span>
    <span
      ><a id="ctl00_Menu_hlGames" class="MenuItem" href="/Games.aspx"
        ><?= $gamesname ?></a
      ></span
    >
    <span class="Separator">&nbsp;|&nbsp;</span>
    <span
      ><a id="ctl00_Menu_hlCatalog" class="MenuItem" href="/Catalog.aspx"
        ><?= $catalogtitle ?></a
      ></span
    >
    <span class="Separator" id="thingT">&nbsp;|&nbsp;</span>
    <span
      ><a id="ctl00_Menu_hlBrowse" class="MenuItem" href="/Browse.aspx"
        ><?= $browsetitle ?></a
      ></span
    >
    <span class="Separator">&nbsp;|&nbsp;</span>
    <span
      ><a
        id="ctl00_Menu_hlBuildersClub"
        class="MenuItem"
        href="/Upgrades/BuildersClub.aspx"
        ><?= $bctitle ?></a
      ></span
    >
    <span class="Separator">&nbsp;|&nbsp;</span>
    <span
      ><a id="ctl00_Menu_hlForum" class="MenuItem" href="/Forum/Default.aspx"
        ><?= $forumtitle ?></a
      ></span>
      <span class="Separator">&nbsp;|&nbsp;</span>
						<span><a class="MenuItem" href="#">News</a>&nbsp;<a id="NewsFeed" href="#"><img src="/images/feed-icon-14x14.png" alt="RSS" border="0"></a></span>
		                <span class="Separator">&nbsp;|&nbsp;</span>
		                <span><a class="MenuItem" href="#">Help</a></span>       
<?php if (!empty($_USER) && isset($_USER["role"]) && $_USER["role"] === "admin"): ?>
    <span class="Separator">&nbsp;|&nbsp;</span>
    <span>
        <a
            class="MenuItem"
            href="/Admin/Default.php"
            style="color: red; font-weight: bold;"
        >ADMIN</a>
    </span>
<?php endif; ?>

          
  </div>

  <div class="SystemAlert">
    <div class="SystemAlertText" style="background-color: rgb(255, 145, 0)">
      <div class="Exclamation"></div>
      <div id="sitealert1txt">We are in active development.</div>
    </div>
  </div>
</div>
