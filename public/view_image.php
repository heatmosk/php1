<?php

require_once __DIR__ . '/../config/main.php';
require_once ENGINE_DIR . 'render.php';
require_once ENGINE_DIR . 'fs.php';
require_once ENGINE_DIR . 'base.php';
require_once ENGINE_DIR . 'db.php';
$mainMenu = include_once CONFIG_DIR . 'menu.php';

$mainMenuHTML = renderMenu($mainMenu);

if (!isset($_GET["id"])) {
  redirect("/gallery.php");
}
$imgId = (int) $_GET["id"];


$imgInfo = getImage($imgId);  
addImageView($imgId);
$imageViews = $imgInfo['views'] + 1; 

include VIEWS_DIR . "header.php";

$reviewsCounter = count($reviews);
?>

<div><?= $mainMenuHTML ?></div>
<div>Просмотров: <?= $imageViews ?></div>
<img src='<?= $imgInfo["filename"] ?>'

<?php 
include VIEWS_DIR . "footer.php";
?>