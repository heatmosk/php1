<?php

require_once __DIR__ . "/../config/main.php";

function render(
  string $template,
  array $params = [],
  $useLayout = true
) {
  $content = renderTemplate($template, $params);
  if ($useLayout) {
    $header = $params["header"] ?? "";
    $footer = $params["footer"] ?? "";
    $menu = isset($params["menu"]) ? renderTemplate("menu/index", ["menu" => $params["menu"]]) : "";
    $content = renderTemplate('layout', compact("content", "menu", "header", "footer"));
  }
  return $content;
}

function renderTemplate(string $template, array $params = [])
{
  ob_start();
  extract($params);
  include VIEWS_DIR . "{$template}.php";
  return ob_get_clean();
}
