<?php

require_once __DIR__ . '/../config/main.php';
require_once ENGINE_DIR . 'render.php';
require_once ENGINE_DIR . 'fs.php';
require_once ENGINE_DIR . 'base.php';
require_once ENGINE_DIR . 'db.php';

if (!isset($_GET["id"])) {
  redirect("/gallery.php");
}
$imgId = (int) $_GET["id"];

$mainMenu = [
  'Home' => ['url' => '/'],
  'Gallery' => ['url' => '/gallery.php']
];
$mainMenuHTML = renderMenu($mainMenu);

$imgInfo = db_get_image($imgId);
if (count($imgInfo) > 0) {
  $imgInfo = $imgInfo[0];
}
db_add_image_view($imgInfo['id']);
$imgInfo = db_get_image($imgId)[0];

$imageViews = $imgInfo['views'];
include VIEWS_DIR . "header.php";

?>

<div><?= $mainMenuHTML ?></div>
<div>Просмотров: <?= $imageViews ?></div>
<div><img src='<?= $imgInfo['filename'] ?>'></div>

</div>

<?php
include VIEWS_DIR . "footer.php";
?>