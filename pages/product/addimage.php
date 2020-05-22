<?php

if (!$user["editor"] ?? true) {
  redirect("/");
}

$acceptedImages =  ['jpg', 'jpeg', 'png'];
$acceptedImagesFilter = "." . implode(", .", $acceptedImages);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["product_id"]) && count($_FILES) > 0) {
  $filesInfo = getFilesInfo($_FILES["images"]);
  $product_id = (int) post("product_id"); 
  foreach ($filesInfo as $fileInfo) {
    $resultFileName = basename($fileInfo['tmp_name']) . $fileInfo['ext'];
    if (uploadImage($fileInfo['tmp_name'], IMAGES_DIR . $resultFileName)) {
      img_resize(IMAGES_DIR . $resultFileName, IMAGES_PREVIEW_DIR . $resultFileName, 125, 94);
    }
    $filename = str_replace(PUBLIC_DIR, "/", IMAGES_DIR . $resultFileName);
    $previewfile = str_replace(PUBLIC_DIR, "/", IMAGES_PREVIEW_DIR . $resultFileName);
    addImage($filename, $previewfile);
    $image_id = findImage($filename)["id"];
    addProductImage($product_id, $image_id);
  }
  redirect("/product/edit?product_id={$product_id}");
}

if (!isset($_GET["product_id"])) {
  redirect("/");
}

$productId = get("product_id");

echo render("product/addimage", compact("menu", "productId", "acceptedImages", "acceptedImagesFilter"));
