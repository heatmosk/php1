<?php

require '../operations.php';

$value1 = 0;
$value2 = 0;
$operation = '';


if (isset($_GET['value1']) && isset($_GET['value2']) && isset($_GET['operation'])) {
  $value1 = $_GET['value1'] * 1;
  $value2 = $_GET['value2'] * 1;
  $operation = mb_strtolower($_GET['operation']);
  $result = calculate($value1, $value2, $operation);
}




?>

<link rel="stylesheet" media="all" href="/css/calc.css">
<form>
  <div><label>Число 1</label><input required type="text" name='value1' value='<?= $value1 ?>' /></div>
  <div><label>Число 2</label><input required type="text" name='value2' value='<?= $value2 ?>' /></div>
  <div><label>Результат</label><input required type="text" name='result' value='<?= $result ?>' /></div>
  <div>
    <select name='operation'>
      <option value='sum' <?= $operation === 'sum' ? 'selected' : '' ?>>Сложение</option>
      <option value='diff' <?= $operation === 'diff' ? 'selected' : '' ?>>Вычитание</option>
      <option value='mult' <?= $operation === 'mult' ? 'selected' : '' ?>>Умножение</option>
      <option value='div' <?= $operation === 'div' ? 'selected' : '' ?>>Деление</option>
    </select>
  </div>
  <div><input class='button' type='submit' value='Посчитать' /></div>
</form>