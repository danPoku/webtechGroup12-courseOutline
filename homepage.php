<?php
session_start();
?>

<html lang="en">
<head>
  <title>Course Repository</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/home.css">
    	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <script type="text/javascript" src="jquery-2.1.3.js"></script> 
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<!--
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
-->
  
    <script type="text/javascript">
    $(document).ready(function(){
      $('[data-toggle="popover"]').popover();   
    });
  </script>
  
</head>
<body>

  <br>
  <div class="container"> 
    <div class="container-fluid">
      <div class="row">
        <!--    <div class="col-sm-1"><img src = "css/logo Ashesi.jpg" alt="Title Image" id="titleImage"></div>-->
        <div class="col-sm-7"><img src = "css/title-img.jpg" alt="Title Image" id="titleImage2"></div>
        <div class="col-sm-2">
          <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
              <span class="glyphicon glyphicon-user"></span>
              <!--      <img class="wm-user-image" src="css/profile.png" height="30" width="30">                    -->
              <span class="arrow"> Hi,  <?php echo $_SESSION["session"];?></span>
              <span class="caret"></span></button>
              <ul class="dropdown-menu">
                <li><a href="adminlogin2.php">Log out</a></li>
<!--
    <li><a href="#">CSS</a></li>
    <li><a href="#">JavaScript</a></li>
  -->
</ul>
</div>  
</div>
</div>
</div>


<div class="text-center"><h3 class="text-muted">Dashboard</h3></div>
<br>

<!--
  <table class="mainlog" width="600" border='0'>
     <tr>
        <td id="td"><img src = "css/courses.png" height="150" width="280"></td>
        <td id="td"><img src = "css/academic_dept.jpg" height="150" width="280"></td>
        <td id="td"><img src = "css/faculty.jpg" height="150" width="280"></td>
                            <td>View all courses taught in Ashesi University College</td>
    </tr>
</table>
-->


<!--
        <div class="container-fluid">
  <div class="row">
    <div class="col-sm-4"><img src = "css/courses.png" height="150" width="280"></div>
    <div class="col-sm-4"><img src = "css/academic_dept.jpg" height="150" width="280"></div>
    <div class="col-sm-4"><img src = "css/faculty.jpg" height="150" width="280"></div>
  </div>
</div>
-->

<table class="table table-striped">
<!--
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
  -->
  <tbody>
    <tr>
      <td><a href="index.php"><img src = "css/courses.png" height="150" width="280" id="td" data-toggle="popover" title="Courses" 
       data-content="View all courses taught in Ashesi University" data-placement="bottom" data-trigger="hover"></a></td>
       <!--          <td><p class="lead">Click here to view courses and description</p></td>-->
       <!--        <td>john@example.com</td>-->
       <td><a href="departmentpage.php"><img src = "css/academic_dept.jpg" height="150" width="280" id="td" data-toggle="popover" title="Departments" 
                                             data-content="View all academic departments in Ashesi University" data-placement="bottom" data-trigger="hover"></a></td>
         <td><a href="facultypage.php"><img src = "css/faculty.jpg" height="150" width="280" id="td" data-toggle="popover" title="Faculty" 
                                            data-content="View all members of faculty in Ashesi University" data-placement="bottom" data-trigger="hover"></a></td>
         </tr>

       </tbody>
     </table>
   </div>

 </body>

 </html>
