<?php
//广告处理
$ads = $mysql->select("yo_ad");
$_ads=array();
foreach ($ads as $var){
	if($var["m_id"]==1){
		$content_arr=explode("{|}",$var["content"]);
		//print_r($content_arr);
		for($_key=0; $_key<count($content_arr); $_key++){
			$_ads[$var["p_id"]][$_key]["pic"] = $content_arr[$_key];
			$_ads[$var["p_id"]][$_key]["_c"]  = $_key+1;
		}
	}else{
		$_ads[$var["p_id"]][0] = $var["content"];
	}
}
//print_r($_ads);
$smarty->assign('_ads',$_ads);
?>