<?php
require_once('mysql.php');

class User
{
	private $db;
	public function __construct($db)
	{
		$this->db=$db;
	}

	public function findAll(){
		$sql='select * from Persons';
		return $this->db->find($sql);
	}
	
	public function find($id){
		$sql="select * from Persons where id=$id";
		$result =$this->db->find($sql);
		return $result[0];
	}
	
	public function isExist($first_name,$last_name){
		$sql="select * from Persons where firstName='$first_name' and lastName='$last_name'";
		if($this->db->getCount($sql)>0){
			return true;
		}
		return false;
	}
	
	public function add($firstName,$lastName,$age){
		$sql="insert into Persons(firstName,lastName,age) values('".$firstName."','".$lastName."',$age)";
		$this->db->query($sql);
	}
	
	public function delete($id){
		$sql="delete from Persons where id=".$id;
		$this->db->query($sql);
	}
	
	public function update($id,$firstName,$lastName,$age){
		$sql="update Persons set firstName='$firstName',lastName='$lastName',age=$age where id=$id";
		$this->db->query($sql);
	}
}
?>