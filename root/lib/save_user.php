<?php

$job_number = htmlspecialchars($_REQUEST['job_number']);
$name = htmlspecialchars($_REQUEST['name']);
$sex = htmlspecialchars($_REQUEST['sex']);
$birthday = htmlspecialchars($_REQUEST['birthday']);
$account = htmlspecialchars($_REQUEST['account']);
$password = htmlspecialchars($_REQUEST['password']);
$dep_id = htmlspecialchars($_REQUEST['dep_id']);
$jt_id = htmlspecialchars($_REQUEST['jt_id']);

include 'conn.php';

$sql = "INSERT INTO user(job_number,name,sex,birthday,account,password,dep_id,jt_id) values('$job_number','$name','$sex','$birthday','$account','$password','$dep_id','$jt_id')";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array(
		'id' => mysql_insert_id(),
		'name' => $name
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>