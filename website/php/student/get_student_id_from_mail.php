<?php
include '../connect.php';

$input_admin_id = $_GET['input_admin_id'];
$request = $data_base->query("SELECT lastname FROM admin WHERE admin_id = \"$input_admin_id\"");
$data = $request->fetch();
$var = $data['name'];

echo $var;
?>
