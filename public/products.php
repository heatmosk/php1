<?php

$products = getProducts();
$productsCounter = count($products);
foreach ($products as $productIndex => $product) {
  if (count(getProductImage($product["image_id"])) > 0) {
    $products[$productIndex]["image"] = getProductImage($product["image_id"])[0];
  } 
}

return compact("products", "productsCounter");
