<?php
//定义应用路径
define("APP_PATH",dirname(__FILE__));
//定义核心文件路径
define("CORE_PATH",APP_PATH."/ivycore");
require(CORE_PATH."/run/functions.php");
//载入基本配置信息
require(CORE_PATH."/admin.php");
require(CORE_PATH."/cmscon.php");
//运行文件
require(CORE_PATH."/cmsrun.php");
//登陆准备
$smarty->assign("ADTP",__ADTP__);
if($_SESSION["login"]=="go"){
	//载入编辑器
	include(CORE_PATH."/ckeditor/ckeditor.php");
	$editor = new CKEditor("/ivycore/ckeditor/");
	$editor->returnOutput = true;
	$_editor = new CKEditor("/ivycore/ckeditor/");
	$_editor->returnOutput = true;

	//获取当前Url
	$nowurl = "http://".$_SERVER ['HTTP_HOST'].$_SERVER['PHP_SELF'];
	$smarty->assign('nowurl',$nowurl);
	if($_GET["login"])clueon('请勿重复提交');
	require(CORE_PATH."/admincon/index.php");
	if($_GET["fun"])require(CORE_PATH."/admincon/".$_GET["fun"].".php");
	$smarty->display('index.html'); exit;
}
unset($_SESSION["login"]);
//获取登陆参数
if($_GET["login"]=="true"){
	if(!$_POST["codes"])clueon('请输入验证码');
	elseif(strtoupper($_SESSION["vcode"])!=strtoupper($_POST["codes"])){
		unset($_SESSION['vcode']);
		clueon('验证码错误','');
	}
	if(!$_POST["uname"] || !$_POST["upass"])clueon('请输入用户名或密码');
	$ret = $mysql->select("yc_admin","","ad_name='".$_POST["uname"]."' and ad_psd='".md5($_POST["upass"])."'");
	unset($_SESSION['vcode']);
	if($ret){
		$_SESSION["login"]="go";
		$_SESSION["user"]=$_POST["uname"];
		clueon('');
	}
	clueon('用户名或密码错误','');
}else if($_GET["login"]=="img"){
	include(CORE_PATH."/run/code.php");
	$code=new ValidationCode(80, 25, 4);
	$_SESSION["vcode"] = $code->getCheckCode();
}else $smarty->display('login.html');
?>