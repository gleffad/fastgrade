<?php

function check_file_uploaded_length ($filename)
{
	return (bool) ((mb_strlen($filename,"UTF-8") > 225) ? true : false);
}

function check_file_extension($filename)
{
	$path = pathinfo($filename);
	$extension_valid = array('c', 'java');

	return (bool) (in_array($path['extension'], $extension_valid)? true : false);
}

function check_file_c($filename)
{
	$path = pathinfo($filename);
	$extension_valid = array('c');

	return (bool) (in_array($path['extension'], $extension_valid)? true : false);
}

function check_file_java($filename)
{
	$path = pathinfo($filename);
	$extension_valid = array('java');

	return (bool) (in_array($path['extension'], $extension_valid)? true : false);
}

function java_compile ($filename) {
	echo "<br>compilation JAVA<br>";
	$descriptorspec = array(
		0 => array("pipe", "r"),  // stdin
		1 => array("pipe", "w"),  // stdout
		2 => array("pipe", "w"),  // stderr
	);
	$process = proc_open("javac ../../student_uploads/$filename", $descriptorspec, $pipes, dirname(FILE), null);
	$stdout = stream_get_contents($pipes[1]);
	fclose($pipes[1]);
	$stderr = stream_get_contents($pipes[2]);
	fclose($pipes[2]);
	echo "<br>stdout : \n";
	var_dump($stdout);
	echo "<br>stderr :\n";
	var_dump($stderr);
}

function java_exec ($filename) {
	echo "<br><br>execution JAVA<br>";
	$descriptorspec = array(
		0 => array("pipe", "r"),  // stdin
		1 => array("pipe", "w"),  // stdout
		2 => array("pipe", "w"),  // stderr
	);
	$process = proc_open("java ../../student_uploads/$filename", $descriptorspec, $pipes, dirname(FILE), null);
	$stdout = stream_get_contents($pipes[1]);
	fclose($pipes[1]);
	$stderr = stream_get_contents($pipes[2]);
	fclose($pipes[2]);
	echo "<br>stdout : \n";
	var_dump($stdout);
	echo "<br>stderr :\n";
	var_dump($stderr);
	return $stdout;
}

function c_compile ($filename) {
	echo "<br>compilation C<br>";
	$descriptorspec = array(
		0 => array("pipe", "r"),  // stdin
		1 => array("pipe", "w"),  // stdout
		2 => array("pipe", "w"),  // stderr
	);
	$process = proc_open("gcc ../../student_uploads/$filename", $descriptorspec, $pipes, dirname(FILE), null);
	$stdout = stream_get_contents($pipes[1]);
	fclose($pipes[1]);
	$stderr = stream_get_contents($pipes[2]);
	fclose($pipes[2]);
	echo "<br>stdout : \n";
	var_dump($stdout);
	echo "<br>stderr :\n";
	var_dump($stderr);
}

function c_exec ($filename) {
	echo "<br>execution C<br>";
	$descriptorspec = array(
		0 => array("pipe", "r"),  // stdin
		1 => array("pipe", "w"),  // stdout
		2 => array("pipe", "w"),  // stderr
	);
	$process = proc_open("bash ../../student_uploads/a.out", $descriptorspec, $pipes, dirname(FILE), null);
	$stdout = stream_get_contents($pipes[1]);
	fclose($pipes[1]);
	$stderr = stream_get_contents($pipes[2]);
	fclose($pipes[2]);
	echo "<br>stdout : \n";
	var_dump($stdout);
	echo "<br>stderr :\n";
	var_dump($stderr);
	return $stdout;
}

$filename=$_FILES['uploadedfile']['name'];
if (check_file_uploaded_length ($filename))
	exit('Nom de fichier trop long');
if(!check_file_extension($filename))
	exit('Extension du fichier incorrecte');

$target_path = "../../student_uploads/";
$target_path = $target_path . basename($_FILES['uploadedfile']['name']);
if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
	echo "The file " . basename($_FILES['uploadedfile']['name']) . " has been uploaded<br>";
} else {
	echo "There was an error uploading the file, please try again";
}

if (check_file_c($filename)) {
	c_compile($filename);
	$student_result=c_exec($filename);
	if ($student_result == 'hello world !')
		echo "<br><br>Votre note est : 100";
	else
		echo "<br><br>Votre note est : 0";
} else if (check_file_java($filename)) {
	java_compile($filename);
	$student_result=java_exec($filename);
	if ($student_result == 'hello world !')
		echo "<br><br> Votre note est : 100";
	else
		echo "<br><br> Votre note est : 0";
} else {
	echo "<br> err : echec de la notation.";
}
?>