<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $login = post("login");
  $pass  = post("password");
  echo $login . ' ' . $pass . "<br>";
  if (checkUserPassword($login, $pass)) {
    $user = getUserByLogin($login);
    setSession("user_id", $user["id"]);
    redirect("/");
  } else {
    $message = "Неверное имя пользователя или пароль";
  }
  return compact("message");
}

return [];
