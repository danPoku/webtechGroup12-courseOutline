<?php

/*this class models the department object of the Ashei Course Repository
*@author David Ofosu-Dorte
* 11/8/2015
*/

include_once("adb.php");
class department extends adb{
 function department()
 {}


/**this function would set into table, departmenttable, with parameters id,name,courses,majors,description
*@param $id //the id of the department
*@param $name // name of department
*@param $courses //cpurses in the department
*@param $majors //majors the department has
*@param $description //description of the department
*/
 function addDepartment($id, $name, $courses, $majors, $description)
 {
 	$query="INSERT INTO departmenttable departmentID='$id', departmentName='$name', courses='$courses', departmentMajors='$majors', description='$description'";
 	return $this->query($query);
 }


/*this function would update rows with new information by the id of the department
*@param $id //the id of the department
*@param $name // name of department
*@param $courses //cpurses in the department
*@param $majors //majors the department has
*@param $description //description of the department
*/
function updateDepartment($id, $name, $courses, $majors, $description)
{
$query="UPDATE departmenttable SET departmentName='$name', courses='$courses', departmentMajors='$majors', description='$description' WHERE departmentID='$id'";
return $this->query($query);

}


/*this function would remove from departmenttable row with coresponding id
*@param $id//id of row
*/
function deleteDepartment($id)
{
	$query="DELETE from departmenttable WHERE departmentID='$id";
	return $this->query($query);
}


/*this function would retrieve from departmenttable selected attributes with id
*@param $id//id of row
*/
function getDepartment($id)
{
	$query="SELECT departmentName, course, departmentMajors, description from departmenttable WHERE departmentID='$id'";
    return $this->query($query);
}


/*this function would return all rows belonging to the departmenttable database
* 
*/
function getAllDepartments()
{
	$query="SELECT * FROM departmenttable";
	return $this->query($query);
}


/*function would run through table to return row with departmentname like $name
*@param $name// department with name like $name
*/
function searchDepartment($name)
{
   $query="SELECT * FROM departmenttable WHERE departmentName LIKE '%$name%'";
   return $this->query($query);
}







}