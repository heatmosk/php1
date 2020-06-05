<?php

$galleryImages = getAllImages();
$imagesCounter = count($galleryImages);
echo render("gallery/index", compact("menu", "galleryImages", "imagesCounter")); 