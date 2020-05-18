<?php

require_once "db.php";

function GetProducts()
{
  $query = "SELECT * FROM `products` ORDER BY `views` DESC, `id` DESC";
  return dbQueryAll($query);
}

function getProductById($id)
{
  $prodId = (int) $id;
  $query = "SELECT * FROM `products` WHERE `id` = {$prodId}";
  return dbQueryOne($query);
}

function addProductView($id)
{
  $prodId = (int) $id;
  $query = "UPDATE `products` SET `views` = `views` + 1 WHERE `id` = {$prodId}";
  return dbExecute($query);
}

function getProductImages($id)
{
  $prodId = (int) $id;
  $query = "SELECT * FROM `product_images` WHERE `product_id` = {$prodId}";
  return dbQueryAll($query);
}

function getProductReviews($id)
{
  $prodId = (int) $id;
  $query = "SELECT * FROM `product_reviews` WHERE `product_id` = {$prodId}";
  return dbQueryAll($query);
}


function addProductReview($id, $rating, $reviewText)
{
  $productId = (int) $id;
  $rate = (int) $rating;
  $review = htmlentities(strip_tags($reviewText));
  $review = mysqli_escape_string(dbConnect(), $reviewText);
  $query = "INSERT INTO `product_review`(`product_id`, `rating`, `review_text`) VALUES('{$productId}', '{$rate}', '{$review}')";
  return dbExecute($query);
}