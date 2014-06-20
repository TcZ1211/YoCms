<?php 
header("Content-Type: text/html; charset=utf-8");
session_start();
error_reporting(E_ALL & ~ E_NOTICE);
//载入配置
$_config=include(APP_PATH.'/config.php');
//
define('__ADTP__',dirname(__ROOT__).'/admin/');
//连接数据库
require(CORE_PATH."/run/mysql.php");
$mysql = new MySql($_config["mysql"]["host"],$_config["mysql"]["user"],$_config["mysql"]["password"],$_config["mysql"]["database"]);
@ini_set('date.timezone','Asia/Shanghai');
//
//require(CORE_PATH."/cmsrun.php");
?>