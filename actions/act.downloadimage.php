<?php

$imagesPath = "../assets/images";

$imageName = $_GET['name'];
$imagePath =  $imagesPath . "/" . $imageName;

header("Expires: 0");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$imageFileType = pathinfo($imagePath, PATHINFO_EXTENSION);
$imageBaseName = pathinfo($imagePath, PATHINFO_BASENAME);
$imageSize = filesize($imagePath);

header('Content-type: application/' . $imageFileType);
header('Content-length: ' . $imageSize);
header('Content-Disposition: attachment; filename="' . $imageBaseName . '"');

readfile($imagePath);

exit;

?>