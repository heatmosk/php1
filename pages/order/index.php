<?php


$orders = array_map(
  function ($orderInfo) {
    $products = getOrderProducts($orderInfo["id"]);
    return [
      "id" => $orderInfo["id"],
      "user_id" => $orderInfo["user_id"],
      "status" => getOrderStatus($orderInfo["status_id"]),
      "products" => array_map(function ($prod) {
        $productInfo =  getProductById($prod["product_id"]);
        return [
          "id" => $prod["product_id"],
          "name" => $productInfo["name"],
          "amount" => $prod["product_amount"],
          "cost" => $productInfo["cost"],
          "totalCost" => $prod["product_amount"] *  $productInfo["cost"],
        ];
      }, $products),
    ];
  },
  getOrdersByUserId($user["id"])
);
foreach ($orders as $orderIndex => $order) {
  $orders[$orderIndex]["totalCost"] = array_sum(array_map(function ($prod) {
    return $prod["totalCost"];
  }, $order["products"]));
}

// header('Content-Type: application/json');
// echo json_encode($orders);
echo render("order/index", compact("menu", "orders"));
