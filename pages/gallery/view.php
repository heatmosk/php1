<?php

$imgId = (int) get("id");
$image = getImage($imgId);
if (empty($image)) {
  redirect("/");
}
addImageView($image["id"]);
$image['views']++;

echo render("gallery/view", compact("menu", "image", "user"));
