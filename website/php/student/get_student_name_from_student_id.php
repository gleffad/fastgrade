<?php
include '../connect.php';

$input_student_id = $_GET['input_student_id'];
$request = $data_base->query("SELECT lastname FROM student WHERE student_id = \"$input_student_id\"");
$data = $request->fetch();
$var = $data['name'];

echo $var;
?>
