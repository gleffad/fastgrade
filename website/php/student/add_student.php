<?php
include '../connect.php';

$stmt = $data_base->prepare("INSERT INTO student (student_id, firstname, lastname, mail, passwd, account_status) VALUES (:input_student_id, :input_first_name, :input_last_name, :input_mail, :input_passwd, :input_account_status)");

$stmt->bindParam(':input_student_id', $_GET['input_student_id']);
$stmt->bindParam(':input_first_name', $_GET['input_first_name']);
$stmt->bindParam(':input_last_name', $_GET['input_last_name']);
$stmt->bindParam(':input_mail', $_GET['input_mail']);
$stmt->bindParam(':input_passwd', $_GET['input_passwd']);
$stmt->bindParam(':input_account_status', $_GET['input_account_status']);
$stmt->execute();

echo 'Student added successfully.';
?> 
