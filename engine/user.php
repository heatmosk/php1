<?php

require_once __DIR__ . "/db.php";
require_once __DIR__ . "/base.php";

function getUserById($id)
{
  $userId = (int) $id;
  $query = "SELECT * FROM `users` WHERE `id` = {$userId}";
  return dbQueryOne($query);
}

function getUserByLogin($login)
{
  $userLogin = mysqli_escape_string(dbConnect(), $login);
  $query = "SELECT * FROM `users` WHERE `login` = '{$userLogin}'";
  return dbQueryOne($query);
}

function checkUserPassword($login, $password): bool
{
  return getHash($password) == getUserByLogin($login)["pass"];
}
