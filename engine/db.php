<?php

$databaseLink = NULL;

function get_db_link()
{
  global $databaseLink;
  if ($databaseLink === NULL || mysqli_ping($databaseLink) === false) { 
    $databaseLink = mysqli_connect("localhost", "php1user", "P@Svv0rd", "php1");
  }
  return $databaseLink;
}

function db_add_image($filename, $preview): bool
{
  $link = get_db_link();
  $insertFilename = mysqli_escape_string($link, $filename);
  $insertPreview = mysqli_escape_string($link, $preview);
  $query = "INSERT INTO images(`filename`, `previewfile`) values('{$insertFilename}', '{$insertPreview}')";
  return mysqli_query($link, $query);
}

function db_get_images()
{
  $link = get_db_link(); 
  $query = "select * from images order by `views` desc, `id`";
  return mysqli_fetch_all(mysqli_query($link, $query), MYSQLI_ASSOC);
}

function db_get_image($id)
{
  $link = get_db_link();
  $imgId = (int) $id;
  $query = "select * from images where `id` = {$imgId}";
  return mysqli_fetch_all(mysqli_query($link, $query), MYSQLI_ASSOC);
}

function db_add_image_view($id)
{
  $link = get_db_link();
  $imgId = (int) $id;
  $query = "update `images` set `views` = `views` + 1 where `id` = {$imgId}";
  return mysqli_query($link, $query);
}
