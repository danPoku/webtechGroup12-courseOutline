<?php
include_once("adb.php");
class course extends adb{
	function course(){}

	function add_course($name, $desc, $hours, $sem, $yr){
		$str_query="insert into course set course_name='$name', course_description='$desc', credit_hours='$hours', semester='$sem', year='$yr'";
		return $this->query($str_query);
	}
    
    function get_all(){
        $str_query="select * from course";
        return $this->query($str_query);
    }
    
    function get_by_id($id){
        $str_query="select * from course where course_id=$id";
        return $this->query($str_query);
    }

	function search_course($name){
		//$sql = "EXPLAIN SELECT * FROM `administrator` WHERE username=\'$username\' and password=\'$password\'";
		 $str_query="select * from course where course_name like'%$name%'";
		return $this->query($str_query);
	}
    
    	function update_course($id, $name, $desc, $hours, $sem, $yr){
		$str_query="update course set course_name='$name', course_description='$desc', credit_hours='$hours', semester='$sem', year='$yr' where course_id='$id'";
		return $this->query($str_query);
	}
    
    function delete($id){
        $str_query="delete from course where course_id='$id'";
        return $this->query($str_query);
    }

}


?>