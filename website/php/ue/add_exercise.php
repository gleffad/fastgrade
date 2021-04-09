<?php
include '../connect.php';

$stmt = $data_base->prepare("INSERT INTO exercise (ue_code, subject_number, exercise_number, language_name, statement, deadline_date, attributed_points) VALUES (:input_ue_code, :input_subject_number, :input_exercise_number, :input_language_name, :input_statement, :input_deadline_date, :input_attributed_points)");
$stmt->bindParam(':input_ue_code', $_GET['input_ue_code']);
$stmt->bindParam(':input_subject_number', $_GET['input_subject_number']);
$stmt->bindParam(':input_exercise_number', $_GET['input_exercise_number']);
$stmt->bindParam(':input_language_name', $_GET['input_language_name']);
$stmt->bindParam(':input_statement', $_GET['input_statement']);
$stmt->bindParam(':input_deadline_date', $_GET['input_deadline_date']);
$stmt->bindParam(':input_attributed_points', $_GET['input_attributed_points']);
$stmt->bindParam(':input_statement', $_GET['input_statement']);
$stmt->bindParam(':input_answer', $_GET['input_answer']);
$stmt->execute();

echo 'Exercise added successfully.';
?> 
