<?php
include_once("adb.php");
class departments extends adb{
	function departments(){
	}
	
	function add_department($name, $head, $desc){
		$str_query="insert into department set 
						department_name='$name', department_head='$head', department_description='$desc'";
		return $this->query($str_query);
	}
	
    
	function get_department($id){
		$str_query="select * from department where department_id=$id";
		return ($this->query($str_query));
	}
	
	function search_department($name){
	$str_query="select * from department where department_name like '%$name%'";
        return ($this->query($str_query));
	}
	
	function update_department($id,$name,$head,$desc){
		$str_query="update department set department_name='$name', department_head='$head', department_description='$desc'  						where department_id=$id";
		return $this->query($str_query);
	}
	
	function get_all_department(){
		$str_query="select * from department"; 
		return $this->query($str_query);
	}
	
  function delete_department($id){
        $str_query="delete from department where department_id=$id";
		
  return $this->query($str_query);
  }
  
  function department_search($name){
  $str_query="select department_name from department where department_name=$name";
  return $this->query($str_query);
}



}
			
			
			
				
			

?>