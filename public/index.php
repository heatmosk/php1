<?php

require_once __DIR__ . '/../config/main.php';
require_once VENDOR_DIR . "funcImgResize.php";
require_once ENGINE_DIR . "base.php";
require_once ENGINE_DIR . 'fs.php';
require_once ENGINE_DIR . "session.php";
require_once ENGINE_DIR . 'db.php'; 
require_once ENGINE_DIR . "user.php"; 

$page = isset($_GET["page"]) ? get("page") : "index";

$params = [];
if (session("user_id")) {
  $params["user"] = getUserById(session("user_id"));
}

if ($page !== "index") {
  echo "Page: ${page}<br>";
  include PUBLIC_DIR . $page;
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
