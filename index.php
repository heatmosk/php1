<?php

$title = 'Приветствие!';
$user = 'Alex';
$greeting = 'Привет';


$year = date("Y");

?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
</head>

<body>
  <?= $greeting . ', ' . $user ?>
  <footer>
  <?=$year?>
  </footer>
</body>

</html>