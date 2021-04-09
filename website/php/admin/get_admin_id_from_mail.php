<?php
include '../connect.php';

$input_mail = $_GET['mail'];
$request = $data_base->query("SELECT admin_id FROM admin WHERE mail = \"$input_mail\"");
$data = $request->fetch();
$var = $data['admin_id'];

echo $var;
?>
