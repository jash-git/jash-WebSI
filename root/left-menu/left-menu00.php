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
		function showmenu(id) {
			var list = document.getElementById("list"+id);
			var menu = document.getElementById("menu"+id)
			if (list.style.display=="none") {
				document.getElementById("list"+id).style.display="block";
				menu.className = "title1";
			}else {
				document.getElementById("list"+id).style.display="none";
				menu.className = "title";
			}
		}
		function ShowMenu() {
			showmenu(1);
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
						<div class="title" id="menu1" onclick="showmenu('1') ">首頁功能選單</div>
							<div id="list1" class="content" style="display:none">
								 <ul>
									<li><a href="user_index.php">系統人員管理</a></li>
									<li><a href="manufacturer-goods_index.php">廠商與貨物管理</a></li>
									<li><a href="clientele_index.php">客戶管理</a></li>
									<li><a href="products_index.php">產品管理</a></li>
									<li><a href="buy_index.php">進/退貨管理</a></li>
									<li><a href="sales_index.php">出貨管理</a></li>
									<li><a href="accounts_index.php">每月結算</a></li>
								 </ul>
							</div>	
					</div>
				</td>
			</tr>
		</table>
	</body>
</html>		