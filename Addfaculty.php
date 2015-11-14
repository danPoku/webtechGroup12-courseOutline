
<html>

	<head>
		<title>AddFaculty</title>
		<link rel="stylesheet" href="css/style.css">
		<script>
			
		</script>
	</head>
	<body background="music2.jpg">
		<form method="GET" action="Addfaculty.php">
			Faculty Name  :<input type="text" name="fn" size="30">
			Faculty  ID   :<input type ="text" name="fid" size "30">
			Faculty Email :<input type ="text" name="fem" size "30">
			Faculty Phone :<input type ="text" name="fph" size "30">
			<input type="submit" value="Add">

		</form>
		<form method="GET" action="viewfaculty.php">
			<input type="submit" value="view all">

		</form>
		<?php
		/* a class to add a tuple of faculty information to the database*/
		
			if(isset($_REQUEST['fn'])){
				include("faculty.php");
				//create object of the faculty 
				$obj = new Faculty();
				$faculty_name=$_REQUEST['fn'];
				$faculty_id= $_REQUEST['fid'];
				$faculty_email=$_REQUEST['fem'];
				$faculty_phone=$_REQUEST['fph'];

				if(!$obj->add_faculty($faculty_name, $faculty_id, $faculty_email, $faculty_phone)){
					 echo "Error adding";
				}else{
                    echo " A faculty with ID number:$faculty_id, <br> email:$faculty_email,<br> phone number:$faculty_phone <br> by the name of 
					$faculty_name has been added" ;

				}
				
			}

		?>
	</body>
</html>	







