<?php

$name = htmlspecialchars($_REQUEST['name']);


include 'conn.php';

$sql = "INSERT INTO job_title(name) VALUES('$name')";
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