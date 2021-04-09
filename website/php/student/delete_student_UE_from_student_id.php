<?php
include '../connect.php';

$stmt = $data_base->prepare("DELETE FROM follow WHERE student_id = :student_id");
$stmt->bindParam(':student_id', $_GET['student_id']);
$stmt->execute();

echo 'Student followed UEs have been removed succesfully.';
?> 
