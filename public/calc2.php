<?php

require '../operations.php';

$value1 = 0;
$value2 = 0;
$result = 0;

$operation = '';
$lastoperation = '';
$resultoperation = '';

if (isset($_POST['value1'])) {
  $value1 = $_POST['value1'];
}

if (isset($_POST['value2'])) {
  $value2 = $_POST['value2'];
}

if (isset($_POST['lastoperation'])) {
  $lastoperation = $_POST['lastoperation'];
}
if (isset($_POST['resultoperation'])) {
  $resultoperation = $_POST['resultoperation'];
}

if (isset($_POST['digit'])) {
  $digit = $_POST['digit'];
  $digit = $digit === '.' ? $digit : $digit * 1;
  if ($resultoperation === '=') {
    $value1 = 0;
    $value2 = 0;
    $lastoperation = '';
    $resultoperation = '';
  }
  if ($lastoperation === '') {
    $value1 .= $digit;
  } else {
    $value2 .= $digit;
  }
} else if (isset($_POST['operation'])) {
  $operation = $_POST['operation'];
  $resultoperation = '';
  if ($operation !== '=') {
    $lastoperation = $operation;
    $value2 = 0;
  } else {
    $resultoperation = $operation;
  }
} 
 
if ($operation === '=') {
  $result = calculate($value1, $value2, $lastoperation);
  $value1 = $result;
  $value2 *= 1;
} else if ($lastoperation === '') {
  $result = $value1;
} else {
  $result = $value1 . ' ' . $lastoperation . ' ' . $value2;
}


?> 

<link rel="stylesheet" media="all" href="/css/calc.css">
<form method='post'>
  <input type='hidden' name='value1' value='<?= $value1 ?>' />
  <input type='hidden' name='value2' value='<?= $value2 ?>' />
  <input type='hidden' name='lastoperation' value='<?= $lastoperation ?>' />
  <input type='hidden' name='resultoperation' value='<?= $resultoperation ?>' />
  <table cellpadding='0' cellspacing='0'>
    <tr>
      <td colspan="4">
        <div class='result'><?= $result ?></div>
      </td>
    </tr>
    <tr>
      <td>
        <input class='button' type='submit'  name='digit' value='7'>
      </td>
      <td>
        <input class='button' type='submit'  name='digit' value='8'>
      </td>
      <td>
        <input class='button' type='submit'  name='digit' value='9'>
      </td>
      <td>
        <input class='button' type='submit'  name='operation' value='+'>
      </td>
    </tr>
    <tr>
      <td>
        <input class='button' type='submit'  name='digit' value='4'>
      </td>
      <td>
        <input class='button' type='submit'  name='digit' value='5'>
      </td>
      <td>
        <input class='button' type='submit'  name='digit' value='6'>
      </td>
      <td>
        <input class='button' type='submit'  name='operation' value='-'>
      </td>
    </tr>
    <tr>
      <td>
        <input class='button' type='submit'  name='digit' value='1'>
      </td>
      <td>
        <input class='button' type='submit'  name='digit' value='2'>
      </td>
      <td>
        <input class='button' type='submit'  name='digit' value='3'>
      </td>
      <td>
        <input class='button' type='submit'  name='operation' value='*'>
      </td>
    </tr>
    <tr>
      <td>
        <input class='button' type='submit'  name='digit' value='.'>
      </td>
      <td>
        <input class='button' type='submit'  name='digit' value='0'>
      </td>
      <td>
        <input class='button' type='submit'  name='operation' value='='>
      </td>
      <td>
        <input class='button' type='submit'  name='operation' value='/'>
      </td>
    </tr>
  </table>
</form>