<?php
	$keywords = isset($_POST['keywords']) ? mysql_real_escape_string($_POST['keywords']) : '';
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$offset = ($page-1)*$rows;
	$result = array();

	include 'conn.php';//執行資料庫連結
	
	$where = "d.name LIKE '%$keywords%' OR d1.name LIKE '%$keywords%'";
	
	$SQL="SELECT d.id AS id, d.name AS name,d1.name AS top_name, d.unit AS unit FROM department AS d LEFT JOIN department AS d1 ON d.unit=d1.id WHERE (".$where.") ORDER BY d.id";
	//echo $SQL."<br>";
	
	$rs = mysql_query($SQL);//查詢資料表總筆數
	$result["total"] = mysql_num_rows($rs);//紀錄總筆數
	
	$SQL="SELECT d.id AS id, d.name AS name,d1.name AS top_name, d.unit AS unit FROM department AS d LEFT JOIN department AS d1 ON d.unit=d1.id WHERE (".$where.") ORDER BY d.id LIMIT $offset,$rows";
	//echo $SQL."<br>";
	
	$rs = mysql_query($SQL);//查詢該頁顯示資料
	
	$items = array();//宣告空陣列
	while($row = mysql_fetch_object($rs)){//取出每一列的值
		array_push($items, $row);//把每一列資料存成一筆陣列值
	}
	$result["rows"] = $items;//把該頁資料放入回傳變數中

	echo json_encode($result);//把輸出結果轉JSON

?>