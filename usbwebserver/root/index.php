<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<!-- InstanceBeginEditable name="doctitle" -->
		<title>jash's Web System</title>
		<!-- InstanceEndEditable -->
		<link href="css/screen.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="css/menu.css" rel="stylesheet" type="text/css" media="screen" />
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
		function ChangeMenu(v1){
			switch(v1)
			{
				case 1://base-menu
					if1.location="./left-menu/base-menu.php";
					break;
		
			}
		}
		function ChangeMain(page,v2){
			switch(page)
			{
				case 11:
					if2.location = "../context/context11.php";
					break;
				case 12:
					if2.location = "../context/context12.php";
					break;
				case 13:
					if2.location = "../context/context13.php";
					break;					
			}
		}		
		</script>
		<!--left menu end-->
	</head>
	<body>
		<?php
			//echo "php...";
		?>
		<div id="wrapper"><!--ALL start-->
			<div id="header">
			  <table width="230" border="0" cellpadding="0" cellspacing="0" id="icon_table">
				<tr>
					<td>
						<a href="index.php"><img src="images/base/icon_home.png" width="70" height="70" alt="回到首頁" title="回到首頁"/></a>
					</td>
					<td>
						<a href="./login.php?action=logout"><img src="images/base/icon_logout.png" width="70" height="70" alt="管理者登出" title="管理者登出"/></a>
					</td>
				</tr>
			  </table>
			</div><!--header end-->
			
			<div id="navigation">
				<table border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="225">
							<p>歡迎 OOXX 登錄中</p>
						</td>
						<td>
							<a href="javascript:ChangeMenu(1)">基本資料管理</a>
						</td>

					</tr>
				</table>
			</div><!--navigation-->
			
			<div id="content">
			
				<div id="left">
					<iframe id="if1" name="if1" ></iframe>
				</div><!--content_left end-->
				
				<div id="right" align = "center"><!-- 在CSS中有指定高度，所以有透個這個高度值確定身體的長度-->
					<iframe id="if2" name="if2" src="./context/context00.php" align="center"></iframe>
				</div><!--content_right end-->
				
			</div><!--content end-->
			
			<div id="footer"><!-- 在CSS中有指定高度-->
				<table border="0" cellpadding="0" cellspacing="0" id="footer_text">
					<tr>
						<td width="552">
							<p>│<a href="aboutus.html">關於 jash's Web System</a>│<a href="webindex.html">網站地圖</a>│<a href="privacy.html">隱私權保護</a>│客服專線：0800-888-999</p>
						</td>
						<td width="348">
							<h5>COPYRIGHT &copy; FOL. ALL RIGHTS RESERVED</h5>
						</td>
					</tr>
				</table>
			</div><!--footer end-->
			
		</div><!--ALL end-->		
	
	</body>
	
</html>
