<?php

$products = getProducts();
$productsCounter = count($catalog);
foreach ($products as $productIndex => $product) {
  if (count(getProductImages($product["id"])) > 0) {
    $products[$productIndex]["image"] = getProductImages($product["id"])[0];
  } 
}

return compact("products", "productsCounter");
