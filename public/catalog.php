<?php

$products = getProducts();
$productsCounter = count($catalog);

return compact("products", "productsCounter");
