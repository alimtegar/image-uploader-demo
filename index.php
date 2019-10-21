<?php include "./connection.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Image Uploader Demo</title>

	<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
</head>
<body>
	<form action="./actions/act.uploadimage.php" method="post" enctype="multipart/form-data">
		<input type="file" name="image" id="image" required>
		<button type="submit">
			Submit
		</button>
	</form>

	<div>
		<p>
			<strong>Images (Click to Download)</strong> 
		</p>
		<?php 

		$imagesPath = "./assets/images";

		$query = "SELECT name FROM images ORDER BY id DESC";
		$result = mysqli_query($connection, $query);

		if (mysqli_num_rows($result) > 0) {
		    // output data of each row
		    while($image = mysqli_fetch_assoc($result)) { ?>

		    	<a href="./actions/act.downloadimage.php?name=<?= $image['name']; ?>">
		    		<img src="<?= $imagesPath . "/" . $image['name']; ?>" height="100">
		    	</a>

		    <?php }
		} else {
		    echo "No image available";
		}

		?>
	</div>
</body>
</html>