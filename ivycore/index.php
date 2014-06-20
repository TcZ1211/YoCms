<?php
//载入Smarty
require(CORE_PATH."/smarty/Smarty.class.php");
$smarty = new Smarty;
$smarty->template_dir = APP_PATH.'/themes';//模版目录
$smarty->compile_dir = APP_PATH.'/theme';//编译目录
$smarty->config_dir = APP_PATH.'/configs';
$smarty->left_delimiter = "<["; //左定界符
$smarty->right_delimiter = "]>"; //右定界符
//$smarty->caching = true;//开启缓存
//$smarty->cache_dir = APP_PATH.'/theme/cache/';//缓存目录
$smarty->display('index.html');

?>