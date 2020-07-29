$(function () {

	$('#box').tabs({
		width : 640,
		height : 480,
		//plain : true,
		//fit : true,
		//border : false,
		//tabWidth : 300,
		//tabHeight : 50,
		//scrollIncrement : 50,
		//scrollDuration : 1000,
		//tools : [{
		//	iconCls : 'icon-add',
		//	handler : function () {
		//		alert('add');
		//	},
		//},{}],
		//
		//tools : '#tt',
		//toolPosition : 'left',
		//tabPosition : 'left',
		//headerWidth : 300,
		//selected : 1,
		//showHeader : false,

		onSelect : function (title, index) {
			alert(title + '|' + index);
		},

//*		
		onUnselect : function (title, index) {
			alert(title + '|' + index);
		},
		
		onBeforeClose : function (title, index) {
			alert(title + '|' + index);
		},
		
		onClose : function (title, index) {
			alert(title + '|' + index);
		},

		onContextMenu : function (e,title, index) {
			alert(e.type + '|' + title + '|' + index);
		},
//*/		
		
		
		
	});
	
});
