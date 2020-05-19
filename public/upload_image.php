<?php

$acceptedImages =  ['jpg', 'jpeg', 'png'];
$acceptedImagesFilter = "." . implode(", .", $acceptedImages);

if ($_SERVER['REQUEST_METHOD'] === "POST" && count($_FILES) > 0) {
  $filesInfo = getFilesInfo($_FILES["images"]);
  foreach ($filesInfo as $fileInfo) {
    $resultFileName = basename($fileInfo['tmp_name']) . $fileInfo['ext'];
    if (uploadImage($fileInfo['tmp_name'], IMAGES_DIR . $resultFileName)) {
      img_resize(IMAGES_DIR . $resultFileName, IMAGES_PREVIEW_DIR . $resultFileName, 125, 94);
    }

    addImage(
      str_replace(PUBLIC_DIR, "/", IMAGES_DIR . $resultFileName),
      str_replace(PUBLIC_DIR, "/", IMAGES_PREVIEW_DIR . $resultFileName)
    );
  }
  redirect("/?page=gallery");
}


return compact("acceptedImages", "acceptedImagesFilter");