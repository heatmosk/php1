<?php


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


function calculate($val1, $val2, $operation)
{
  if ($operation === '-') {
    return diff($val1, $val2);
  }
  if ($operation === '*') {
    return mult($val1, $val2);
  }
  if ($operation === '/') {
    return div($val1, $val2);
  }
  return sum($val1, $val2);
}
