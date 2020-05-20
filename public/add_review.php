<?php

require_once __DIR__ . '/../config/main.php';
require_once ENGINE_DIR . 'render.php';
require_once ENGINE_DIR . 'base.php';
require_once ENGINE_DIR . 'db.php';
$mainMenu = include_once CONFIG_DIR . 'menu.php';

$mainMenuHTML = renderMenu($mainMenu);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST["id"]) && isset($_POST["rating"]) && isset($_POST["review_text"])) {
    dbAddProductReview($_POST["id"], $_POST["rating"], $_POST["review_text"]);
  }
  redirect("/view_product.php?id=" . $_POST["id"]);
}

if (!isset($_GET["id"])) {
  redirect("/");
}

$productId = (int) $_GET["id"];


include VIEWS_DIR . "header.php";
?>

<div><?= $mainMenuHTML ?></div>

<?php

include VIEWS_DIR . 'review_form.php';
include VIEWS_DIR . "footer.php";

?>