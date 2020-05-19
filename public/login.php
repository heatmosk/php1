<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $login = post("login");
  $pass  = post("password");
  echo $login . ' ' . $pass . "<br>";
  if (checkUserPassword($login, $pass)) {
    echo "success<br>";
    // $user = getUserByLogin($login);
    // setSession("user_id", $user["id"]);
    // $message = "ВСЁ ОК"; 
    // redirect("/");
  } else {
    $message = "Неверное имя пользователя или пароль";
  }
  // return compact("message");
  return [];
}

return [];
