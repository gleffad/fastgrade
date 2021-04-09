<?php
include '../connect.php';

$stmt = $data_base->prepare("INSERT INTO teach (professor_id, ue_code) VALUES (:input_professor_id, :input_ue_code)");
$stmt->bindParam(':input_professor_id', $_GET['input_professor_id']);
$stmt->bindParam(':input_ue_code', $_GET['input_ue_code']);
$stmt->execute();

echo 'Student binded to UE successfully.';
?> 
