<?php

require_once __DIR__ . "/../config/main.php";

function renderMenu($menu)
{
  $result = "";
  if (count($menu) > 0) {
    foreach ($menu as $menuText => $menuItem) {
      $result .= "<li class='menu__item'>";
      $result .= "<a href='" . $menuItem['url'] . "'>" . $menuText . "</a>";
      if (array_key_exists('submenu', $menuItem)) {
        $result .= renderMenu($menuItem['submenu']);
      }
      $result .= "</li>";
    }
    $result = "<ul class='menu'>" . $result . "</ul>";
  }
  return $result;
}

function render(string $page, array $params = [])
{
  $fileName = $page . ".php";

  ob_start();
  extract($params);

  if (file_exists($fileName)) {
    include $fileName;
  } else {
    die("Такой {$fileName} страницы не существует. 404");
  }

  return ob_get_clean();
}
