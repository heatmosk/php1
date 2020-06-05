<?php

require_once __DIR__ . '\..\config\main.php';
require ENGINE_DIR . "autoload.php";

session_start();

if (!$requestUri = preg_replace(['#^/#', "#[?].*#"], "", $_SERVER['REQUEST_URI'])) {
    $requestUri = 'auth';
}

$parts = explode("/", $requestUri);
$page = $parts[0];
$action = $parts[1] ?? "index";

$scriptName = PAGES_DIR . $page . "/" . $action . ".php";
$menu = getMenuItems(); 
$user = getUserById(session_get("user_id"));
$user["editor"] = userIsEditor($user["id"]); 

if (file_exists($scriptName)) {
    include $scriptName;
} else {
    echo "Такой страницы нет!";
}


// require_once __DIR__ . '/../config/main.php';
// require_once ENGINE_DIR . "base.php";
// require_once ENGINE_DIR . "fs.php";
// require_once ENGINE_DIR . "db.php";
// require_once ENGINE_DIR . "session.php";
// require_once ENGINE_DIR . "user.php";
// require_once ENGINE_DIR . "gallery.php";
// require_once ENGINE_DIR . "products.php";
// require_once ENGINE_DIR . "cart.php";
// require_once ENGINE_DIR . 'render.php';
// require_once VENDOR_DIR . 'funcImgResize.php';

// $page = isset($_REQUEST["page"]) ? request("page") : "index";
 
// $menu = include_once CONFIG_DIR . 'menu.php';

// $params = [];
// if (sessionIsSet("user_id")) {
//   $params["user"] = getUserById(session("user_id"));
//   $params["user_id"] = session("user_id");
//   unset($menu["Login"]);
//   $menu['Logout'] = ['url' => '/?page=logout'];
// }  

// $params['title'] = "PAGE: " . $page;

// if ($page !== "index") {
//   $params = array_merge($params, include PUBLIC_DIR . $page . ".php");
// } 
// echo render(VIEWS_DIR . "main", [
//   "menu" => renderMenu($menu),
//   "content" => render(VIEWS_DIR . $page, $params)
// ]);  