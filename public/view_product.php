<?php

if (!isset($_GET["id"])) {
  redirect("/catalog.php");
}

$productId = (int) get("id");
$product = getProductById($productId);
$reviews = getProductReviews($productId);
$product["image"] = getProductImage($product["image_id"]);
$reviewsCounter = count($reviews);
addProductView($productId);
$views = $product["views"] + 1;

return compact("product", "productId", "reviews", "reviewsCounter", "views");