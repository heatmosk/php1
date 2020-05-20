<?php

require_once __DIR__ . "/db.php";

function addImage($filename, $preview): bool
{
  $insertFilename = mysqli_escape_string(dbConnect(), $filename);
  $insertPreview = mysqli_escape_string(dbConnect(), $preview);
  $query = "INSERT INTO `images`(`filename`, `previewfile`) VALUES('{$insertFilename}', '{$insertPreview}')";
  return dbExecute($query);
}

function addImageView($id)
{
  $imageId = (int) $id;
  $query = "UPDATE `images` SET `views` = `views` + 1 WHERE `id` = {$imageId}";
  return dbExecute($query);
}

function getImages()
{
  $query = "SELECT * FROM `images` ORDER BY `views` DESC, `id`";
  return dbQueryAll($query);
}

function getImage($id)
{
  $imageId = (int) $id;
  $query = "SELECT * FROM `images` WHERE `id` = {$imageId}";
  return dbQueryOne($query);
}
