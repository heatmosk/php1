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
    $fileInfo['ext'] = "." . pathinfo($fileInfo['name'])['extension'];
    $filesInfo[] = $fileInfo;
  }
  return $filesInfo;
}

function uploadImage($sourceFile, $destFile): bool
{ 
  $acceptedMimeTypes = ['image/gif', 'image/png', 'image/bmp', 'image/jpeg'];
  $fileName  = basename($sourceFile);
  $fileSize  = filesize($sourceFile); 
  if (
    $fileSize > 0 && $fileSize <= 5242880
    && in_array(mime_content_type($sourceFile), $acceptedMimeTypes)
  ) {
    return move_uploaded_file($sourceFile, $destFile);
  } else {
    return false;
  }
}
 