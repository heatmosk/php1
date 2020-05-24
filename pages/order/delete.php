<?php

if (!$user["editor"] ?? true) {
  redirect("/");
}

if (!isset($_POST["order_id"])) {
  redirect("/");
}

$orderId = post("order_id");
deleteOrderProducts($orderId);
deleteOrder($orderId);
redirect("/order");
