<?php
include 'connect.php';
$connect = $data_base;
$columns = array('firstname', 'lastname');
$stmt =null;
$_POST['input_prof']="353456";
$query = "SELECT student.firstname, student.lastname FROM (grading,student) WHERE grading.student_id=student.student_id AND grading.professor_id=:input_prof";

$stmt=$data_base->prepare($query);
$stmt->bindParam(":input_prof",$_POST['input_prof'],PDO::PARAM_STR);


$query1 = '';

if($_POST["length"] != -1)
{
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = $stmt->rowCount($query);

$result = $stmt->execute();

$data = array();

while($row = $stmt->fetch(PDO::FETCH_OBJ))
{
    $a= array(
        "firstname" => $row->firstname,
        "lastname" => $row->lastname ,
    );

    $sub_array = array();
    $sub_array[] = '<div contenteditable class="update" data-id="" data-column="firstname">' . $a["firstname"] . '</div>';
    $sub_array[] = '<div contenteditable class="update" data-id="" data-column="lastname">' . $a["lastname"] . '</div>';
    $data[] = $sub_array;
}

function get_all_data($connect)
{
    $query = "SELECT student.firstname, student.lastname FROM (grading,student) WHERE grading.student_id=student.student_id AND grading.professor_id=:input_prof";
    $stmt=$connect->prepare($query);
    $stmt->bindParam(":input_prof",$_POST['input_prof'],PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->rowcount();
}

$output = array(
    "draw"    => intval($_POST["draw"]),
    "recordsTotal"  =>  get_all_data($connect),
    "recordsFiltered" => $number_filter_row,
    "data"    => $data
);

echo json_encode($output);

?>
