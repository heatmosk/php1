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

function dbExecute($query)
{
  return mysqli_query(dbConnect(), $query);
}

function dbQueryAll($query)
{
  return mysqli_fetch_all(mysqli_query(dbConnect(), $query), MYSQLI_ASSOC);
}

function dbQueryOne($query)
{
  return mysqli_fetch_all(mysqli_query(dbConnect(), $query), MYSQLI_ASSOC)[0];
}
