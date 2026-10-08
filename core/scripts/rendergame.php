<?php
$id = $_GET["gameId"]
?>

game:Load("http://gblx08.lol//asset/?id=<?= $id ?>")
return game:GetService('ThumbnailGenerator'):Click("PNG", 1000, 500, false)