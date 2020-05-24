<?php
 

if (!isset($_SESSION["user_id"])) {
  redirect("/auth/login");
} 

echo render("auth/index", compact("menu", "user"));