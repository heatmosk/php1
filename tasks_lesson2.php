<?php


$a = rand(0, 100) - 50;
$b = rand(0, 100) - 50;

echo '1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:' . "\n";
echo '   Если $a и $b положительные, вывести их разность;' . "\n";
echo '   Если $а и $b отрицательные, вывести их произведение;' . "\n";
echo '   Если $а и $b разных знаков, вывести их сумму;' . "\n";

if ($a >= 0 && $b >= 0) {
  echo $a . '-' . $b . '=' . ($a - $b) . "\n";
} else if ($a < 0 && $b < 0) {
  echo $a . '*' . $b . '=' . ($a * $b) . "\n";
} else {
  echo $a . '+' . $b . '=' . ($a + $b) . "\n";
}

/********************************************************************************************************/

echo '3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.' . "\n";

function sum($a, $b)
{
  return $a + $b;
}

function diff($a, $b)
{
  return $a - $b;
}

function div($a, $b)
{
  if ($b == 0) {
    return 'division by zero';
  }
  return $a / $b;
}

function mult($a, $b)
{
  return $a * $b;
}

echo '   Сумма: ' . sum($a, $b) . "\n";
echo '   Разность: ' . diff($a, $b) . "\n";
echo '   Умножение: ' . mult($a, $b) . "\n";
echo '   Деление: ' . div($a, $b) . "\n";
/********************************************************************************************************/

echo '4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).' . "\n";

function mathOperation($arg1, $arg2, $operation)
{
  switch ($operation) {
    case 'sum':
      return sum($arg1, $arg2);
    case 'diff':
      return diff($arg1, $arg2);
    case 'mult':
      return mult($arg1, $arg2);
    case 'div':
      return div($arg1, $arg2);
  }
  return 'unknown operation';
}

function mathOperation2($arg1, $arg2, $operation)
{
  if (function_exists($operation)) {
    return $operation($arg1, $arg2);
  }
  return 'unknown operation';
}


$operations = ['sum', 'diff', 'mult', 'div'];
$operation = $operations[rand(0, 3)];
echo "operation: {$operation}\n";
echo "a: {$a}\n";
echo "b: {$b}\n";
echo $operation . ': ' . mathOperation($a, $b, $operation) . "\n";
echo $operation . ': ' . mathOperation2($a, $b, $operation) . "\n";

/********************************************************************************************************/

echo '5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML-шаблон, вывести текущий год в подвале при помощи встроенных функций PHP.' . "\n";
echo 'Current year: ' . date("Y") . "\n";

/********************************************************************************************************/

echo '6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.' . "\n";

function power($val, $pow)
{
  if ($pow < 0) return 1 / power($val, -$pow);
  if ($pow == 0) return 1;
  return $val * power($val, $pow - 1);
}

echo '2^3: ' . power(2, 3) . "\n";
echo '2^-3: ' . power(2, -3) . "\n";
echo '0^10: ' . power(0, 10) . "\n";

/********************************************************************************************************/

echo '7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:' . "\n";
date_default_timezone_set('Europe/Moscow');
function getWordForm($val, $forms)
{
  $checkVal = $val > 19 ? $val % 10 : $val;
  if ($checkVal >= 6 || $checkVal == 0) {
    return $forms[2];
  }
  if ($checkVal == 1) return $forms[0];
  return $forms[1];
}

function getTimeHumanCase()
{

  $hForms = ['час', 'часа', 'часов'];
  $mForms = ['минута', 'минуты', 'минут'];
  $hours = date("H");
  $mins = date('i');
  return $hours . " " . getWordForm($hours, $hForms) . " " . $mins . " " . getWordForm($mins, $mForms);
}

echo 'Currently: ' . getTimeHumanCase() . "\n";
