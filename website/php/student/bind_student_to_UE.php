<?php
include '../connect.php';

$stmt = $data_base->prepare("INSERT INTO follow (student_id, ue_code) VALUES (:input_student_id, :input_ue_code)");
$stmt->bindParam(':input_student_id', $_GET['input_student_id']);
$stmt->bindParam(':input_ue_code', $_GET['input_ue_code']);
$stmt->execute();

echo 'Student binded to UE successfully.';
?> 
