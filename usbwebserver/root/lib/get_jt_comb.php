<?php
	$value=$_GET['value'];
	include 'conn.php';//執行資料庫連結
	
	$rs = mysql_query("SELECT id,name FROM job_title");//查詢該頁顯示資料
	
	$result = array();//宣告空陣列
	/*
	while($row = mysql_fetch_object($rs)){//取出每一列的值
		array_push($result, $row);//把每一列資料存成一筆陣列值 ~ 不指定選擇項
	}
	*/
	for ($i=0; $i<mysql_numrows($rs); $i++)
	{
		$row=mysql_fetch_array($rs); //取得列陣列
		if($row["id"] == $value)
		{
			array_push($result,array("id" => $row["id"],"name" => $row["name"],"selected" => true));
		}
		else
		{
			array_push($result,array("id" => $row["id"],"name" => $row["name"]));
		}
	}

	echo json_encode($result);//把輸出結果轉JSON

?>