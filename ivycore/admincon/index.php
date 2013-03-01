<?php
switch($_GET["con"]){
	case"tpl":
		if($_GET["t"]=="header") $smarty->display('index.header.html');
		if($_GET["t"]=="left") $smarty->display('index.left.html');
		if($_GET["t"]=="main") $smarty->display('index.main.html');
		exit;
		break;
	case"admin":
		if($_GET["ad"]=="alter") {$smarty->display('pass.html');exit;}
		if($_GET["ad"]=="quit"){
			unset($_SESSION['login']);unset($_SESSION['user']);
			clueon('');
		}
		if($_GET["mod"]=="main") {$smarty->display('index.main.html');exit;}
		if($_GET["mod"]=="topic") {
			$toplist = $mysql->select("yo_topic","","tpid=0","id");
			$topnav = $mysql->select("yo_topic","","tpid!=0","id");
			$smarty->assign('toplist',$toplist);
			$smarty->assign('topnav',$topnav);
			$smarty->display('topic.html');
			exit;
		}
		if($_GET["mod"]=="ad"){
			$adlist = $mysql->select("yo_ad","id,m_id,name,p_id");
			$smarty->assign('adlist',$adlist);
			$smarty->display('ad.html');
			exit;
		}
		break;
	case"pas":
		if(!$_POST["psd"] || !$_POST["npsd"] || !$_POST["cnpsd"])clueon('请完整输入！');
		if($_POST["npsd"]!=$_POST["cnpsd"])clueon('两次密码不相同！');
		$uname = $mysql->select("yc_admin","","ad_name='".$_SESSION["user"]."'");
		if(!$uname)clueon('用户无效！');
		$upsd = $mysql->select("yc_admin","","ad_psd='".md5($_POST["psd"])."'");
		if(!$upsd)clueon('请检查原始密码！');
		$npsd = $mysql->update("yc_admin","ad_psd='".md5($_POST["cnpsd"])."'","ad_name='".$_SESSION["user"]."'");
		if($npsd){
			unset($_SESSION['login']);unset($_SESSION['user']);
			clueon('修改成功，请重新登陆！');
		}
		break;
}
?>