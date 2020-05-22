<?php


require_once __DIR__ . "/../config/main.php";
require_once ENGINE_DIR . "db.php";
require_once __DIR__ . "/base.php";

function getUserById($id)
{
  $userId = (int) $id;
  $query = "SELECT * FROM `user` WHERE `id` = {$userId}";
  return dbQueryOne($query);
}

function getUserByLogin($login)
{
  $userLogin = mysqli_escape_string(dbConnect(), $login);
  $query = "SELECT * FROM `user` WHERE `login` = '{$userLogin}'";
  return dbQueryOne($query);
}

function checkUserPassword($login, $password): bool
{
  return getHash($password) == getUserByLogin($login)["password"];
}

function createUser($login, $password, $name, $email)
{
  $userLogin = mysqli_escape_string(dbConnect(), trim($login));
  $userPassword = mysqli_escape_string(dbConnect(), trim($password));
  $userName = mysqli_escape_string(dbConnect(), trim($password));
  $userEmail = mysqli_escape_string(dbConnect(), trim($password));
  $query = "INSERT INTO `user`(`login`, `password`, `name`, `email`) 
    VALUES('{$userLogin}','{$userPassword}','{$userName}','{$userEmail}')";
  return dbExecute($query);
}

function getUserRoles($id)
{
  $userId = (int) $id;
  $query = "SELECT * FROM `user_role` WHERE `user_id` = {$userId}";
  return dbQueryAll($query);
}

function userIsEditor($id)
{
  $roles = array_map(
    function ($role) {
      return $role["role"];
    },
    getUserRoles($id)
  );
  return count(array_intersect($roles, EDITOR_ROLES)) > 0;
}
