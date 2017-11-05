<?php

$id = intval($_REQUEST['id']);
$name = htmlspecialchars($_REQUEST['name']);
$account = htmlspecialchars($_REQUEST['account']);
$password = htmlspecialchars($_REQUEST['password']);
$dep_id = htmlspecialchars($_REQUEST['dep_id']);
$jt_id = htmlspecialchars($_REQUEST['jt_id']);

include 'conn.php';

$sql = "UPDATE user set name='$name',account='$account',password='$password',dep_id='$dep_id',jt_id='$jt_id' where id=$id";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array(
		'id' => $id,
		'name' => $name
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>