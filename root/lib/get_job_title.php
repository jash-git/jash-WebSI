<?php
	$keywords = isset($_POST['keywords']) ? mysql_real_escape_string($_POST['keywords']) : '';
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$offset = ($page-1)*$rows;
	$result = array();

	include 'conn.php';//執行資料庫連結
	
	$where = "jt.name LIKE '%$keywords%'";
	
	$SQL="SELECT jt.id AS id, jt.name AS name FROM job_title AS jt WHERE (".$where.") ORDER BY jt.id";
	//echo $SQL."<br>";
	
	$rs = mysql_query($SQL);//查詢資料表總筆數
	$result["total"] = mysql_num_rows($rs);//紀錄總筆數
	
	$SQL="SELECT jt.id AS id, jt.name AS name FROM job_title AS jt WHERE (".$where.") ORDER BY jt.id LIMIT $offset,$rows";
	//echo $SQL."<br>";
	
	$rs = mysql_query($SQL);//查詢該頁顯示資料
	
	$items = array();//宣告空陣列
	while($row = mysql_fetch_object($rs)){//取出每一列的值
		array_push($items, $row);//把每一列資料存成一筆陣列值
	}
	$result["rows"] = $items;//把該頁資料放入回傳變數中

	echo json_encode($result);//把輸出結果轉JSON

?>