<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["cart_id"])) {
  $cart = getCartById(post("cart_id"));
  if (!empty($cart)) {
    $cart["products"] = getCartProducts($cart["id"]);
    if (!empty($cart["products"])) {
      createUserOrder($cart["user_id"], $cart["id"]);
      deleteAllCartProducts($cart["id"]);
      deleteCart($cart["id"]);
    }
  }
  redirect("/order");
} else {
  redirect("/");
}
