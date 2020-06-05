<?php

require_once __DIR__ . "/../config/main.php";
require_once ENGINE_DIR . "db.php";

function addProduct($productName, $productDescription, $productCost)
{
  $name = htmlentities(strip_tags(trim($productName)));
  $name = mysqli_escape_string(dbConnect(), $name);
  $description = htmlentities(strip_tags(trim($productDescription)));
  $description = mysqli_escape_string(dbConnect(), $description);
  $cost = $productCost * 1.0;
  $query = "INSERT INTO `product`(`name`, `description`, `cost`) VALUES('{$name}', '{$description}', {$cost})";
  return dbExecute($query);
}

function getAllProducts()
{
  $query = "SELECT * FROM `product` ORDER BY `views` DESC, `id` DESC";
  return dbQueryAll($query);
}

function getProductById($id)
{
  $prodId = (int) $id;
  $query = "SELECT * FROM `product` WHERE `id` = {$prodId}";
  return dbQueryOne($query);
}

function addProductView($id)
{
  $prodId = (int) $id;
  $query = "UPDATE `product` SET `views` = `views` + 1 WHERE `id` = {$prodId}";
  return dbExecute($query);
}

function getProductImages($productId)
{
  $id = (int) $productId; 
  $query = "SELECT * FROM `image` WHERE `id` in (SELECT `image_id` FROM `product_image` WHERE `product_id` = {$id}) ORDER BY `views` DESC";
  return dbQueryAll($query);
}

function getProductReviews($id)
{
  $prodId = (int) $id;
  $query = "SELECT * FROM `product_review` WHERE `product_id` = {$prodId} ORDER BY `id` DESC";
  return dbQueryAll($query);
}


function addProductReview($id, $rating, $reviewText)
{
  $productId = (int) $id;
  $rate = (int) $rating;
  $review = htmlentities(strip_tags($reviewText));
  $review = mysqli_escape_string(dbConnect(), $review);
  $query = "INSERT INTO `product_review`(`product_id`, `rate`, `review`) VALUES('{$productId}', '{$rate}', '{$review}')";
  return dbExecute($query);
}

function addProductImage($productId, $imageId)
{
  $prodId = (int) $productId;
  $imgId  = (int) $imageId;
  $query = "INSERT INTO `product_image`(`product_id`, `image_id`) VALUES({$prodId}, {$imgId})";
  return dbExecute($query);
}


function deleteProductImage($productId, $imageId)
{
  $imgId = (int) $imageId;
  $prodId = (int) $productId;
  $query = "DELETE FROM `product_image` WHERE `product_id` = {$prodId} AND `image_id` = {$imgId}";
  return dbExecute($query);
}
