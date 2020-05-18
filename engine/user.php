<?php

require_once "db.php";
require_once "base.php";

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

