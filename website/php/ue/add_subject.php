<?php
include '../connect.php';

$stmt = $data_base->prepare("INSERT INTO subject (ue_code, subject_number, statement) VALUES (:input_ue_code, :input_subject_number, :input_statement)");
$stmt->bindParam(':input_ue_code', $_GET['input_ue_code']);
$stmt->bindParam(':input_subject_number', $_GET['input_subject_number']);
$stmt->bindParam(':input_statement', $_GET['input_statement']);
$stmt->execute();

echo 'Subject added successfully.';
?> 
