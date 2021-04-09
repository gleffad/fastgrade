<?php
include '../connect.php';

$input_professor_id = $_GET['input_professor_id'];
$request = $data_base->query("SELECT ue_code FROM teach WHERE professor_id = \"$input_professor_id\"");
$data = $request->fetchAll();
$var = json_encode($data);

echo $var;
?> 
