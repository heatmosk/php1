<?php

$products = getAllProducts();

if (isset($_SESSION["user_id"])) {
  $products = getAllProducts();
  foreach ($products as $productIndex => $product) {
    $images = getProductImages($product["id"]);
    if ($images) {
      $products[$productIndex]["images"] = $images;
    }
  }
  echo render("product/index", compact("menu", "products", "user"));
} else {
  redirect("/auth/login");
}
