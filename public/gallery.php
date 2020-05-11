<?php

require_once __DIR__ . '/../config/main.php';
require_once VENDOR_DIR . "funcImgResize.php";
require_once ENGINE_DIR . 'render.php';
require_once ENGINE_DIR . 'fs.php';
require_once ENGINE_DIR . 'base.php';
require_once ENGINE_DIR . 'db.php';

$mainMenu = [
  'Home' => ['url' => '/'],
  'Gallery' => ['url' => '/gallery.php']
];
$mainMenuHTML = renderMenu($mainMenu);

$acceptedImages =  ['jpg', 'jpeg', 'png'];
$acceptedImagesFilter = "." . implode(", .", $acceptedImages);

if ($_SERVER['REQUEST_METHOD'] === "POST" && count($_FILES) > 0) {
  $filesInfo = getFilesInfo($_FILES["images"]);
  foreach ($filesInfo as $fileInfo) {
    $resultFileName = basename($fileInfo['tmp_name']) . $fileInfo['ext'];
    if (uploadImage($fileInfo['tmp_name'], IMAGES_DIR . $resultFileName)) {
      img_resize(IMAGES_DIR . $resultFileName, IMAGES_PREVIEW_DIR . $resultFileName, 125, 94);
    }

    db_add_image(
      str_replace(PUBLIC_DIR, "/", IMAGES_DIR . $resultFileName),
      str_replace(PUBLIC_DIR, "/", IMAGES_PREVIEW_DIR . $resultFileName)
    );
    
  } 
  redirect("/gallery.php");
}

//$galleryImages = getFilesFromDir(IMAGES_DIR, $acceptedImages);
$galleryImages = db_get_images(); 

include VIEWS_DIR . "header.php";
?>

<div><?= $mainMenuHTML ?></div>


<?php
include VIEWS_DIR . "gallery.php";
include VIEWS_DIR . "upload_form.php";
include VIEWS_DIR . "footer.php";
?>