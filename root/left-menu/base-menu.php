<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!-- InstanceBeginEditable name="doctitle" -->
		<title>left-menu</title>
		<!-- InstanceEndEditable -->
		<link href="../css/screen.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="../css/menu.css" rel="stylesheet" type="text/css" media="screen" />
		<!--left menu start-->
		<script language = JavaScript>
		function showmenu(id) {//左側選單顯示和「點選」功能選單的主框區塊的事件反映函數
			var list = document.getElementById("list"+id);//抓取功能選單的內容區塊物件變數
			var menu = document.getElementById("menu"+id);//抓取功能選單的主框區塊物件變數
			if (list.style.display=="none") {
				//目前內容為隱藏
				document.getElementById("list"+id).style.display="block";//將內容顯示出來
				menu.className = "title1";//改變主框區塊的類別 藉此套用對應的CSS改變顯示狀態
			}else {
				//目前內容為顯示
				document.getElementById("list"+id).style.display="none";//將內容隱藏起來
				menu.className = "title";//改變主框區塊的類別 藉此套用對應的CSS改變顯示狀態
			}
		}
		function ShowMenu() {
			showmenu(1);
		}
		function Callparent(page,data)
		{
			if(window.parent.document){ //判斷母視窗是否存在
				window.parent.ChangeMain(page,data);
			}
		}		
		</script>
		<!--left menu end-->
	</head>
	<body onload="ShowMenu();">
		<?php
		
		?>	
		<table border="0" cellspacing="0" cellpadding="0"><!--利用table width指定整體表個寬度-->
			<tr>
				<td>
					<div id="nav">		
						<div class="title" id="menu1" onclick="showmenu('1') ">基本資料功能選單</div>
							<div id="list1" class="content" style="display:none">
								 <ul>
									<li><a href="javascript:Callparent(11,'a=11');">職稱資料管理</a></li>
									<li><a href="javascript:Callparent(12,'a=12');">部門資料管理</a></li>
									<li><a href="javascript:Callparent(13,'a=13');">人員資料管理</a></li>
								 </ul>
							</div>	
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>		