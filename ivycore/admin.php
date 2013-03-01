<?php
//载入Smarty
require(CORE_PATH."/smarty/Smarty.class.php");
$smarty = new Smarty;
$smarty->template_dir = APP_PATH.'/admin';//模版目录
$smarty->compile_dir = APP_PATH.'/admin/admintmp';//编译目录
$smarty->config_dir = APP_PATH.'/configs';
$smarty->left_delimiter = '<['; //左定界符
$smarty->right_delimiter = ']>'; //右定界符
?>