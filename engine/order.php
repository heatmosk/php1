<?php

require_once __DIR__ . "/../config/main.php";

function getOrderById($orderId)
{
  $id = (int) $orderId;
  $query = "SELECT * FROM `order` WHERE `id` = {$id}";
  return dbQueryOne($query);
}

function createUserOrder($userId, $cartId)
{
  $uid = (int) $userId;
  $cid = (int) $cartId;
  $query = "INSERT INTO `order`(`user_id`) VALUES($uid)";
  dbExecute($query);

  $orderid = mysqli_insert_id(dbConnect());
  $query = "INSERT INTO `order_product`(`order_id`, `product_id`, `product_amount`) 
           SELECT {$orderid}, `product_id`, `product_amount` FROM `cart_product` WHERE `cart_id` = {$cid}";
  dbExecute($query);
  return  mysqli_insert_id(dbConnect());
}

function getOrdersByUserId($userId)
{
  $id = (int) $userId;
  $query = "SELECT * FROM `order` WHERE `user_id` = {$id} ORDER BY `id` DESC";
  return dbQueryAll($query);
}

function getOrderProducts($orderId)
{
  $id = (int) $orderId;
  $query = "SELECT * FROM `order_product` WHERE `order_id` = {$id} ORDER BY `id` DESC";
  return dbQueryAll($query);
}

function getOrderStatus($orderId)
{
  $id = (int) $orderId;
  $query = "SELECT * FROM `status` WHERE `id` = {$id}";
  return dbQueryOne($query);
}


function getAllOrderStatuses()
{
  $query = "SELECT * FROM `status` ORDER BY `id`";
  return dbQueryAll($query);
}

function setOrderStatus($orderId, $statusId)
{
  $id = (int) $orderId;
  $stId = (int) $statusId;
  $query = "UPDATE `order` set `status_id` = {$stId} WHERE `id` = {$id}";
  return dbExecute($query);
}

function deleteOrderProducts($orderId)
{
  $id = (int) $orderId;
  $query = "DELETE FROM `order_product` WHERE `order_id` = {$id}";
  return dbExecute($query);
}

function deleteOrder($orderId)
{
  $id = (int) $orderId;
  $query = "DELETE FROM `order` WHERE `id` = {$id}";
  return dbExecute($query);
}
