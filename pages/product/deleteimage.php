<?php

if (!$user["editor"] ?? true) {
  redirect("/");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["image_id"]) && isset($_POST["product_id"])) {
  $productId = (int) post("product_id");
  $imageId = (int) post("image_id");
  deleteProductImage($productId, $imageId);
}

redirect("/");
