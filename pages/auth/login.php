<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $login = post("login");
  $pass  = post("password"); 
  if (checkUserPassword($login, $pass)) {
    $user = getUserByLogin($login);
    session_set("user_id", $user["id"]);
    redirect("/");
  } else {
    $message = "Неверное имя пользователя или пароль";
  }
}

if (isset($_SESSION["user_id"])) {
  redirect("/");
}

echo render('auth/login');
