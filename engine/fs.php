<?php

function getFilesFromDir($path, $types = [])
{
  $files = [];
  $foundedFiles = scandir($path);
  $foundedTypes = gettype($types) == "array" ? $types : [$types];
  foreach ($foundedFiles as $file) {
    $fileInfo = pathinfo($file);
    if (
      !is_dir($file)
      && (mb_substr($file, 0, 1) !== '.')
      && in_array($fileInfo["extension"], $foundedTypes)
    ) {
      $files[] = [
        "dir" => $path . "/",
        "full_name" => $path . "/" . $file,
        "name" => $file
      ];
    }
  }
  return $files;
}

function getFilesInfo($files): array
{
  $filesInfo = [];
  $countFiles = count($files['name']);
  $fileInfoKeys = array_keys($files);

  for ($i = 0; $i < $countFiles; $i++) {
    $fileInfo = [];
    foreach ($fileInfoKeys as $fileInfoKey) {
      $fileInfo[$fileInfoKey] = $files[$fileInfoKey][$i];
    }
    $filesInfo[] = $fileInfo;
  }
  return $filesInfo;
}

function uploadImages($destDir, array $files = [])
{
  $filesInfo = getFilesInfo($files);
  $acceptedMimeTypes = [
    'image/gif', 'image/png', 'image/bmp', 'image/jpeg'
  ];
  foreach ($filesInfo as $file) {
    $pathParts = pathinfo($file['name']);
    $extension = $pathParts['extension'];
    $fileName  = basename($file['tmp_name']) . "." . $extension;
    $fileSize  = filesize($file['tmp_name']);
    $resultFile = $destDir . $fileName;
    if (
      $fileSize > 0
      && $fileSize <= 5242880
      && in_array(
        mime_content_type($file['tmp_name']),
        $acceptedMimeTypes
      )
      && move_uploaded_file($file['tmp_name'], $resultFile)
    ) {
      $result[] = $resultFile;
    } else {
      return false;
    }
  }
  return $result;
}

function createImagesPreviews($images, $destDir)
{
  if (count($images) > 0) {
    require_once "funcImgResize.php";
    foreach ($images as $image) {
      img_resize($image, $destDir . basename($image), 125, 94);
    }
  }
}
