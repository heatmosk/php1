<?php

$cart = getUserCart($user["id"]);
$productsAmount = array_map(
  function ($prod) {
    return [
      "id" => $prod["product_id"],
      "amount" => $prod["product_amount"]
    ];
  },
  getCartProducts($cart["id"])
);
$cart["products"] = array_map(
  function ($prod) {
    $product = getProductById($prod["id"]);
    $product["amount"] = $prod["amount"];
    $product["totalCost"] = $product["amount"] * $product["cost"];
    return $product;
  },
  $productsAmount
);

$cart['cost'] = array_sum(
  array_map(
    function ($prod) {
      return $prod["amount"] * $prod["cost"];
    },
    $cart["products"]
  )
);


echo render("cart/index",  compact("menu", "cart"));
