<?php
  require_once "../config/main.php";
  require_once ENGINE_DIR . "session.php";
  closeSession();
  redirect("/");
