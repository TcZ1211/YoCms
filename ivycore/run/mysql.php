<?php
/**
 *数据库操作文件
 *@host数据库地址
 *@user数据库用户名
 *@psd数据库密码
 *@dn数据库名
*/
	class MySql{
		private $host; private $user; private $psd; private $dn;
		//连接数据库
		function __construct($host,$user,$psd,$dbname){
			$this->host=$host; $this->user=$user; $this->psd=$psd; $this->dn=$dbname;
			$con = mysql_connect($this->host,$this->user,$this->psd);
			if(!$con){ echo "请检查连接数据库".mysql_error(); exit; }
	    	$dbn = mysql_select_db($this->dn);
			if(!$dbn){ echo "请检查有无".$this->dn."数据库"; exit; }
			mysql_query("SET NAMES 'utf8'");
		}
		/*添加数据
		*$tb添加表名
		*$tn添加列名
		*$condition添加内容
		*/
		//insert into table1(field1,field2) values(value1,value2)
		function insert($tb,$tn="",$condition){
			//echo "insert into ".$tb."(".$tn.") values(".$condition.")";exit;
			$result = mysql_query("insert into ".$tb."(".$tn.") values(".$condition.")");
			if($result) return true;
			else echo mysql_error();exit;
		}
		/*查询数据
		*@tb.查询表名
		*@tn.查询列名
		*@condition.查询条件
		*@ord.排序条件
		*/
		//select * from table1 where 范围
		function select($tb,$tn="",$condition=NULL,$ord=NULL){
			if(!$tn) $tn="*";
			if($condition) $condition_sql = " where ".$condition;
			if($ord) $ord_sql = " order by ".$ord; 
			$result = mysql_query("select ".$tn." from ".$tb.$condition_sql.$ord_sql);
			$row = array();
			if($result){
				while($alt=mysql_fetch_array($result,MYSQL_ASSOC))$row[]=$alt;
				return $row;
			}else echo mysql_error();
		}
		/*修改数据
		*@tb.修改表名
		*@tn.修改内容
		*@condition.修改范围
		*/
		//update table1 set field1=value1 where
		function update($tb,$tn="",$condition){
			if($condition) $condition_sql = " where ".$condition;
			//echo "update ".$tb." set ".$tn.$condition_sql;exit;
			$result = mysql_query("update ".$tb." set ".$tn.$condition_sql);
			if($result){
				return true;
			}else echo mysql_error();
		}
		/*删除数据
		*@tb.删除表名
		*@condition.删除范围
		*/
		//delete from table1 where 范围
		function delete($tb,$condition){
			if($condition) $condition_sql = " where ".$condition;
			$result = mysql_query("delete from ".$tb.$condition_sql);
			if($result){
				return true;
			}else echo mysql_error();
		}
	}
?>