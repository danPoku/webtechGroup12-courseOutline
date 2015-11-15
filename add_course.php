<html>
<head>
	<title>Add Course to course repository</title>
	<link rel="stylesheet" href="../css/style.css">
	<script>
		function validate_courseForm(){
			var c_name = document.course_form.nm;
			var c_descript = document.course_form.coursed;
			var l_name = document.course_form.lnm;
			var fi_name = document.course_form.finm;
			var c_preq = document.course_form.preq;
			var c_code = document.course_form.ccd;
			var c_credithr = document.course_form.chr;
			var c_semes = document.course_form.sem;
			var c_dept = document.course_form.cdept;
			var c_year = document.course_form.yr;

			if (c_name.value == ""){
				window.alert("Please Enter the course name!");
				c_name.focus();
				return false;
			}

			if (c_descript.value == ""){
				window.alert("Please Enter the course Description!");
				c_descript.focus();
				return false;
			}

			if (l_name.value == ""){
				window.alert("Please Enter the Lecturer's Name!");
				l_name.focus();
				return false;
			}

			if (c_preq.value == ""){
				window.alert("Please Enter course Prerequisite!");
				c_preq.focus();
				return false;
			}

			if (c_code.value == ""){
				window.alert("Please Enter the course Code!");
				c_code.focus();
				return false;
			}

			if (c_credithr.value == ""){
				window.alert("Please Enter the course Credit Hour!");
				c_credithr.focus();
				return false;
			}

			if (c_semes.value == ""){
				window.alert("Please Enter the Semester of the Course!");
				c_semes.focus();
				return false;
			}

			if (c_dept.value == ""){
				window.alert("Please Enter the Department of the Course!");
				c_dept.focus();
				return false;
			}

			if (c_year.value == ""){
				window.alert("Please Enter the Year of the Course!");
				c_year.focus();
				return false;
			}

			return true;

		}

	</script>
</head>
<body style = "background-color: silver">

	<div id="add_course">
		<fieldset>
		<legend> ADD YOUR COURSE HERE :) :) :)</legend>
		<form action="add_course.php" method="GET" name="course_form" onsubmit="return validate_courseForm()">
			<h3>Add a New Course HERE!</h3>
			<div>
				Course Name:<br><input type="text" size="30" name="nm"></br>

			</div>

			<br></br>

			<div>
				Course Description:
					<div> 
						<textarea  cols = "30" rows = "5" name = "coursed"value=" " > </textarea>
					</div> 
			</div>

			<div>
				Lecturer Name:<br><input type="text" size="40" name="lnm"></br>
			</div>

			<div>
				Faculty Intern Name(s):<br><input type="text" size="50" name="finm"></br>
			</div>

			<div>
				Course Prerequisite(s):<br><input type="text" size="40" name="preq"></br>
			</div>

			<div>
				Course Code:<br><input type="text" size="30" name="ccd"></br>
			</div>

			<div>
				Cerdit Hours: <br><input type="text" size="20" name="chr" value=" "></br>
			</div>

			<div>
				Semester: 
					</br><input type="radio" name="sem" value="Spring">Spring<br>
					<input type="radio" name="sem" value="Fall">Fall<br>
					<input type="radio" name="sem" value="Summer">Summer<br>
			</div>
        	<!-- <div>
        		Major:
        			<label><input type="radio" name="maj">Business Administration</label>
        			<label><input type="radio" name="maj">Management Information Systems</label>
        			<label><input type="radio" name="maj">Computer Science</label>
        			<label><input type="radio" name="maj">Computer Engineering</label>
        			<label><input type="radio" name="maj">Electrical Engineering</label>
        			<label><input type="radio" name="maj">Mechanical Engineering</label>
        			<label><input type="radio" name="maj">All Majors</label>

        	</div> -->

        	<div>
				Department:
					<br>
        			<label><input type="radio" name="cdept" value="Art and Science">Art and Science</label>
        			<label><input type="radio" name="cdept" value="Business Administration">Business Administration</label>
        			<label><input type="radio" name="cdept" value="Engineering">Engineering</label>
        			</br>
        			<!--<label><input type="radio" name="cdept" value="All Depart">All Depart</label>-->
        	</div>

        	<div>
        		<bold>Year:</bold>
        			<br>
        			<label><input type="radio" name="yr" value="Freshman">Freshman</label>
        			<label><input type="radio" name="yr" value="Sophomore">Sophomore</label>
        			<label><input type="radio" name="yr" value="Junior">Junior</label>
        			<label><input type="radio" name="yr" value="Senior">Senior</label>
        			</br>
        	</div>
        			<br></br>
					<input id="add_b" type="submit" value="SUBMIT">
		</form>
		</fieldset>
	</div>


	<?php
		if(isset($_REQUEST['nm'])){

			$course_nm=$_REQUEST['nm'];
			$course_descript=$_REQUEST['coursed'];
			$lecturer_nm=$_REQUEST['lnm'];
			$fi_name=$_REQUEST['finm'];
			$course_preq=$_REQUEST['preq'];
			$course_ccd=$_REQUEST['ccd'];
			$credit_hr=$_REQUEST['chr'];
			$semes=$_REQUEST['sem'];
			$course_year=$_REQUEST['yr'];
			$course_depart=$_REQUEST['cdept'];
			$course_year=$_REQUEST['yr'];

			include("course_db.php");
			$obj=new course_db();

			if(!$obj->add_course($course_nm, $course_descript, $lecturer_nm, $fi_name, $course_preq, 
				$course_ccd, $credit_hr, $semes, $course_year, $course_depart)){

				echo "Error adding";
				echo mysql_errno() . ": " . mysql_error() . "\n";

			}else{
				echo"Course was added successfully";
			}
		}
	?>

</body>

</html>
