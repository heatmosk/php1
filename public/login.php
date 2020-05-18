<?php

require_once "../config/main.php";
require_once ENGINE_DIR . "db.php";
require_once ENGINE_DIR . "base.php";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $login = post("login");
  $pass  = post("password");
  echo $login . " " . $pass . "<br>";
  exit(0);
  if (checkUserPassword($login, $pass)) {
    $user = getUserByLogin($login);
    setSession("user_id", $user["id"]);
    $message = "Вход выполнен";
  } else {
    $message = "Неверное имя пользователя или пароль";
  }
  echo $message;
  exit(0);
} else {
  echo ":1";
}


?>

<div><?= $message ?></div>

<?php

include VIEWS_DIR . "login_form.php";

?>