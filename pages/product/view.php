<?php

if (!isset($_GET["id"])) {
  redirect("/product");
}

$productId = (int) get("id");
$product = getProductById($productId);
$product["reviews"] = getProductReviews($product["id"]);
$product["images"] = getProductImages($product["id"]);

addProductView($productId);
$product["views"]++;

echo render("product/view", compact("menu", "user", "product"));
