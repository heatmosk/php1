<?php

if (!$user["editor"] ?? true) {
  redirect("/");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["review"])) {
  $review = post("review");
  addProductReview($review["product_id"], $review["rate"], $review["review"]); 
  redirect("/product/view?id=" . $review["product_id"]);
}

if (!isset($_GET["product_id"])) {
  redirect("/");
}

$productId = get("product_id");

echo render("product/addreview", compact("menu", "productId"));
