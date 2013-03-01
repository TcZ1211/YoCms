// JavaScript Document
/**
*刷新验证码
*@return nothing refreshVerify
*@parameter string verify_img_name 验证码图片ID
*@parameter string verify_file_name 验证码文件
*/
function refreshVerify(verify_img_id,verify_img_file){
	var now=new Date();
	$('#'+verify_img_id).attr("src",verify_img_file+"&code="+now.getTime());;
}

/** 插入文件 */
function insertFile(insert_path,elname){
	$('#'+elname,window.parent.opener.document).val(insert_path);
	window.parent.close();
}

/**
*按键触发动作
*@return nothing submitKeyClick
*@parameter string but_name 按钮名称
*@parameter string key_code 键值
*/
function submitKeyClick(but_name,key_code){
	if(event.keyCode==key_code) $("#"+but_name).click();
}

/**
* 设置页面内容outside对象的高度
*/
function setMainHeight(){
	$("#outside").height($("body").height()-$("#navbar").height()-26);
}
/**
*提交表单
*@return nothing onSubmitForm
*@parameter string form_name 表单名称
*/
function onSubmitForm(form_name){
	$("#"+form_name).submit();
}

/**
*操作复选框按钮
*@return nothing checkAll
*@parameter string btn_name 操作按钮
*@parameter string input_name 复选框名称
*/
function checkAll(btn_obj,input_name){
	if(btn_obj.value=="全部选择"){
		btn_obj.value="取消选择";
		$("input[name='"+input_name+"']").attr("checked",true);
	}else{
		btn_obj.value="全部选择";
		$("input[name='"+input_name+"']").attr("checked",false);
	}
}

/**
*浏览上传文件
*@return nothing browseUploadFile
*@parameter string elname 表单元素名
*/
function browseUploadFile(elname,filetype){
	window.open('?c=upload&ac=browse&filetype='+filetype+'&elname='+elname,'','status=no,scrollbars=yes,top=120,left=200,width=800,height=500');
}
function loadUploadFile(elname,filetype){
	window.document.write('<iframe src="?c=upload&ac=upload&elname='+elname+'&filetype='+filetype+'" scrolling="no" frameborder="0" style="width:340px;" height="25"></iframe>')	
}

//信息添加设置
$(function(){
	$('#n-basic').click(function(){
		$('#c-basic').show();
		$('#c-setup').hide();
		$('#c-extan').hide();
		$("#n-basic").attr("class","curr");
		$("#n-setup").attr("class","");
		$("#n-extan").attr("class","");
	});
	$('#n-setup').click(function(){
		$('#c-basic').hide();
		$('#c-setup').show();
		$('#c-extan').hide();
		$("#n-basic").attr("class","");
		$("#n-setup").attr("class","curr");
		$("#n-extan").attr("class","");
	});
	$('#n-extan').click(function(){
		$('#c-basic').hide();
		$('#c-setup').hide();
		$('#c-extan').show();
		$("#n-basic").attr("class","");
		$("#n-setup").attr("class","");
		$("#n-extan").attr("class","curr");
	});
});

/**
*图片集合内容操作
*@return nothing addSinpic
*/
function addSinpic(){
	var v_count=parseInt($('#v_count').val());
	if(v_count==null || v_count<=1){
		$('#addpic_html').html('<div class="exhpic_tr"><div class="exhpic_td1"><input id="pic_1" name="pic_1" type="text" style="width:222px;" class="text"> <input name="button" type="button" class="button" style="width:98px;" id="button" value="浏览已上传图片" onClick="browseUploadFile(\'pic_1\',\'pic\')"><div style="margin-top:3px;"><iframe src="?c=upload&ac=upload&filetype=pic&elname=pic_1" scrolling="no" frameborder="0" width="350" height="26"></iframe></div></div><div class="exhpic_td2"><textarea id="pic_alt_1" name="pic_alt_1" style="width:237px;" rows="3" class="text"></textarea></div></div>')
		$('#v_count').val(2);
	}else{
		$('#addpic_html').html($('#addpic_html').html()+'<div class="exhpic_tr"><div class="exhpic_td1"><input id="pic_'+v_count+'" name="pic_'+v_count+'" type="text" style="width:222px;" class="text"> <input name="button" type="button" class="button" style="width:98px;" id="button" value="浏览已上传图片" onClick="browseUploadFile(\'pic_'+v_count+'\',\'pic\')"><div style="margin-top:3px;"><iframe src="?c=upload&ac=upload&filetype=pic&elname=pic_'+v_count+'" scrolling="no" frameborder="0" width="350" height="26"></iframe></div></div><div class="exhpic_td2"><textarea id="pic_alt_'+v_count+'" name="pic_alt_'+v_count+'" style="width:237px;" rows="3" class="text"></textarea></div></div>');
		$('#v_count').val(v_count+1);
	}
}

function addAdpic(){
	var v_count=parseInt($('#v_count').val());
	if(v_count==null || v_count<=1){
		$('#addpic_html').html('<div class="exhadpic_tr"><input id="pic_1" name="pic_1" type="text" style="width:222px;" class="text"> <input name="button" type="button" class="button" style="width:98px;" id="button" value="浏览已上传图片" onClick="browseUploadFile(\'pic_1\',\'pic\')"><div style="margin-top:3px;"><iframe src="?c=upload&ac=upload&filetype=pic&elname=pic_1" scrolling="no" frameborder="0" style="width:332px; height:26px;"></iframe></div><div style="margin-top:3px;"><input id="url_1" name="url_1" type="text" style="width:323px;" class="text" value="http://"></div><div style="margin-top:3px;"><textarea id="alt_1" name="alt_1" style="width:323px;" rows="3" class="text"></textarea></div></div>')
		$('#v_count').val(2);
	}else{
		$('#addpic_html').html($('#addpic_html').html()+'<div class="exhadpic_tr"><input id="pic_'+v_count+'" name="pic_'+v_count+'" type="text" style="width:222px;" class="text"> <input name="button" type="button" class="button" style="width:98px;" id="button" value="浏览已上传图片" onClick="browseUploadFile(\'pic_'+v_count+'\',\'pic\')"><div style="margin-top:3px;"><iframe src="?c=upload&ac=upload&filetype=pic&elname=pic_'+v_count+'" scrolling="no" frameborder="0" style="width:332px; height:26px;"></iframe></div><div style="margin-top:3px;"><input id="url_'+v_count+'" name="url_'+v_count+'" type="text" style="width:323px;" class="text" value="http://"></div><div style="margin-top:3px;"><textarea id="alt_'+v_count+'" name="alt_'+v_count+'" style="width:323px;" rows="3" class="text"></textarea></div></div>');
		$('#v_count').val(v_count+1);
	}
}

/**
*产品属性内容操作
*@return nothing addSinpic
*/
function addAttributes(){
	var a_count=parseInt($('#a_count').val());
	if(a_count==null || a_count<=1){
		$('#addattr_html').html('<div class="exhattr_tr"><div class="exhattr_td1"><input id="attrname_1" name="attrname_1" type="text" style="width:100px;" class="text"> ：</div><div class="exhattr_td2"><input id="attrval_1" name="attrval_1" type="text" style="width:200px;" class="text"></div></div>')
		$('#a_count').val(2);
	}else{
		$('#addattr_html').html($('#addattr_html').html()+'<div class="exhattr_tr"><div class="exhattr_td1"><input id="attrname_'+a_count+'" name="attrname_'+a_count+'" type="text" style="width:100px;" class="text"> ：</div><div class="exhattr_td2"><input id="attrval_'+a_count+'" name="attrval_'+a_count+'" type="text" style="width:200px;" class="text"></div></div>');
		$('#a_count').val(a_count+1);
	}
}