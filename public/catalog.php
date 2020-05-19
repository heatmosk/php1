<?php

$products = GetProducts();
$productsCounter = count($catalog);

return compact("catalog", "productsCounter");
