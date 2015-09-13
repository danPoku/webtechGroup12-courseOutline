<?php
session_start();
?>
<html>

    <head>  
    <title>Department</title>  
    <link rel="stylesheet" href="css/style.css">  
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <script type="text/javascript" src="jquery-2.1.3.js"></script>   
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">    
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>    
    <script>          
        $(document).ready(function(){      
          $('[data-toggle="tooltip"]').tooltip();       
      });
    
          function sendRequest(u){        
              // Send request to server        
              //u a url as a string        
              //async is type of request        
              var obj=$.ajax({url:u,async:false});        
              //Convert the JSON string to object        
              var result=$.parseJSON(obj.responseText);        
              return result;  //return object              
          }      

          $(document).ready(function(){
            displayall();                
          });


          function displayall(){        

              var url="departmentrequest.php?cmd=1";                  
              var obj = sendRequest(url);   //send request to the above url
              var someDiv="";       

              if(obj.result==1){          //check result                  

                  var i=0;                  
                  var id="";              
                  someDiv+="<table id='theTable' class='table table-striped' style='table-layout: fixed'>";                                  
                  someDiv+="<thead><tr><th>Department Name</th><th>Head</th><th>Description</th>";              
                  someDiv+="<th>Action</th></tr></thead>";              
                  someDiv+="<tbody>";              

                  for(i; i<obj.all.length;i++){              
                      id=obj.all[i].department_id;                  
                      someDiv+="<tr id='spec"+id+"'><td>"+obj.all[i].department_name + "</td><td>" + obj.all[i].department_head+"</td>";                
                      someDiv+="<td>" + obj.all[i].department_description + "</td><td>";         
                      someDiv+="<td><pre><span class='glyphicon glyphicon-edit' onclick='fillspace(id)' style='cursor: pointer' id="+id+" ";            
                      someDiv+="data-toggle='modal' data-target='#myModal' value='id' data-toggle='tooltip' title='edit this entry' data-placement='top' data-trigger='hover'>";                  
                      someDiv+="Edit</span>";                      
                      someDiv+="  <span class='glyphicon glyphicon-minus-sign' onclick='delRecord(id)'";                   
                      someDiv+=" style='cursor:pointer; color:red' id="+id+" value='id' data-toggle='tooltip' title='delete this entry' data-placement='bottom' data-trigger='hover'>";                  
                      someDiv+="Delete</span></td></tr>";                  
                  }
                      someDiv+="</tbody></table>";
                      $("#free").html(someDiv);
                      $("#divStatus").text("Loading from database successful");                
              }                

              else{
              //show error message          
                  $("#divStatus").text("Loading from database unsuccessful"); 
              }                  
          }



          function fillspace(id){      
              var url="departmentrequest.php?cmd=3&id="+id;        
              var obj = sendRequest(url);         
              if(obj.result==1){          
                  var id = id;
                  var name = obj.department.department_name;
                  var head = obj.department.department_head;
                  var desc = obj.department.department_description;

                  $("#editid").attr("value",id);   
                  $("#editname").attr("value", name);
                  $("#edithead").attr("value", head);
                  $("#editdesc").html(desc);
              }
          }



          function update(){   
              $id = $("#editid").attr("value");   
              $name = $("#editname").val();  
              $head = $("#edithead").val();  
              $desc = $("#editdesc").val();  
 
              var url ="departmentrequest.php?cmd=2&id="+$id+"&name="+$name+"&head="+$head+"&desc="+$desc;  
              var obj = sendRequest(url);  
              if(obj.result==1){                                            
                  displayall();    
                  $("#divStatus").text("Update successful");    
                  $("#spec"+$id).css("backgroundColor", "khaki");
              }
              else  
                  $("#divStatus").text("Error updating entry");
          }



          function add(){      
              $name = $("#addname").val();  
              $head = $("#addhead").val();  
              $desc = $("#add_desc").val();  

              var url ="departmentrequest.php?cmd=4&name="+$name+"&head="+$head+"&desc="+$desc;  
              var obj = sendRequest(url);  
              if(obj.result==1){                                            
                  displayall();    
                  $("#divStatus").text("New Entry Successful");    
                  $("#theTable tr:last").css("backgroundColor", "khaki");
              }
              else  
                  $("#divStatus").text("Error adding entry");
          }            




          function search(){   
              $search_text = $("#search").val();
              var url ="departmentrequest.php?cmd=5&search="+$search_text;
              var obj = sendRequest(url);                                         
                  var someDiv="";       
                  if(obj.result==1){          //check result                  
                      var i=0;
                      var id="";
                      someDiv+="<table id='theTable' class='table table-striped' style='table-layout: fixed'>";                                  
                  someDiv+="<thead><tr><th>Department Name</th><th>Email</th><th>Phone</th>";              
                  someDiv+="<th>Action</th></tr></thead>";              
                  someDiv+="<tbody>";              

                  for(i; i<obj.all.length;i++){              
                      id=obj.all[i].department_id;                  
                      someDiv+="<tr id='spec"+id+"'><td>"+obj.all[i].department_name + "</td><td>" + obj.all[i].department_head+"</td>";                
                      someDiv+="<td>" + obj.all[i].department_description + "</td><td>";         
                      someDiv+="<td><pre><span class='glyphicon glyphicon-edit' onclick='fillspace(id)' style='cursor: pointer' id="+id+" ";            
                      someDiv+="data-toggle='modal' data-target='#myModal' value='id' data-toggle='tooltip' title='edit this entry' data-placement='top' data-trigger='hover'>";                  
                      someDiv+="Edit</span>";                      
                      someDiv+="  <span class='glyphicon glyphicon-minus-sign' onclick='delRecord(id)'";                   
                      someDiv+=" style='cursor:pointer; color:red' id="+id+" value='id' data-toggle='tooltip' title='delete this entry' data-placement='bottom' data-trigger='hover'>";                  
                      someDiv+="Delete</span></td></tr>";                  
                  }        
                      someDiv+="</tbody></table>";
                      $("#free").html(someDiv);
                      $("#divStatus").text(obj.all.length+" Search Results");
                  }
                  else{  
                      $("#divStatus").text("Search not found");                      
                  }
          }

          function delRecord($id){     
                if (confirm("Do you want to delete this record") == true) {                                         
                  var url ="departmentrequest.php?cmd=6&id="+$id;                    
                  var obj = sendRequest(url);                                                                                              
                  displayall();                        
                  $("#divStatus").text("Entry Deleted");  
              }  
              else {    
                  return;  
              }                 
          }
        
        function refresh(){
            displayall();
            $("#divStatus").text("Page refreshed");
            $("#divStatus").css("backgroundColor", "green");            
        }
    </script>
    </head>
    <body>
  <!--    <div style="position:fixed">-->
  <nav class="navbar navbar-inverse">
    <div class="container-fluid" id="navHeader">
      <div class="navbar-header">
        <span class="navbar-brand" style="color:white">Ashesi Course Repository</span>
      </div>
      <div>
        <ul class="nav navbar-nav">
          <li><a href="homepage.php">Home</a></li>
          <li><a href="index.php">Courses</a></li>
          <li class="active"><a href="departmentpage.php">Departments</a></li>
          <li><a href="facultypage.php">Faculty</a></li>
          <li>
            <input type="text" class="form-control" id="search" placeholder="Search Department" onkeyup="search()" data-toggle="tooltip" title="Enter your search keywords" data-placement="bottom" data-trigger="hover">
          </li>
          <li><a href="#"><span class="glyphicon glyphicon-search" onclick="search()"></span></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#" style="color:white"><span class="glyphicon glyphicon-user"></span>  Hi, <?php echo $_SESSION["session"];?></a></li>
          <li><a href="adminlogin2.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container-fluid">
    <div><small><a href="homepage.php">Home</a>>><a href="departmentpage.php">Departments</a></small></div>
    <center>
      <div id="divStatus" class="status">
        status message
      </div>
    </center><br>
    
    <ul class="nav nav-tabs">
      <li class="active"><a href="#">View</a></li>
      <li style="cursor: pointer" id="" data-toggle="modal" data-target="#myModal1"><a href="#"><span class="glyphicon glyphicon-plus" ></span>Add Department</a></li>
      <li><a href="#" onclick="refresh()"><span class="glyphicon glyphicon-refresh" ></span>Refresh</a></li>
    </ul>
    
  </div>
  <!--        </div>-->
  <div id="free"></div>

  
  <!--        MODAL 1-->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Department Entry</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <!--                            <input type="text" class="form-control" id="editid" hidden="hidden"><br>-->
            <div id="editid"></div>
            <label for="name">Department name</label>
            <input type="text" class="form-control" id="editname"><br>
            
            <label for="desc">Department head</label>
              <input type="text" class="form-control" id="edithead"><br>
            <label for="hours">Department Description</label>
              <textarea class="form-control" rows="5" id="editdesc"></textarea><br>
<!--            <input type="text" class="form-control" id="editdesc"><br>-->
            
          </div>
        </div>
        <div class="modal-footer" id="update">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="update()">Update</button>
        </div>
      </div>

    </div>
  </div>
  
  
        
        <div id="myModal1" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add new Department</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Department name</label>
            <input type="text" class="form-control" id="addname"><br>
            
            <label for="desc">Department head</label>
              <input type="text" class="form-control" id="addhead"><br>
              
            <label for="hours">Department description</label>
              <textarea class="form-control" rows="5" id="add_desc"></textarea><br>
              
<!--            <input type="text" class="form-control" id="addphone"><br>-->
            

            
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick="add()">Add</button>
        </div>
      </div>

    </div>
  </div>
</div>
</body>
</html> 
