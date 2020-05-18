<?php

require_once "../config/main.php";
require_once ENGINE_DIR . "db.php";
require_once ENGINE_DIR . "base.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $login = post("login");
  $pass  = post("password");
  if (checkUserPassword($login, $pass)) {
    $user = getUserByLogin($login);
    setSession("user_id", $user["id"]);
  } else {
    $message = "Неверное имя пользователя или пароль";
  }
}


?>

<div><?= $message ?></div>


