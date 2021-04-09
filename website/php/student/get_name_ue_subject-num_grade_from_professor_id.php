<?php
include '../connect.php';

$input_professor_id = $_GET['input_professor_id'];
$request = $data_base->query("SELECT (student.firstname, student.lastname, grading.ue_code, grading.grade) FROM (grading,student) WHERE grading.student_id=student.student_id AND \"$input_professor_id\"=grading.professor_id");
while($data = $request->fetch()) {
	$var = $var . $data['firstname']. " " . $data['lastname']. " " . $data['ue_code'] . " " . $data[grade] . "\n";
}

echo $var;
?>