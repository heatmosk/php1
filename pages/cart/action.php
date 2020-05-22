<?php



if (!isset($_POST["product_id"]) || !isset($_POST["act"])) {
  redirect("/cart");
}

$act = post("act");
$productId = (int) post("product_id");

if (!in_array($act, ["add", "remove"])) {
  redirect("/cart");
}

$cart = getUserCart($user["id"]);
$cart["products"] = array_map(
  function ($prod) {
    return [
      "id" => $prod["product_id"],
      "amount" => $prod["product_amount"],
    ];
  },
  getCartProducts($cart["id"])
);

$product = array_filter(
  $cart["products"],
  function ($prod) use ($productId) {
    return $prod["id"] == $productId;
  }
); 


if (empty($product)) {
  $product = [
    "id" => $productId,
    "amount" => 0,
  ];
  createCartProduct($cart["id"], $productId, 0);
} else {
  $product = array_shift($product);
}


$product["amount"] += $act == "add" ? 1 : -1;

if ($product["amount"] <= 0) {
  removeCartProduct($cart["id"], $productId);
} else {
  setCartProductAmount($cart["id"], $productId, $product["amount"]);
} 


redirect("/cart");