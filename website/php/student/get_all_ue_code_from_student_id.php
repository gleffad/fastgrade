<?php
include '../connect.php';

$input_student_id = $_GET['input_student_id'];
$request = $data_base->query("SELECT ue_code FROM follow WHERE student_id = \"$input_student_id\"");
$data = $request->fetchAll();
$var = json_encode($data);

echo $var;
?> 
