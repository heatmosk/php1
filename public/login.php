<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $login = post("login");
  $pass  = post("password");
  if (checkUserPassword($login, $pass)) {
    $user = getUserByLogin($login);
    setSession("user_id", $user["id"]);
    $message = "ВСЁ ОК"; 
    // redirect("/");
  } else {
    $message = "Неверное имя пользователя или пароль";
  }
  return compact("message");
}

return [];
