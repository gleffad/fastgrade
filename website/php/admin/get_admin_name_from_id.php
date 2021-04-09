<?php
include '../connect.php';

$input_professor_id = $_GET['input_professor_id'];
$request = $data_base->query("SELECT lastname FROM professor WHERE professor_id = \"$input_professor_id\"");
$data = $request->fetch();
$var = $data['name'];

echo $var;
?>
