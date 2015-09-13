<?php
include_once("adb.php");
class administrator extends adb{
	function administrator(){}

	function add_admin($username, $password, $email){
		$str_query="insert into administrator set username='$username', password='$password', email='$email'";
		return $this->query($str_query);
	}

	function search_admin($username, $password){
		//$sql = "EXPLAIN SELECT * FROM `administrator` WHERE username=\'$username\' and password=\'$password\'";
		 $str_query="select username, password from administrator where username='$username' AND password='$password'";
		return $this->query($str_query);
	}

}
// $sql = "EXPLAIN SELECT * FROM `administrator` WHERE username=\'$username\' and password=\'$password\'";
/*$obj=new administrator;
$obj->add_admin("group12", "0000", "group@example.com");*/

?>