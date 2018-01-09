<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>context13</title>
	
	<link rel="stylesheet" type="text/css" href="../easyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="../easyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="../easyui/themes/color.css">
	<link rel="stylesheet" type="text/css" href="../easyui/demo/demo.css">
	
	<script type="text/javascript" src="../easyui/jquery.min.js"></script>
	<script type="text/javascript" src="../easyui/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="../easyui/locale/easyui-lang-zh_CN.js" ></script>
</head>
<body>	
	<table id="dg" title="人員列表" class="easyui-datagrid" style="width:1270px;height:975px"
			url="../lib/get_user.php"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th field="job_number" width="13">工號</th>
				<th field="name" width="15">姓名</th><!--利用field屬性達到map SQL欄位-->
				<th field="sname" width="10">性別</th>
				<th field="birthday" width="17">生日</th>
				<th field="account" width="30">帳號</th>
				<th field="dname" width="20">部門名稱</th>
				<th field="jtname" width="20">職稱名稱</th>
			</tr>
		</thead>
	</table>
	<div id="toolbar">
		<br>
		<span style="font-size:18px">關鍵字:</span>
		<input id="keywords" style="font-size:18px;line-height:26px;border:1px solid #ccc">
		<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearch()">搜尋</a>		
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">人員新增</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">人員編修</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">人員刪除</a>
		<br><br>
	</div>
	
	<div id="dlg" class="easyui-dialog" style="width:400px;height:350px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle">人員資料</div>
		<form id="fm" method="post" novalidate>
			<div class="fitem">
				<label>姓名:</label>
				<input name="name" class="easyui-textbox" required="true">
			</div>
			<div class="fitem">
				<label>帳號:</label>
				<input name="account" class="easyui-textbox" required="true">
			</div>
			<div class="fitem">
				<label>密碼:</label>
				<input name="password" class="easyui-passwordbox" prompt="Password" iconWidth="28">
				<!--<input name="password" class="easyui-textbox" required="true">-->
				<!--<input name="email" class="easyui-textbox" validType="email">-->
			</div>
			<div class="fitem">
				<label>部門:</label>
				<!--<input name="deo_id" class="easyui-textbox">-->
				<input name="dep_id" style="width:165px" class="easyui-combobox" data-options=<?php echo '"valueField:\'id\',textField:\'name\',url:\'../lib/get_dep_comb.php?value='.'0'.'\'"';?>>
			</div>
			
			<div class="fitem">
				<label>職稱:</label>
				<input name="jt_id" style="width:165px" class="easyui-combobox" data-options=<?php echo '"valueField:\'id\',textField:\'name\',url:\'../lib/get_jt_comb.php?value='.'0'.'\'"';?>>
				
			</div>			
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">儲存</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">取消</a>
	</div>
	<script type="text/javascript">
		var url;
		function newUser(){
			$('#dlg').dialog('open').dialog('setTitle','人員新增');
			$('#fm').form('clear');
			url = '../lib/save_user.php';
		}
		function editUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','人員修改');
				$('#fm').form('load',row);
				url = '../lib/update_user.php?id='+row.id;
			}
		}
		function saveUser(){
			$('#fm').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.errorMsg){
						$.messager.show({
							title: 'Error',
							msg: result.errorMsg
						});
					} else {
						$('#dlg').dialog('close');		// close the dialog
						$('#dg').datagrid('reload');	// reload the user data
					}
				}
			});
		}
		function destroyUser(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('刪除資料確認','你確定要刪除該筆人員資料?',function(r){
					if (r){
						$.post('../lib/destroy_user.php',{id:row.id},function(result){
							if (result.success){
								$('#dg').datagrid('reload');	// reload the user data
							} else {
								$.messager.show({	// show error message
									title: 'Error',
									msg: result.errorMsg
								});
							}
						},'json');
					}
				});
			}
		}
		function doSearch(){
			$('#dg').datagrid('load',{
				keywords: $('#keywords').val()
			});
		}		
	</script>
	<style type="text/css">
		#fm{
			margin:0;
			padding:10px 30px;
		}
		.ftitle{
			font-size:20px;
			font-weight:bold;
			padding:5px 0;
			margin-bottom:10px;
			border-bottom:1px solid #ccc;
		}
		.fitem{
			margin-bottom:5px;
		}
		.fitem label{
			font-size:18px;
			display:inline-block;
			width:80px;
		}
		.fitem input{
			font-size:18px;
			width:160px;
		}
	</style>
</body>
</html>