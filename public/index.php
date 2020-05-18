<?php

require_once __DIR__ . '/../config/main.php';
require_once ENGINE_DIR . "base.php";
require_once ENGINE_DIR . "user.php";
require_once ENGINE_DIR . "session.php";
require_once ENGINE_DIR . 'render.php';

$menu =  renderMenu(include_once CONFIG_DIR . 'menu.php');
$content = $menu;
echo render("main", ["content" => $content]);
// require_once __DIR__ . '/../config/main.php';
// require_once ENGINE_DIR . "base.php";
// require_once ENGINE_DIR . "user.php";
// require_once ENGINE_DIR . "session.php";
// require_once ENGINE_DIR . 'render.php';
// $mainMenu = include_once CONFIG_DIR . 'menu.php';
// $params = [];

// if (session("user_id")) {
//   $params["user"] = getUserById(session("user_id"));
//   $params["greeting"] = "Привет, " . $params["user"]["login"] . "!";
// }

// $mainMenuHTML = renderMenu($mainMenu);

// include VIEWS_DIR . "header.php";
// render("", $params);

 
// include VIEWS_DIR . "footer.php";
