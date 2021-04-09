<?php
include '../connect.php';

$stmt = $data_base->prepare("INSERT INTO ue (ue_code, promotion) VALUES (:input_ue_code, :input_promotion)");
$stmt->bindParam(':input_ue_code', $_GET['input_ue_code']);
$stmt->bindParam(':input_promotion', $_GET['input_promotion']);
$stmt->execute();

echo 'UE added successfully.';
?> 
