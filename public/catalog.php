<?php

$catalog = GetProducts();
$productsCounter = count($catalog);

return compact("catalog", "productsCounter");
