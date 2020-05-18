<?php

require_once __DIR__ . '/../config/main.php';
require_once ENGINE_DIR . 'render.php';
require_once ENGINE_DIR . 'fs.php';
require_once ENGINE_DIR . 'base.php';
require_once ENGINE_DIR . 'db.php';
$mainMenu = include_once CONFIG_DIR . 'menu.php';

$mainMenuHTML = renderMenu($mainMenu);

if (!isset($_GET["id"])) {
  redirect("/catalog.php");
}

$productId = (int) $_GET["id"];
$product = getProductById($productId);
$reviews = getProductReviews($productId);
$reviewsCounter = count($reviews);
addProductView($productId);
$views = $product["views"] + 1;

include VIEWS_DIR . "header.php";
 
?>

<div><?= $mainMenuHTML ?></div>

<?php
include VIEWS_DIR . "view_product.php";
include VIEWS_DIR . "footer.php";
?>