<?php

require_once __DIR__ . '/../config/main.php';
require_once ENGINE_DIR . 'render.php';
require_once ENGINE_DIR . 'fs.php';

$title = 'Приветствие!';
$user = 'Alex';
$greeting = 'Привет';

$year = date("Y");

$mainMenu = [
  'Home' => ['url' => '/'],
  'Gallery' => ['url' => '/gallery.php']
];

$mainMenuHTML = renderMenu($mainMenu);

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" media="all" href="/css/style.css">
  <title><?= $title ?></title>
</head>

<body>
  <div><?= $mainMenuHTML ?></div>
  <div><?= $greeting . ', ' . $user ?></div>

  <div><?= $year ?></div>
</body>

</html>