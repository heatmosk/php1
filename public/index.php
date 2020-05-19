<?php

require_once __DIR__ . '/../config/main.php';
require_once ENGINE_DIR . "base.php";
require_once ENGINE_DIR . "fs.php";
require_once ENGINE_DIR . "db.php";
require_once ENGINE_DIR . "session.php";
require_once ENGINE_DIR . "user.php";
require_once ENGINE_DIR . "gallery.php";
require_once ENGINE_DIR . 'render.php';
require_once VENDOR_DIR . 'funcImgResize.php';

$page = isset($_REQUEST["page"]) ? request("page") : "index";
echo "page: {$page}<br>";

$params = [];
if (sessionGet("user_id")) {
  $params["user"] = getUserById(session("user_id"));
}
$params['title'] = "PAGE: " . $page;

if ($page !== "index") {
  echo PUBLIC_DIR . $page . ".php<br>";
  $params = array_merge($params, include PUBLIC_DIR . $page . ".php");
}

echo render(VIEWS_DIR . "main", [
  "menu" => renderMenu(include_once CONFIG_DIR . 'menu.php'),
  "content" => render(VIEWS_DIR . $page, $params)
]);

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
