<?php

require_once __DIR__ . '/../config/main.php';
require_once VENDOR_DIR . "funcImgResize.php";
require_once ENGINE_DIR . 'render.php';
require_once ENGINE_DIR . 'fs.php';
require_once ENGINE_DIR . 'base.php';
require_once ENGINE_DIR . 'db.php'; 

$acceptedImages =  ['jpg', 'jpeg', 'png'];
$acceptedImagesFilter = "." . implode(", .", $acceptedImages);

echo "TITLE!";
// if ($_SERVER['REQUEST_METHOD'] === "POST" && count($_FILES) > 0) {
//   $filesInfo = getFilesInfo($_FILES["images"]);
//   foreach ($filesInfo as $fileInfo) {
//     $resultFileName = basename($fileInfo['tmp_name']) . $fileInfo['ext'];
//     if (uploadImage($fileInfo['tmp_name'], IMAGES_DIR . $resultFileName)) {
//       img_resize(IMAGES_DIR . $resultFileName, IMAGES_PREVIEW_DIR . $resultFileName, 125, 94);
//     }

//     addImage(
//       str_replace(PUBLIC_DIR, "/", IMAGES_DIR . $resultFileName),
//       str_replace(PUBLIC_DIR, "/", IMAGES_PREVIEW_DIR . $resultFileName)
//     );
    
//   } 
//   redirect("/?page=gallery");
// }
 
$galleryImages = getImages(); 

var_dump($galleryImages);
// include VIEWS_DIR . "gallery.php";
// include VIEWS_DIR . "upload_form.php";
