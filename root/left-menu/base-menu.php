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