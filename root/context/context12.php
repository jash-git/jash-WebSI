<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>context11</title>
	
	<link rel="stylesheet" type="text/css" href="../easyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="../easyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="../easyui/themes/color.css">
	<link rel="stylesheet" type="text/css" href="../easyui/demo/demo.css">
	
	<script type="text/javascript" src="../easyui/jquery.min.js"></script>
	<script type="text/javascript" src="../easyui/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="../easyui/locale/easyui-lang-zh_CN.js" ></script>
</head>
<body>	
	<table id="dg" title="部門列表" class="easyui-datagrid" style="width:1270px;height:975px"
			url="../lib/get_department.php"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th field="name" width="15">部門</th><!--利用field屬性達到map SQL欄位-->
				<th field="top_name" width="15">上層部門</th>
			</tr>
		</thead>
	</table>
	<div id="toolbar">
		<br>
		<span style="font-size:18px">關鍵字:</span>
		<input id="keywords" style="font-size:18px;line-height:26px;border:1px solid #ccc">
		<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearch()">搜尋</a>		
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newDepartment()">部門新增</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editDepartment()">部門編修</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyDepartment()">部門刪除</a>
		<br><br>
	</div>
	
	<div id="dlg" class="easyui-dialog" style="width:400px;height:250px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle">部門資料</div>
		<form id="fm" method="post" novalidate>
			<div class="fitem">
				<label>部門:</label>
				<input name="name" class="easyui-textbox" required="true">
			</div>
			<div class="fitem">
				<label>上層部門:</label>
				<!--<input name="deo_id" class="easyui-textbox">-->
				<input name="unit" style="width:165px" class="easyui-combobox" data-options=<?php echo '"valueField:\'id\',textField:\'name\',url:\'../lib/get_dep_comb.php?value='.'0'.'\'"';?>>
			</div>			
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveJobTitle()" style="width:90px">儲存</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">取消</a>
	</div>
	<script type="text/javascript">
		var url;
		function newDepartment(){
			$('#dlg').dialog('open').dialog('setTitle','部門新增');
			$('#fm').form('clear');
			url = '../lib/save_department.php';
		}
		function editDepartment(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','部門修改');
				$('#fm').form('load',row);
				url = '../lib/update_department.php?id='+row.id;
			}
		}
		function saveJobTitle(){
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
		function destroyDepartment(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('刪除資料確認','你確定要刪除該筆部門資料?',function(r){
					if (r){
						$.post('../lib/destroy_department.php',{id:row.id},function(result){
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
			width:100px;
		}
		.fitem input{
			font-size:18px;
			width:160px;
		}
	</style>
</body>
</html>