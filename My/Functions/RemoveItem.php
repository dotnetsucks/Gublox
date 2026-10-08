

<?php
require_once "../../core/config.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user_id = (int)($_SESSION['user_id'] ?? 0);
$item_id = (int)($_GET['id'] ?? 0);

if (!$user_id) {
    die("Not logged in.");
}

if (!$item_id) {
    die("Invalid item ID.");
}


$stmt = $db->prepare("
    DELETE FROM wearing
    WHERE user_id = ?
      AND asset_id = ?
");

$stmt->execute([$user_id, $item_id]);

header("Location: /My/Character.aspx");
exit;
?>

