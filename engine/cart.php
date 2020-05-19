<?php


require_once __DIR__ . "/db.php";
require_once __DIR__ . "/products.php";


function getCartById($id)
{
  $cartId = (int) $id;
  $query = "SELECT * FROM `cart` WHERE `id` = {$id}";
  return dbQueryOne($query);
}
function getCartByUserId($userId)
{
  $id = (int) $userId;
  $query = "SELECT * FROM `cart` WHERE `user_id` = {$id}";
  return dbQueryOne($query);
}

function addProductToCart($cartId, $productId)
{
  $cart = getCartById($cartId);
  $cartProducts = json_decode($cart["products"], true);
  $product = getProductById($productId);
  $cartProducts[$productId]["name"] = $product["name"];
  $cartProducts[$productId]["amount"] = ((int) $cartProducts[$productId]["amount"]) + 1;
  $cartProducts[$productId]["cost"] = $product["cost"];
  $cartProducts[$productId]["totalCost"] = $cartProducts[$productId]["amount"] * $product["cost"];
  $cartProductsJSON = json_encode($cartProducts);
  $query = "UPDATE `cart` SET `products` = '{$cartProductsJSON}'  WHERE `id` = {$cartId}";
  return dbExecute($query);
}
function getUserCart($userId)
{
  $cart = getCartByUserId($userId);
  if (!$cart) {
    createCart($userId);
    $cart = getCartByUserId($userId);
  }
  return $cart;
}

function createCart($userId)
{
  $uid = (int) $userId;
  $query = "INSERT INTO `cart`(`user_id`, `products`) VALUES ('{$uid}', '[]')";
  return dbExecute($query);
}
