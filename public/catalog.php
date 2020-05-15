<?php

require_once __DIR__ . '/../config/main.php';
require_once ENGINE_DIR . 'render.php';
require_once ENGINE_DIR . 'fs.php';
require_once ENGINE_DIR . 'base.php';
require_once ENGINE_DIR . 'db.php';
$mainMenu = include_once CONFIG_DIR . 'menu.php';
$mainMenuHTML = renderMenu($mainMenu);
$products = dbGetCatalog(); 
include VIEWS_DIR . "header.php";
?>

<div><?= $mainMenuHTML ?></div>

<?php
include VIEWS_DIR . 'catalog.php'; 
include VIEWS_DIR . "footer.php";

?>