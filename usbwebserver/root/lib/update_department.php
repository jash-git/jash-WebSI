<?php

$id = intval($_REQUEST['id']);
$name = htmlspecialchars($_REQUEST['name']);
$unit = htmlspecialchars($_REQUEST['unit']);


include 'conn.php';

$sql = "UPDATE department SET name='$name',unit='$unit' WHERE id=$id";
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