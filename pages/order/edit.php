<?php

if (!$user["editor"] ?? true) {
  redirect("/");
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["order_id"]) && isset($_POST["status"])) {

  setOrderStatus(post("order_id"), post("status"));
  redirect("/order");
}


if (!isset($_GET["id"])) {
  redirect("/");
}



$order = getOrderById(get("id"));
$order["products"] = array_map(
  function ($prod) {
    $productInfo =  getProductById($prod["product_id"]);
    return [
      "id" => $prod["product_id"],
      "name" => $productInfo["name"],
      "amount" => $prod["product_amount"],
      "cost" => $productInfo["cost"],
      "totalCost" => $prod["product_amount"] *  $productInfo["cost"],
      "image" => array_shift(getProductImages($prod["product_id"]))
    ];
  },
  getOrderProducts($order["id"])
);
$order["user"] = getUserById($order["user_id"]);
$order["status"] = getOrderStatus($order["id"]);
$statuses = getAllOrderStatuses();
//  header('Content-Type: application/json');
// echo json_encode($order);
echo render("order/edit", compact("menu", "order", "statuses"));
