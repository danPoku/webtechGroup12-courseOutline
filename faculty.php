<?php
/* author:Memory Mumbi
   This class extends the adb class that authenticates user, 
   connects them to database deals with errors in the database.
   This class defines the functions of the faculty entity. 
   */
include_once("adb.php");

class faculty extends adb{
	function faculty(){
	}
	// this is a function to insert a faculty tuple in the faculty table(in the database)
	
	function add_faculty($faculty_name, $faculty_id, $faculty_email, $faculty_phone){
		// sql query to add a faculty member
		$str_query="insert into faculty set faculty_name='$faculty_name', faculty_id='$faculty_id', 
		faculty_email='$faculty_email', faculty_phone='$faculty_phone'"; 
		
		return $this->query($str_query);
	}
	// This function gets all tuples of faculty information from the database
	function get_faculty($faculty_id){
		//The SQL to get faculty information 
		$str_query= "select* from faculty where faculty_id='$faculty_id'"; 
		return $this->query($str_query);
	}
	// update function allows the administrator to update faculty information
	function update_faculty($faculty_id,$faculty_name, $faculty_email, $faculty_phone){ 
		//sql to alter the faculty table by changinf the 
		$str_query="UPDATE faculty set faculty_name='$faculty_name', 
		faculty_email='$faculty_email', faculty_phone='$faculty_phone' Where faculty_id= '$faculty_id'"; 
		
		return $this->query($str_query);
	}
	// shows all the data in the database
	function view_faculty($faculty_name, $faculty_id, $faculty_email, $faculty_phone){

		$str_query="select* from faculty where faculty_name='$faculty_name', faculty_id='$faculty_id', 
		faculty_email='$faculty_email', faculty_phone='$faculty_phone'";

		return $this->query($str_query);
	}   
	// function to remove a tuple from the database
	function delete_faculty($faculty_id){
		$str_query="DELETE from faculty Where faculty_id= '$faculty_id'";
	}
	// a function to search for a tuple in the database
    function search_faculty($search_text){
    	$str_query= "select * from faculty where faculty_name like '%$search_text%'";
      
    	return $this->query($str_query);

  	}
} 




?>