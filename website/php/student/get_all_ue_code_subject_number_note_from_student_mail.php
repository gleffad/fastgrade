<?php
include '../connect.php';

$input_mail = $_GET['input_mail'];
$request = $data_base->query("SELECT (grading.ue_code, grading.subject_number, grading.grade) FROM (grading, student) WHERE student.mail = \"$input_mail\" AND student.student_id = grading.student_id");
while($data = $request->fetch()) {
	$var = $var . $data['ue_code']. " " . $data['subject_number']. " " . $data['grade'] . "\n";
}

echo $var;
?>
