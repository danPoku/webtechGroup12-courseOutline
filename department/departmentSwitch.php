<?php

if(!isset($_REQUEST['cmd'])){
	echo '{"result":"0","message":"unknown command"}';
	exit();
}

$cmd=$_REQUEST['cmd'];

switch ($cmd)
{

case 1: //fetchese department from database by id
      getDepartment();
      break;


case 2: //fetches all rows from database
      getAllDepartments();
      break;


case 3: //add into the database
      addDepartment();
      break;


case 4: //updates into the database by id
      updateDepartment();  
      break;     


case 5: //deletes from database by id
      deleteDepartment();
      break;


case 6: //searches through database by name
      searchDepartment();
      break;                       

      

default:
  echo '{"result":0,message:"unknown command"}';
     break;


}


/**this function commuunicates between the client interface and database class interface
*@param $id //the id of the department
*@param $name // name of department
*@param $courses //courses in the department
*@param $majors //majors the department has
*@param $description //description of the department
*/
function addDepartment()
{
      include('departmentclass.php');
      $obj= new department();
      $id=$_REQUEST['id'];
      $name=$_REQUEST['name'];
      $courses=$_REQUEST['courses'];
      $majors=$_REQUEST['majors'];
      $description=$_REQUEST['description'];

     
      $obj->addDepartment($id, $name, $courses, $majors, $description);
      $row=$obj->fetch();

      if(!$row){
      echo '{"result":"0", "message":"could not add into database"}';
      }
      else{
            echo '{"result":"2", "message:"new department added into database"}';
      }
}


/*

function getDepartment()
{
  include('departmentclass.php');
  $obj= new department();
  $id=$_REQUEST['id'];
  $obj->getDepartment($id);
  $row=$obj->fetch();

  if(!$row){
      echo '{"result":"0", "message":"could not get department from database"}';
  }
  else{
    $row=$obj->fetch();
   
    echo '{"result":"2","departmentInfo":[';
    while($row){

        echo json_encode($row);
        $row=$obj->fetch();
             
        if($row){
           echo ',';
        }
      }
      echo ']}';
    }
}



function getAllDepartments()
{
   include('departmentclass.php');
   $obj= new department();
   $obj->getAllDepartments();
   $row=$obj->fetch();

   if(!$row){
      echo '{"result":"0", "message":"could not get department list from database"}';
  }
  else{
    $row=$obj->fetch();
    echo '{"result":"2","departmentList":[';
    while($row){

        echo json_encode($row);
        $row=$obj->fetch();
             
        if($row){
           echo ',';
        }
      }
      echo ']}';
    }
}





function updateDepartment()
{
      include('departmentclass.php');
      $obj= new department();
      $id=$_REQUEST['id'];
      $name=$_REQUEST['name'];
      $courses=$_REQUEST['courses'];
      $majors=$_REQUEST['majors'];
      $description=$_REQUEST['description'];

      $obj->updateDepartment($id, $name, $courses, $majors, $description);
      $row=$obj->fecth();

        if(!$row){
      echo '{"result":"0", "message":"could not be updated in database"}';
      }
      else{
            echo '{"result":"2", "message:"department information updated into database"}';
      }
}


function deleteDepartment()
{
      include('departmentclass.php');
      $obj= new department();
      $id=$_REQUEST['id'];

      $obj->deletedepartment($id);
      $row=$obj->fetch();

      if(!$row){
            echo '{"result":"0", "message":"row not deleted from database"}';
      }
      else{
            echo '{"result":"0", "message":"row deleted from database"}';
      }
}


function searchDepartment()
{
     include('departmentclass.php');
     $obj= new department();
     $name=$_REQUEST['search_name'];
     $obj->searchDepartment($name);

     $row=$obj->fetch();
        if(!$row){
      echo '{"result":"0", "message":"could not be found in database"}';
  }
  else{
    $row=$obj->fetch();
    echo '{"result":"2","searchResults":[';
    while($row){

        echo json_encode($row);
        $row=$obj->fetch();
             
        if($row){
           echo ',';
        }
      }
      echo ']}';
    }
}

*/




?>