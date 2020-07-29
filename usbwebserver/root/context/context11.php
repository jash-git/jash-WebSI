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
	<table id="dg" title="職稱列表" class="easyui-datagrid" style="width:1270px;height:975px"
			url="../lib/get_job_title.php"
			toolbar="#toolbar" pagination="true"
			rownumbers="true" fitColumns="true" singleSelect="true">
		<thead>
			<tr>
				<th field="name" width="15">職稱</th><!--利用field屬性達到map SQL欄位-->
			</tr>
		</thead>
	</table>
	<div id="toolbar">
		<br>
		<span style="font-size:18px">關鍵字:</span>
		<input id="keywords" style="font-size:18px;line-height:26px;border:1px solid #ccc">
		<a href="#" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearch()">搜尋</a>		
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newJobTitle()">職稱新增</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editJobTitle()">職稱編修</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyJobTitle()">職稱刪除</a>
		<br><br>
	</div>
	
	<div id="dlg" class="easyui-dialog" style="width:400px;height:200px;padding:10px 20px"
			closed="true" buttons="#dlg-buttons">
		<div class="ftitle">職稱資料</div>
		<form id="fm" method="post" novalidate>
			<div class="fitem">
				<label>職稱:</label>
				<input name="name" class="easyui-textbox" required="true">
			</div>		
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveJobTitle()" style="width:90px">儲存</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">取消</a>
	</div>
	<script type="text/javascript">
		var url;
		function newJobTitle(){
			$('#dlg').dialog('open').dialog('setTitle','職稱新增');
			$('#fm').form('clear');
			url = '../lib/save_JobTitle.php';
		}
		function editJobTitle(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','職稱修改');
				$('#fm').form('load',row);
				url = '../lib/update_JobTitle.php?id='+row.id;
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
		function destroyJobTitle(){
			var row = $('#dg').datagrid('getSelected');
			if (row){
				$.messager.confirm('刪除資料確認','你確定要刪除該筆職稱資料?',function(r){
					if (r){
						$.post('../lib/destroy_JobTitle.php',{id:row.id},function(result){
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