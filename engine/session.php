<?php

function session_get($name)
{
  return $_SESSION[$name];
}

function session_is_set($name): bool
{
  return isset($_SESSION[$name]);
}

function session_set($name, $value)
{
  $_SESSION[$name] = $value;
}
