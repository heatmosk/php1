<?php

require_once "../config/main.php";
require_once ENGINE_DIR . "base.php";
require_once ENGINE_DIR . "user.php";
require_once ENGINE_DIR . "session.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $login = post("login");
  $pass  = post("password");
  if (checkUserPassword($login, $pass)) {
    $user = getUserByLogin($login);
    setSession("user_id", $user["id"]);
    $message = "Вход выполнен";
    redirect("/");
  } else {
    $message = "Неверное имя пользователя или пароль";
  }
}

?>

<div><?= $message ?></div>

<?php

include VIEWS_DIR . "login_form.php";

?>