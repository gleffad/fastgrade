<?php
include '../connect.php';

$input_mail = $_GET['mail'];
$request = $data_base->query("SELECT professor_id FROM professor WHERE mail = \"$input_mail\"");
$data = $request->fetch();
$var = $data['professor_id'];

echo $var;
?>
