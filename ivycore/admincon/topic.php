<?php
/*
*栏目处理文件
*/
switch($_GET["op"]){
	case"adedit":
		if($_GET["id"]){
			$uptopic = $mysql->select("yo_topic","","id=".$_GET["id"]."");
			if($uptopic) $smarty->assign('uptopic',$uptopic);
		}
		$topicn = $mysql->select("yo_topic","id,name,tpid");
		if($topicn) $smarty->assign('topicn',$topicn);
		$smarty->display('topic.add.html');exit;
		break;
	//添加栏目
	case"adt":
		if(!$_POST["name"])clueon('请填写栏目名称');
		$intopic = $mysql->insert("`yo_topic`","`name`,`atname`,`image`,`tpid`,`mods`,`num`,`link`,`shows`,`summary`","'".$_POST["name"]."','".$_POST["atname"]."','".$_POST["images"]."','".$_POST["tpid"]."','".$_POST["mod"]."','".$_POST["num"]."','".$_POST["link"]."','".$_POST["shows"]."','".$_POST["summary"]."'");
		confirm('添加成功！继续添加？','?fun=topic&op=add','?con=admin&mod=topic');
		break;
	//修改栏目
	case"upd":
		if(!$_POST["name"])clueon('请填写栏目名称');
		$uptopic = $mysql->update("yo_topic","name='".$_POST["name"]."',atname='".$_POST["atname"]."',image='".$_POST["images"]."',tpid='".$_POST["tpid"]."',mods='".$_POST["mod"]."',num='".$_POST["num"]."',link='".$_POST["link"]."',shows='".$_POST["show"]."',summary='".$_POST["summary"]."'","id='".$_POST["id"]."'");
		if($uptopic) clueon('修改成功！','?con=admin&mod=topic');
		break;
	//ajax修改
	case"ajax":
		switch($_GET["mod"]){
			case "1":
				if(!($_POST["name"])) {echo "名称不得为空";exit;}
				$uptopic = $mysql->update("yo_topic","name='".$_POST["name"]."'","id='".$_POST["id"]."'");
				if($uptopic) echo "修改成功";
				else echo "修改失败，请检查";
			exit;
			break;
			case "2":
				$uptopic = $mysql->update("yo_topic","atname='".$_POST["name"]."'","id='".$_POST["id"]."'");
				if($uptopic) echo "修改成功";
				else echo "修改失败，请检查";
			exit;
			break;
		}
		exit;
		break;
	//删除栏目
	case"del":
		if(!$_GET["id"])clueon('请检查参数！');
		$detopic = $mysql->delete("yo_topic","id='".$_GET["id"]."'");
		if($detopic) clueon('');
		break;
}
?>