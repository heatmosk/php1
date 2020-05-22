<?php

if (!$user["editor"] ?? true) {
  redirect("/");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["product"])) {
  $product = post("product");
  addProductReview($review["product_id"], $review["rate"], $review["review"]);
  if (count($_FILES) > 0) {
  }
  redirect("/product/view?id=" . $review["product_id"]);
}


if (!isset($_GET["product_id"])) {
  redirect("/");
}

$formAction = "/product/add";

$productId = (int) get("product_id");

$product = getProductById($productId);
$product["images"] = getProductImages($product["id"]);

echo render("product/edit", compact("menu", "product"));
