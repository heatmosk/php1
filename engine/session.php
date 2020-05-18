<?php

require_once "db.php";

function initSession()
{
  $sessionId = session_id();
  if (empty($sessionId)) {
    session_start();
    $sessionId = session_id();
  }
  return $sessionId;
}

function session($name)
{
  initSession();
  return $_SESSION[$name];
}

function closeSession()
{
  $_SESSION = [];
  session_destroy();
}

function setSession($name, $value)
{
  initSession();
  $_SESSION[$name] = $value;
}
