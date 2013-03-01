<?php
//定义应用路径
define("APP_PATH",dirname(__FILE__));
//echo "http://".$_SERVER ['HTTP_HOST'].$_SERVER['PHP_SELF'];exit;
//定义核心文件路径
define("CORE_PATH",APP_PATH."/ivycore");
require(CORE_PATH."/cmscon.php");
//载入基本配置信息
require(CORE_PATH."/index.php");
//运行文件
require(CORE_PATH."/cmsrun.php");
?>