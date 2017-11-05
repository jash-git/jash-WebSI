<?php

$name = htmlspecialchars($_REQUEST['name']);
$account = htmlspecialchars($_REQUEST['account']);
$password = htmlspecialchars($_REQUEST['password']);
$dep_id = htmlspecialchars($_REQUEST['dep_id']);
$jt_id = htmlspecialchars($_REQUEST['jt_id']);

include 'conn.php';

$sql = "INSERT INTO user(name,account,password,dep_id,jt_id) values('$name','$account','$password','$dep_id','$jt_id')";
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