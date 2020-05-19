<?php

$cart = getUserCart($user["id"]);
$cart["products"] = json_decode($cart["products"], true);
$cart['cost'] = array_sum(
  array_map(
    function ($prod) {
      return $prod["amount"] * $prod["cost"];
    },
    $cart["products"]
  )
);
return compact("cart");
