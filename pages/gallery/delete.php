<?php

if (!$user["editor"] ?? true) {
  redirect("/");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["image_id"])) {
  $imageId = (int) post("image_id");
  deleteImage($imageId);
}

redirect("/");
