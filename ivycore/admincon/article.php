<?php
/*
*文章模型处理文件
*/	
	$smarty->assign('p_id',$_GET["id"]);
	switch($_GET["op"]){
		case"list":
			$article_l = $mysql->select("yo_article","id,title,author,published","p_id=".$_GET["id"]."");
			$smarty->assign('articles',$article_l);
			$smarty->display('article.html');
			exit;
		break;
		case"add":
			$_editor->config['height'] =300;
			$_editor->config['width'] = 600;
			$_editor->config['toolbar']="MyContent";
			$editor_content = $_editor->editor("content");
			$smarty->assign('article_content',$editor_content);
			$smarty->assign('p_id',$_GET["p_id"]);
			
			$smarty->display('article.add.html');
			exit;
		break;
		case"save":
			if(!$_POST["title"]) clueon("请填写文章标题");
			$date = date('Y-m-d-G:i:s');
			$article_s = $mysql->insert("`yo_article`","`p_id`,`title`,`author`,`image`,`content`,`summary`,`published`","'".$_GET["p_id"]."','".$_POST["title"]."','".$_POST["author"]."','".$_POST["images"]."','".$_POST["content"]."','".$_POST["summary"]."','".$date."'");
			if($article_s) confirm('添加成功！继续添加？','?fun=article&op=add','?fun=article&op=list&id='.$_GET["p_id"].'');
		break;
		case"edit":
			$article_e = $mysql->select("yo_article","","id=".$_GET["art_id"]."");
			$_editor->config['height'] =300;
			$_editor->config['width'] = 600;
			$_editor->config['toolbar']="MyContent";
			$editor_content = $_editor->editor("content",$article_e[0][content]);
			$smarty->assign('article_content',$editor_content);
			$smarty->assign('articlee',$article_e);
			$smarty->assign('art_id',$_GET["art_id"]);
			$smarty->display('article.add.html');
			exit;
		break;
		case"editor":
			if(!$_POST["title"]) clueon("请填写文章标题");
			$upart = $mysql->update("yo_article","title='".$_POST["title"]."',author='".$_POST["author"]."',image='".$_POST["images"]."',content='".$_POST["content"]."',summary='".$_POST["summary"]."'","id='".$_GET["art_id"]."'");
			if($upart) clueon('修改成功');
		break;
		case"del":
			if(!$_GET["art_id"])clueon('请检查参数！');
			$deart = $mysql->delete("yo_article","id='".$_GET["art_id"]."'");
			if($deart) clueon("删除成功");
			exit;
		break;
	}
?>