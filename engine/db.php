<?php

require_once "../config/main.php";


function dbConnect()
{
  static $link;
  if (!isset($link) || mysqli_ping($link) === false) {
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_BASE);
    mysqli_set_charset($link, "utf8");
  }
  return $link;
}

function dbAddImage($filename, $preview): bool
{
  $link = dbConnect();
  $insertFilename = mysqli_escape_string($link, $filename);
  $insertPreview = mysqli_escape_string($link, $preview);
  $query = "INSERT INTO `images`(`filename`, `previewfile`) VALUES('{$insertFilename}', '{$insertPreview}')";
  return mysqli_query($link, $query);
}

function dbAddImageView($id)
{
  $link = dbConnect();
  $imageId = (int) $id;
  $query = "UPDATE `images` SET `views` = `views` + 1 WHERE `id` = {$imageId}";
  return mysqli_query($link, $query);
}

function dbGetImages()
{
  $link = dbConnect();
  $query = "SELECT * FROM `images` ORDER BY `views` DESC, `id`";
  return mysqli_fetch_all(mysqli_query($link, $query), MYSQLI_ASSOC);
}

function dbGetImage($id)
{
  $link = dbConnect();
  $imageId = (int) $id;
  $query = "SELECT * FROM `images` WHERE `id` = {$imageId}";
  return mysqli_fetch_all(mysqli_query($link, $query), MYSQLI_ASSOC)[0];
}

function dbGetCatalog()
{
  $link = dbConnect();
  $query =
    "SELECT * FROM `products` ORDER BY `views` DESC, `id` DESC";
  return mysqli_fetch_all(mysqli_query($link, $query), MYSQLI_ASSOC);
}

function dbGetProduct($id)
{
  $link = dbConnect();
  $productId = (int) $id;
  $query =
    "SELECT * FROM `products` WHERE `id` = {$productId}";
  return mysqli_fetch_all(mysqli_query($link, $query), MYSQLI_ASSOC)[0];
}

function dbGetProductReviews($id)
{
  $link = dbConnect();
  $productId = (int) $id;
  $query = "SELECT * FROM `product_review` WHERE `product_id` = {$productId} ORDER BY `id` DESC";
  return mysqli_fetch_all(mysqli_query($link, $query), MYSQLI_ASSOC);
}


function dbAddProductReview($id, $rating, $reviewText)
{
  $link = dbConnect();
  $productId = (int) $id;
  $rat = (int) $rating;
  $review = mysqli_escape_string($link, $reviewText);
  $query = "INSERT INTO `product_review`(`product_id`, `rating`, `review_text`) VALUES('{$productId}', '{$rat}', '{$review}')";
  return mysqli_query($link, $query);
}

function dbAddProductView($id)
{
  $link = dbConnect();
  $productId = (int) $id;
  $query = "UPDATE `products` SET `views` = `views` + 1 WHERE `id` = {$productId}";
  return mysqli_query($link, $query);
}
