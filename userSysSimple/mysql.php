<?php

class MySql
{
	
	public function __construct($host,$user,$pwd,$db)
	{
		$conn=mysql_connect($host,$user,$pwd);
		mysql_select_db($db,$conn);
	}

	public function query($sql){
		return mysql_query($sql);
	}

	public function find($sql){
		$rs=$this->query($sql);
		$rows=array();
		if(!empty($rs)){
			while ($row = mysql_fetch_array($rs,MYSQL_ASSOC)) {
				$rows[]=$row;
			}
		}
		return $rows;
	}

	public function getCount($sql){
		$rows=$this->find($sql);
		return count($rows);
	}
}
?>