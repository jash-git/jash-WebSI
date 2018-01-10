<?php

$name = htmlspecialchars($_REQUEST['name']);
$unit = htmlspecialchars($_REQUEST['unit']);

include 'conn.php';

$sql = "INSERT INTO department(name,unit) VALUES('$name','$unit')";
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