<?php
/*
*单一页面处理文件
*/
	switch($_GET["op"]){
		case"list":
			$single_c = $mysql->select("yo_single","summary,content","p_id=".$_GET["id"]."");
			//简介编辑框
			$editor->config['height'] =200;
			$editor->config['width'] = 800;
			$editor->config['toolbar']="Summary";
			$summary_content = $editor->editor("summary",$single_c[0][summary]);
			$smarty->assign('summary_content',$summary_content);
			//内容编辑框
			$_editor->config['height'] =300;
			$_editor->config['width'] = 800;
			$_editor->config['toolbar']="MyContent";
			$editor_content = $_editor->editor("content",$single_c[0][content]);
			$smarty->assign('single_content',$editor_content);
			$smarty->assign('p_id',$_GET["id"]);
			
			$smarty->display('single.add.html');
			exit;
		break;
		case"adedit":
			$single_c = $mysql->select("yo_single","id","p_id=".$_GET["p_id"]."");
			if($single_c) $single_e = $mysql->update("yo_single","summary='".$_POST["summary"]."',content='".$_POST["content"]."'","p_id='".$_GET["p_id"]."'");
			else $single_e = $mysql->insert("`yo_single`","`summary`,`content`,`p_id`","'".$_POST["summary"]."','".$_POST["content"]."','".$_GET["p_id"]."'");
			if($single_e) clueon("修改成功！");
		break;
	}
?>