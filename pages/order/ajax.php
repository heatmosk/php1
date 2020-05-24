<?php



if (!$user["editor"] ?? true) {
  header('HTTP/1.0 403 Forbidden');
  exit;
}


echo render("order/ajax", compact("menu"));