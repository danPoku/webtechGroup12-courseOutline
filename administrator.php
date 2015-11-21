<?php
include_once("adb.php");
class administrator extends adb{

	function administrator(){}

	/**
	*@param string $email variable to store email
	*@param string $password variable to store password
	*@param string $permission variable to store assigned user privilege
	*@return boolean Indicates whether query run was successful or not
	*/
	function add_admin($email, $password, $permission){
		$str_query="insert into administrator set email='$email', password='$password', permission='$permission'";
		return $this->query($str_query);
	}

	/**
	*@param string $email stores user entered email
	*@param string $password stores user entered password
	*@return boolean Indicates whether query run returns true or false
	*/
	function search_admin($email, $password){
		 $str_query="select email, password from administrator where email='$email' AND password='$password'";
		return $this->query($str_query);
	}

}
// $sql = "EXPLAIN SELECT * FROM `administrator` WHERE username=\'$username\' and password=\'$password\'";
/*$obj=new administrator;
$obj->add_admin("group12", "0000", "group@example.com");*/

?>