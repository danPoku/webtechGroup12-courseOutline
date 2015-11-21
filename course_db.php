<?php
include_once("adb.php");
	class course_db extends adb{

		//function course_db(){};
		function add_course($course_nm, $course_des, $lec_nm, $fi_nm, $c_preq, $c_cd, $credit_hrs, 
			$semes, $year, $dept){
			$str_query="INSERT INTO course SET
						course_name='$course_nm',
						course_descript='$course_des',
						lec_name='$lec_nm',
						fi_name='$fi_nm',
						course_prereq='$c_preq',
						course_code='$c_cd',
						credit_hr='$credit_hrs',
						semester='$semes',
						year='$year',
						course_dept='$dept'";

			return $this->query($str_query);

		}
		
		function delete_course($course_id){
			$str_query="DELETE FROM course WHERE
						course_id = '$course_id'";
			return $this->query($str_query);
		}

		function search_course($course_nm){
			$str_query="SELECT course_id, course_name, course_description, credit_hours, semester, year FROM course WHERE
				course_name like '%$course_nm%'";
				return $this->query($str_query);
			}
		
		function view_all_courses(){
			$str_query="SELECT * FROM course";
			return $this->query($str_query);
		}

		function update_course($cid, $course_nm, $course_descript, $credit_hr, $semes, $year){

			$str_query="UPDATE course SET 
						course_name='$course_nm',
						course_description='$course_descript',
						credit_hours='$credit_hr',
						semester='$semes',
						year='$year'  WHERE course_id ='$cid'";
						// echo $str_query;
						return $this->query($str_query);
		}


		
	} 

	//$myobj=new course_db();
	//	$myobj->update_course(12,"Project Management", "Effective and Efficient Management of Projects", 5, "Spring", 2016);

?>
