<html>
<head>
	<title>Add Course to course repository</title>
	<link rel="stylesheet" href="../css/style.css">
	<script>
		function validate(){
			alert("")
			var obj=document.geElementById("pn");
			var str=obj.value;
				if(str.length<=0){
					obj.style.backgroundColor="red";
					return false;
				}
				return false;

		}
			obj.style.background-color

	</script>
</head>
<body style = "background-color: silver">

	<div id="add_course">
		<form action="add_course.php" method="GET" onsubmit="return validate()">
			<h3>Add a New Course HERE!</h3>
			<div>
				Course Name:<input type="text" size="30" name="nm">
			</div>

			<div>
				Course Description:
					<div> 
						<textarea  cols = "30" rows = "5" name = "coursed"value=" " > </textarea>
					</div> 
			</div>

			<div>
				Cerdit Hours: <input type="text" size="20" name="ch" value=" ">
			</div>

			<div>
				Semester: 
					</br><input type="radio" name="sem" value="Spring">Spring<br>
					<input type="radio" name="sem" value="Fall">Fall<br>
					<input type="radio" name="sem" value="Summer">Summer<br>
			</div>

        	<div>
        		Major:
        			<label><input type="checkbox" name="maj">Business Administration</label>
        			<label><input type="checkbox" name="maj">Management Information Systems</label>
        			<label><input type="checkbox" name="maj">Computer Science</label>
        			<label><input type="checkbox" name="maj">Computer Engineering</label>
        			<label><input type="checkbox" name="maj">Electrical Engineering</label>
        			<label><input type="checkbox" name="maj">Mechanical Engineering</label>
        			<label><input type="checkbox" name="maj">All Majors</label>

        	</div>

        	<div>
				Department:
        			<label><input type="radio" name="cdept">Art and Science</label>
        			<label><input type="radio" name="cdept">Business Administration</label>
        			<label><input type="radio" name="cdept">Engineering</label>
        			<label><input type="radio" name="cdept">All Departments</label>
        	</div>

        	<div>
        		Year:
        			<label><input type="radio" name="yr" value="1">Freshman</label>
        			<label><input type="radio" name="yr" value="2">Sophomore</label>
        			<label><input type="radio" name="yr" value="3">Junior</label>
        			<label><input type="radio" name="yr" value="4">Senior</label>
        	</div>

					<input id="add_b" type="submit" value="SUBMIT">
		</form>
	</div>


	<?php
		if(isset($_REQUEST['nm'])){

			$course_nm=$_REQUEST['nm'];
			$course_descript=$_REQUEST['coursed'];
			$credit_hr=$_REQUEST['ch'];
			$semes=$_REQUEST['sem'];
			$course_year=$_REQUEST['yr'];
			$course_major=$_REQUEST['maj'];
			$course_depart=$_REQUEST['cdept'];
			$course_year=$_REQUEST['yr'];

			include("course_db.php");
			$obj=new course_db();

			if(!$obj->add_course($course_nm, $course_descript, $credit_hr, $semes, $course_year, 
				$course_major, $course_depart)){

				echo "Error adding";
				echo mysql_errno() . ": " . mysql_error() . "\n";

			}else{
				echo"Course was added successfully";
			}
		}
	?>

</body>

</html>
