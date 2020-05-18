<?php

require_once "db.php";
require_once "base.php";

function getUserByLogin($login)
{
  $userLogin = mysqli_escape_string(dbConnect(), $login);
  $query = "SELECT * FROM `users` WHERE `login` = {$userLogin}";
  echo $query . "<br>";
  return dbQueryOne($query);
}

function checkUserPassword($login, $password): bool
{
  echo "login: " . $login . "<br>";
  echo "password: " . $password . "<br>";
  echo "hash: " . getHash($password) . "<br>";
  return getHash($password) == getUserByLogin($login)["pass"];
}
