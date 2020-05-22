<?php

require_once __DIR__ . "/db.php";
require_once VENDOR_DIR . "funcImgResize.php";

function addImage($image, $preview): bool
{
  $originalfile = mysqli_escape_string(dbConnect(), $image);
  $previewfile = mysqli_escape_string(dbConnect(), $preview);
  $query = "INSERT INTO `image`(`originalfile`, `previewfile`) VALUES('{$originalfile}', '{$previewfile}')";
  dbExecute($query);
  return mysqli_insert_id(dbConnect());
}

function findImage($filename)
{
  $originalfile = mysqli_escape_string(dbConnect(), $filename);
  $query = "SELECT * FROM `image` WHERE `originalfile` = '{$originalfile}'";
  return dbQueryOne($query);
}

function addImageView($id)
{
  $imageId = (int) $id;
  $query = "UPDATE `image` SET `views` = `views` + 1 WHERE `id` = {$imageId}";
  return dbExecute($query);
}

function getAllImages()
{
  $query = "SELECT * FROM `image` ORDER BY `views` DESC, `id`";
  return dbQueryAll($query);
}

function getImage($id)
{
  $imageId = (int) $id;
  $query = "SELECT * FROM `image` WHERE `id` = {$imageId}";
  return dbQueryOne($query);
}

function deleteImage($id)
{
  $image = getImage($id);
  unlink(IMAGES_DIR . ".." . $image["originalfile"]);
  unlink(IMAGES_DIR . ".." . $image["previewfile"]);
  $query = "DELETE FROM `image` WHERE `id` = " . $image["id"];
  return dbExecute($query);
}
