<?php

$title = 'Приветствие!';
$user = 'Alex';
$greeting = 'Привет';

$year = date("Y"); //7

$mainMenuStruct = [
  [ 'text' => 'Home', 'url'  => '/' ],
  [
    'text' => 'Catalog',
    'url'  => '/catalog',
    'submenu' => [
      [ 'text' => 'category 1', 'url' => '/catalog/cat1' ],
      [ 'text' => 'category 2', 'url' => '/catalog/cat2' ]
    ]
  ],
  [ 'text' => 'About', 'url' => '/about' ]
]; //20

function createMenu($menu) {
 $result = "";
 if (count($menu) > 0) {
   foreach ($menu as $mitem) {
     $result .= "<li>";
     $result .= "<a href='" . $mitem['url'] . "'>" . $mitem['text'] . "</a>";
     if (array_key_exists('submenu', $mitem)) {
       $result .= createMenu($mitem['submenu']);
     }
     $result .= "</li>";

   }
   $result = "<ul>" . $result . "</ul>";
 }
 return $result;
}

$mainMenu = createMenu($mainMenuStruct);
?>



<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
</head>

<body>
  <div><?= $mainMenu ?></div>
  <?= $greeting . ', ' . $user ?>
  <footer>
  <?=$year?>
  </footer>
</body>

</html>
