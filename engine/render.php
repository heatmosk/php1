<?php

require_once "../config/main.php";

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

function render(string $template, array $params = [])
{
    ob_start();
    extract($params);
    include VIEWS_DIR . "{$template}.php";
    return ob_get_clean();
}