<?php 

include "../connection.php";

$imageName = basename($_FILES['image']['name']);
$imageFileType = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
$imageNewName = basename(date("YmdHis") . rand() . '.' . $imageFileType); // Generate new name
$imageTmpName = $_FILES['image']['tmp_name'];
$imageSize = $_FILES['image']['size'];

$imagesPath = "../assets/images";
$destinationPath = $imagesPath . "/" . $imageNewName;

if (getimagesize($imageTmpName) === false) {
	echo "Failed to upload image.";
} else if ($imageSize > 500000) {
	echo "Image size too large.";
} else if (
	$imageFileType != "jpg" && 
	$imageFileType != "png" && 
	$imageFileType != "jpeg" && 
	$imageFileType != "gif"
) {
	echo "Image file type not allowed.";
} else {
	if(move_uploaded_file($imageTmpName, $destinationPath)) {
		$query = "INSERT INTO images (name) VALUES ('" . $imageNewName . "')";

		if (mysqli_query($connection, $query)) {
			echo "Success upload image and success to store it to database.";
		} else {
			echo "Success upload image but failed to store it to database.";
		}
	} else {
		echo "Failed to upload image.";
	}
}

?>

<a href="../index.php">Go Back</a>