<?php
	$new_image_name = $_FILES["file"]["name"];
    move_uploaded_file($_FILES["file"]["tmp_name"], "/products/" . $new_image_name);
?>