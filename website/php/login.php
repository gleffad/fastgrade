<?php
include("connect.php");
session_start();
$mail=$_POST['mail'];
$passwd=$_POST['passwd'];
$role=$_POST['role'];
$hash_password= hash('sha256', $passwd); //Password encryption
if ($_POST['role']="student")
	$stmt = $data_base->prepare("SELECT student_id FROM student where mail=:mail and passwd=:passwd ");
else if ($_POST['role']="admin")
	$stmt = $data_base->prepare("SELECT student_id FROM admin where mail=:mail and passwd=:passwd ");
else if ($_POST['role']="professor")
	$stmt = $data_base->prepare("SELECT student_id FROM professor where mail=:mail and passwd=:passwd ");
else
	exit("Role utilisateur incorrect");
$stmt->bindParam(":mail", $_POST['mail'],PDO::PARAM_STR) ;
$stmt->bindParam(":passwd", $_POST['passwd'],PDO::PARAM_STR) ;
try{
	$stmt->execute();
	$count=$stmt->rowCount();
	$data=$stmt->fetch(PDO::FETCH_OBJ);
	error_log($count);
	if($count)
	{
		$_SESSION['role']=$role; // Storing user session value
		$url=$role."/".$role.".php";
		echo $url;
		header("Location: $url");

	}
	else
	{

		exit("bad login");
	}
}
catch(PDOException $e) {
	echo '{"error":{"text":'. $e->getMessage() .'}}';
}

?>
