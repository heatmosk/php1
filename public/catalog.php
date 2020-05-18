<?php

require_once __DIR__ . '/../config/main.php';
require_once ENGINE_DIR . 'render.php';
require_once ENGINE_DIR . 'products.php';

$mainMenu = include_once CONFIG_DIR . 'menu.php';
$mainMenuHTML = renderMenu($mainMenu);



include VIEWS_DIR . "header.php";
?>

<div><?= $mainMenuHTML ?></div>

<?php
include VIEWS_DIR . 'catalog.php'; 
include VIEWS_DIR . "footer.php";

?>