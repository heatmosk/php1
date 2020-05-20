<?php

/**
 * @param string $url
 */

function redirect(string $url): void
{
  header("Location: {$url}");
}

function get($name)
{
  return $_GET[$name];
}

function post($name)
{
  return $_POST[$name];
}
function request($name)
{
  return $_REQUEST[$name];
}

function getHash(string $str): string
{
  return md5($str);
}
