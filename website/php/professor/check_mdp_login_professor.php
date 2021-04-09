<?php
include '../connect.php';
$input_log = $_GET['loggin'];
$input_pass = $_GET['password'];
$result = $data_base->query("SELECT passwd FROM professor WHERE mail = \"$input_log\"");
$data = $result->fetch();
$pass = $data['passwd'];

if ($pass == $input_pass) {
	echo "OK";
} else {
	echo "KO";
}
?>
