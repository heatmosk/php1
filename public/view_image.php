<?php

$imgId = (int) $_GET["id"];
$imgInfo = getImage($imgId);  
$imageViews = $imgInfo['views'] + 1;
addImageView($imgId);

return compact("imgId", "imgInfo", "imageViews");

?>

 