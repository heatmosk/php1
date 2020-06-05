<?php

require_once __DIR__ . "/../config/main.php";
require_once ENGINE_DIR . "db.php";

function getMenuItems(): array
{
  $query = "SELECT * FROM `menu` WHERE `parent_id` IS NULL";
  return dbQueryAll($query);
}


