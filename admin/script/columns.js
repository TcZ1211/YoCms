// JavaScript Document
$(function(){
	$('#model_id').change(function(){
		switch(parseInt($(this).val())){
			case 2:
				$('#c-setup').html('<table width="100%" border="0" cellpadding="5" cellspacing="1"><tr><td align="right">链接目标：</td><td><input name="target" type="text" class="text" style="width:80px;" /><span class="warn">默认为本窗口，”_blank“为新窗口打开</span></td></tr><tr><td width="120" align="right">每页显示：</td><td><input name="pagesize" type="text" style="width:50px;" class="text" value="20" /> 条信息 <span class="warn">填 0 表示不分页</span></td></tr><tr><td align="right">页面模板：</td><td><input name="tpl_main" type="text" class="text" style="width:150px;" /></td></tr><tr><td align="right">列表页模板：</td><td><input name="tpl_list" type="text" class="text" style="width:150px;" /></td></tr><tr><td align="right">内容页模板：</td><td><input name="tpl_view" type="text" class="text" style="width:150px;" /></td></tr></table>');
				break;
			case 3:
			case 4:
			case 7:
			case 8:
				$('#c-setup').html('<table width="100%" border="0" cellpadding="5" cellspacing="1"><tr><td align="right">链接目标：</td><td><input name="target" type="text" class="text" style="width:80px;" /><span class="warn">默认为本窗口，”_blank“为新窗口打开</span></td></tr><tr><td align="right" width="120">每页显示：</td><td><input name="pagesize" type="text" style="width:50px;" class="text" value="9" /> 条信息<span class="warn">填 0 表示不分页</span></td></tr><tr><td align="right">缩略图尺寸：</td><td><input name="tub_width" type="text" value="160" class="text" style="width:32px;" /> × <input name="tub_height" type="text" style="width:32px;" class="text" value="120" /><span class="warn">栏目页面的缩略图尺寸</span></td></tr><tr><td align="right">页面模板：</td><td><input name="tpl_main" type="text" class="text" style="width:150px;" /></td></tr><tr><td align="right">列表页模板：</td><td><input name="tpl_list" type="text" class="text" style="width:150px;" /></td></tr><tr><td align="right">内容页模板：</td><td><input name="tpl_view" type="text" class="text" style="width:150px;" /></td></tr></table>');
				break;
			case 5:
				$('#c-setup').html('<table width="100%" border="0" cellpadding="5" cellspacing="1"><tr><td align="right">链接目标：</td><td><input name="target" type="text" class="text" style="width:80px;" /><span class="warn">默认为本窗口，”_blank“为新窗口打开</span></td></tr><tr><td width="120" align="right">每页显示：</td><td><input name="pagesize" type="text" style="width:50px;" class="text" value="10" /> 条信息 <span class="warn">填 0 表示不分页</span></td></tr><tr><td align="right">留言审核： </td><td><input name="is_passed" type="radio" class="checkbox" value="1" />是 <input name="is_passed" type="radio" class="checkbox" value="0" checked />否</td></tr><tr><td align="right">显示留言列表：</td><td><input name="is_list" type="radio" class="checkbox" value="1" checked />是 <input name="is_list" type="radio" class="checkbox" value="0" />否</td></tr><tr><td align="right">查看页面模板：</td><td><input name="tpl_main" type="text" class="text" style="width:150px;" /></td></tr><tr><td align="right">签写页面模板：</td><td><input name="tpl_write" type="text" class="text" style="width:150px;" /></td></tr></table>');
				break;
			case 6:
				$('#c-setup').html('<table width="100%" border="0" cellpadding="5" cellspacing="1"><tr><td align="right">链接目标：</td><td><input name="target" type="text" class="text" style="width:80px;" /><span class="warn">默认为本窗口，”_blank“为新窗口打开</span></td></tr><tr><td width="120" align="right">每页显示：</td><td><input name="pagesize" type="text" style="width:40px;" class="text" value="6" /> 条信息 <span class="warn">填 0 表示不分页</span></td></tr><tr><td align="right">信息页模板：</td><td><input name="tpl_main" type="text" class="text" style="width:150px;" /></td></tr><tr><td align="right">应聘页模板：</td><td><input name="tpl_app" type="text" class="text" style="width:150px;" /></td></tr></table>');
				break;
			case 99:
				$('#c-setup').html('<table width="100%" border="0" cellpadding="5" cellspacing="1"><tr><td align="right">链接目标：</td><td><input name="target" type="text" class="text" style="width:80px;" /><span class="warn">默认为本窗口，”_blank“为新窗口打开</span></td></tr><tr><td align="right" width="120">每页显示：</td><td><input name="pagesize" type="text" style="width:50px;" class="text" value="9" /> 条信息<span class="warn">填 0 表示不分页</span></td></tr><tr><td align="right">缩略图尺寸：</td><td><input name="tub_width" type="text" value="160" class="text" style="width:32px;" /> × <input name="tub_height" type="text" style="width:32px;" class="text" value="120" /><span class="warn">栏目页面的缩略图尺寸</span></td></tr><tr><td align="right">控制文件：</td><td><input name="control" type="text" class="text" style="width:150px;" /></td></tr><tr><td align="right">页面模板：</td><td><input name="tpl_main" type="text" class="text" style="width:150px;" /></td></tr><tr><td align="right">列表页模板：</td><td><input name="tpl_list" type="text" class="text" style="width:150px;" /></td></tr><tr><td align="right">内容页模板：</td><td><input name="tpl_view" type="text" class="text" style="width:150px;" /></td></tr></table>');
				break;
			default:
				$('#c-setup').html('<table width="100%" border="0" cellpadding="5" cellspacing="1"><tr><td align="right">链接目标：</td><td><input name="target" type="text" class="text" style="width:80px;" /><span class="warn">默认为本窗口，”_blank“为新窗口打开</span></td></tr><tr><td width="120" align="right">页面模板：</td><td><input name="tpl_main" type="text" class="text" style="width:150px;" /></td></tr></table>');
		}
	});
	
	$('#c-basic').show();
	$('#c-setup').hide();
	$('#c-extan').hide();
});