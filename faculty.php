<?php
include_once("adb.php");
class faculty extends adb{
	function faculty(){
	}
	
	function add_faculty($faculty_name, $faculty_email, $faculty_phone){
		//A code to add a faculty member
		$str_query="insert into faculty set faculty_name='$faculty_name', faculty_email='$faculty_email', faculty_phone='$faculty_phone'"; 
		
		return $this->query($str_query);
	}
	function get_all(){
		//The SQL to get one faculty
		$str_query= "select* from faculty"; 
		return $this->query($str_query);
	}
    function get_faculty($id){
		//The SQL to get one faculty
		$str_query= "select* from faculty where faculty_id='$id'"; 
		return $this->query($str_query);
	}
	function update_faculty($id,$faculty_name, $faculty_email, $faculty_phone){ 
		//A code to update the faculty
		$str_query="UPDATE faculty set faculty_name='$faculty_name', 
		faculty_email='$faculty_email', faculty_phone='$faculty_phone' Where faculty_id= '$id'"; 		
		return $this->query($str_query);
	}
//	function view_faculty($faculty_name, $faculty_id, $faculty_email, $faculty_phone){
//
//		$str_query="select* from faculty where faculty_name='$faculty_name', faculty_id='$faculty_id', 
//		faculty_email='$faculty_email', faculty_phone='$faculty_phone'";
//
//		return $this->query($str_query);
//	}   
	function delete_faculty($id){
		$str_query="DELETE from faculty Where faculty_id= '$id'";
        return $this->query($str_query);
	}
    function search_faculty($search_text){
    	$str_query= "select * from faculty where faculty_name like '%$search_text%'";
      
    	return $this->query($str_query);

  	}
} 




?>