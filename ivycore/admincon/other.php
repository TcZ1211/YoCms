<?php
/**
 *广告处理
*/
switch($_GET["op"]){
	//列表准备
	case"ad":
		$editor->config['height'] =200;
		$editor->config['width'] = 370;
		$editor->config['toolbar']="MyToolbar";
		$editor_content = $editor->editor("main");
		$smarty->assign('editor_content',$editor_content);
		$smarty->display('ad.add.html');
		exit;
		break;
	//修改准备
	case"adedit":
		if($_GET["id"]){
			$upad = $mysql->select("yo_ad","","id=".$_GET["id"]."");
			if($upad) $smarty->assign('upad',$upad);
			$smarty->assign('p_id',$upad[0]["p_id"]);
		}
		$editor->config['height'] =200;
		$editor->config['width'] = 370;
		$editor->config['toolbar']="MyToolbar";
		if($upad[0][m_id]==3) $editor_content = $editor->editor("main",$upad[0][content]);
		else $editor_content = $editor->editor("main");
		$smarty->assign('editor_content',$editor_content);
		$smarty->display('ad.add.html');
		exit;
		break;
	//修改
	case"edit":
		if(!$_POST["name"])clueon('请填写广告名称');if(!$_POST["p_id"])clueon('请填写调用标识');
		switch($_GET["mod"]){
			//图片列表
			case"1":
				$nums = $_POST["nums"];
				for($i=1;$i<=$nums;$i++){
					if($_POST["image_".$i]!==""){
						if($i!=$nums) $paths .= $_POST["image_".$i]."{|}";
						else $paths .= $_POST["image_".$i];
					}
				}
				$edit = $mysql->update("yo_ad","m_id='".$_POST["m_id"]."',name='".$_POST["name"]."',p_id='".$_POST["p_id"]."',content='".$paths."'","id='".$_POST["id"]."'");
				if($edit)confirm('修改成功！继续添加？','?fun=other&op=ad','?con=admin&mod=ad');
			break;
			//视频
			/*case"2":
				if($_POST["video"]){
					$intad = $mysql->insert("`yo_ad`","`m_id`,`name`,`p_id`,`content`","'".$_POST["m_id"]."','".$_POST["name"]."','".$_POST["p_id"]."','".$_POST["video"]."'");
					confirm('添加成功！继续添加？','?fun=other&op=ad','?con=admin&mod=ad');
				}else clueon("请填写视频地址！");
			break;*/
			//其他文字图片
			case"3":
				if($_POST["main"]){
					$edit = $mysql->update("yo_ad","m_id='".$_POST["m_id"]."',name='".$_POST["name"]."',p_id='".$_POST["p_id"]."',content='".$_POST["main"]."'","id='".$_POST["id"]."'");
					if($edit)confirm('修改成功！继续添加？','?fun=other&op=ad','?con=admin&mod=ad');
				}else clueon("请填写广告内容！");
			break;
		}
		
		break;
	//添加
	case"add":
		//判断名称与重复
		if(!$_POST["name"])clueon('请填写广告名称');if(!$_POST["p_id"])clueon('请填写调用标识');
		$pid = $mysql->select("`yo_ad`","`p_id`","p_id='".$_POST["p_id"]."'");
		if($pid)clueon("调用标识不可重复！");
		switch($_GET["mod"]){
			//图片列表
			case"1":
				$nums = $_POST["nums"];
				for($i=1;$i<=$nums;$i++){
					if($_POST["image_".$i]!==""){
						if($i!=$nums) $paths .= $_POST["image_".$i]."{|}";
						else $paths .= $_POST["image_".$i];
					}
				}
				$intad = $mysql->insert("`yo_ad`","`m_id`,`name`,`p_id`,`content`","'".$_POST["m_id"]."','".$_POST["name"]."','".$_POST["p_id"]."','".$paths."'");
				confirm('添加成功！继续添加？','?fun=other&op=ad','?con=admin&mod=ad');
			break;
			//视频
			/*case"2":
				if($_POST["video"]){
					$intad = $mysql->insert("`yo_ad`","`m_id`,`name`,`p_id`,`content`","'".$_POST["m_id"]."','".$_POST["name"]."','".$_POST["p_id"]."','".$_POST["video"]."'");
					confirm('添加成功！继续添加？','?fun=other&op=ad','?con=admin&mod=ad');
				}else clueon("请填写视频地址！");
			break;*/
			//其他文字图片
			case"3":
				if($_POST["main"]){
					$intad = $mysql->insert("`yo_ad`","`m_id`,`name`,`p_id`,`content`","'".$_POST["m_id"]."','".$_POST["name"]."','".$_POST["p_id"]."','".$_POST['main']."'");
					confirm('添加成功！继续添加？','?fun=other&op=ad','?con=admin&mod=ad');
				}else clueon("请填写广告内容！");
			break;
		}
		break;
	//上传图片
	case"img":
		if($_FILES["image"]["type"]){
			require(CORE_PATH."/run/upfile.php");
			$img = new upfile(500*1024);
			$img_path = $img->img();
		}else echo "请选择本地文件！";
		echo $img_path;
		exit;
		break;
	//删除
	case"del":
		if(!$_GET["id"])clueon('请检查参数！');
		$detopic = $mysql->delete("yo_ad","id='".$_GET["id"]."'");
		if($detopic) clueon('');
		break;
}
?>