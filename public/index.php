<?php

require_once __DIR__ . '/../config/main.php';
require_once ENGINE_DIR . "base.php";
require_once ENGINE_DIR . "user.php";
require_once ENGINE_DIR . "session.php";
require_once ENGINE_DIR . 'render.php';
$mainMenu = include_once CONFIG_DIR . 'menu.php';

if (session("user_id")) {
  $user = getUserById(session("user_id"));
  var_dump($user);
} else {
  echo "Вы не авторизованы!";
}


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