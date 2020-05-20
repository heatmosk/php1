<?php

if (!isset($_GET["id"])) {
  redirect("/catalog.php");
}

$cart = getUserCart($user["id"]);
$productId = (int) get("id");

removeProductFromCart($cart["id"], $productId);

redirect("/?page=cart");
