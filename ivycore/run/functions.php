<?php
/**
*单项弹出提示信息
*@message,提示的信息内容
*@reurl,跳转地址
*/
function clueon($message='',$reurl=''){
	echo '<script language="javascript">';
	if($message!='') echo "alert('".$message."');";
	if(empty($reurl) || $reurl=='') echo "history.back();";
	else echo "window.location.href='".$reurl."'";
	echo "</script>";
	exit;
}
/**
*双项弹出提示信息
*@params string message,提示的信息内容
*@params string true_reurl,点击确定转向页面
*@params string false_reurl,点击取消转向页面
*/
function confirm($message,$true_reurl,$false_reurl){
	echo '<script language="javascript">
	if(confirm("'.$message.'")) location.href="'.$true_reurl.'";
	else location.href="'.$false_reurl.'";
	</script>';
	exit;
}

?>