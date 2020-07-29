<?php

$id = intval($_REQUEST['id']);
$name = htmlspecialchars($_REQUEST['name']);


include 'conn.php';

$sql = "UPDATE job_title SET name='$name' WHERE id=$id";
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