<?php

require_once __DIR__ . '/../config/main.php';
require_once ENGINE_DIR . 'render.php';
require_once ENGINE_DIR . 'fs.php';
$mainMenu = include_once CONFIG_DIR . 'menu.php';

$title = 'Приветствие!';
$user = 'Alex';
$greeting = 'Привет';

$year = date("Y");

$mainMenuHTML = renderMenu($mainMenu);

include VIEWS_DIR . "header.php";  
?>

<div><?= $mainMenuHTML ?></div>
<div><?= $greeting . ', ' . $user ?></div>
<!-- <div><?= $year ?></div> -->

<?php
include VIEWS_DIR . "footer.php";
?>