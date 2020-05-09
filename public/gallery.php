<?php

require_once __DIR__ . '/../config/main.php'; 
require_once ENGINE_DIR . 'render.php';
require_once ENGINE_DIR . 'fs.php';

$mainMenu = [
  'Home' => ['url' => '/'],
  'Gallery' => ['url' => '/gallery.php']
];
$mainMenuHTML = renderMenu($mainMenu);

$acceptedImages =  ['jpg', 'jpeg', 'png'];
$acceptedImagesFilter = "." . implode(", .", $acceptedImages);

if ($_SERVER['REQUEST_METHOD'] === "POST" && count($_FILES) > 0) {
  
  $uploadedFiles = uploadImages(__DIR__ . "/img/", $_FILES['images']); 
  createImagesPreviews($uploadedFiles, __DIR__ . "/img/preview/");
 
}

$galleryImages = getFilesFromDir("img", $acceptedImages); 

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" media="all" href="/css/style.css">
  <title><?= $title ?></title>
</head>

<body>
  <div><?= $mainMenuHTML ?></div>
  <div>
    <h2><?= $form_title ?></h2>
    <form action="" enctype="multipart/form-data" method="post">
      <input type="file" name='images[]' multiple accept="<?= $acceptedImagesFilter ?>">
      <input type="submit">
    </form>
  </div>
  <div>
    <?php foreach ($galleryImages as $image) : ?>
      <a href='<?= $image['full_name'] ?>' target='_blank'><div class='gallery__item'><img src='<?= $image['dir'] . "preview/" . $image['name'] ?>'></div></a>
    <?php endforeach; ?>
  </div>


</body>

</html>