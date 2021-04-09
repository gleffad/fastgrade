<?php

function check_file_uploaded_length ($filename)
{
	return (bool) ((mb_strlen($filename,"UTF-8") > 225) ? true : false);
}

function check_file_extension($filename)
{
	$path = pathinfo($filename);
	$extension_valid = array('pdf');

	return (bool) (in_array($path['extension'], $extension_valid)? true : false);
}

$filename=$_FILES['uploadedfile']['name'];
if (check_file_uploaded_length ($filename))
	exit('Nom de fichier trop long');
if(!check_file_extension($filename))
	exit('Extension du fichier incorrecte');

$target_path = "../professor_uploads/";
$target_path = $target_path . basename($_FILES['uploadedfile']['name']);
if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
	echo "The file " . basename($_FILES['uploadedfile']['name']) . " has been uploaded";
} else {
	echo "There was an error uploading the file, please try again";
}

?>