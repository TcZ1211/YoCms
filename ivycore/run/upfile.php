<?php
/*
*文件上传判断
*@size大小判断
*/
	class upfile{
		private $size;
		function __construct($size){
			$this->size=$size;
		}
		function img(){	
			if(!($_FILES["image"]["type"]=="image/jpg"||$_FILES["image"]["type"]=="image/Jpg"||$_FILES["image"]["type"]=="image/png"||$_FILES["image"]["type"]=="image/jpeg"||$_FILES["image"]["type"]=="image/JPEG"))clueon('图片类型不正确！');
			if($_FILES["image"]["size"]>$this->size)clueon('图片过大！');
			if($_FILES["file"]["error"]>0)clueon($_FILES["file"]["error"]);
			//获取图片扩展名
			$file_type=strtolower(pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION));
			//命名规则年月日时分秒
			$newname = date("YmdHis").".".$file_type;
			$file_path = "/upload/images/";$up_file_path = APP_PATH.$file_path;
			$up = move_uploaded_file($_FILES["image"]["tmp_name"],$up_file_path.$newname);
			if($up) return $file_path.$newname;
		}
	}
?>