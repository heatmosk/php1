<?php

if (!$user["editor"] ?? true) {
  redirect("/");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["product"])) {
  $product = post("product");
  addProduct($product["name"], $product["description"], $product["cost"]);
  redirect("/product");
}

echo render("product/add", compact("menu", "user"));