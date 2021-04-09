<?php
include '../connect.php';

$input_ue_code = $_GET['input_ue_code'];
$request = $data_base->query("SELECT student_id FROM follow WHERE ue_code = \"$input_ue_code\"");
$data = $request->fetchAll();
$var = json_encode($data);

echo $var;
?> 
