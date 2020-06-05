<?php

require_once __DIR__ . "/../config/main.php";
require_once ENGINE_DIR . "db.php";


function getCartById($id)
{
  $cartId = (int) $id;
  $query = "SELECT * FROM `cart` WHERE `id` = {$cartId}";
  return dbQueryOne($query);
}

function getCartByUserId($userId)
{
  $id = (int) $userId;
  $query = "SELECT * FROM `cart` WHERE `user_id` = {$id}";
  return dbQueryOne($query);
}

function setCartProductAmount($cartId, $productId, $productAmount)
{
  $id = (int) $cartId;
  $product = (int) $productId;
  $amount = (int) $productAmount;
  $query = "UPDATE `cart_product` SET `product_amount` = '{$amount}'  WHERE `cart_id` = {$id} AND `product_id` = {$product} ";
  return dbExecute($query);
}


function deleteCartProduct($cartId, $productId)
{
  $id = (int) $cartId;
  $product = (int) $productId;
  $query = "DELETE FROM `cart_product` WHERE `cart_id` = {$id} AND `product_id` = {$product}";
  return dbExecute($query);
}

function deleteAllCartProducts($cartId)
{
  $id = (int) $cartId;
  $query = "DELETE FROM `cart_product` WHERE `cart_id` = {$id}";
  return dbExecute($query);
}

function deleteCart($cartId)
{
  $id = (int) $cartId;
  $query = "DELETE FROM  `cart` WHERE `id` = {$id}";
  return dbExecute($query);
}

function getCartProducts($cartId)
{
  $id = (int) $cartId;
  $query = "SELECT * FROM `cart_product` WHERE `cart_id` = {$id}";
  return dbQueryAll($query);
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
  $id = (int) $userId;
  $query = "INSERT INTO `cart`(`user_id`) VALUES ('{$id}')";
  return dbExecute($query);
}

function createCartProduct($cartId, $productId, $productAmount)
{
  $cart = (int) $cartId;
  $product = (int) $productId;
  $amount = (int) $productAmount;
  $query = "INSERT INTO `cart_product`(`cart_id`, `product_id`, `product_amount`) 
            VALUES({$cart}, {$product}, {$amount})";
  return dbExecute($query);
}
