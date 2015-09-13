<?php
$cmd=$_REQUEST['cmd'];
switch($cmd)
{


        case 1:
    getall();
		
		break;
    
    case 2:
    update();
    
    break;
    
    
    case 3:
    call();
    break;
    
    case 4:
    add();
    break;
    
    case 5:
    search();
    break;
    
    case 6:
    delete();
    break;
    
	default:
    echo 'Fail';
    break;
}

function getall(){
    include("coursedb.php");
		$obj=new course();
//		$id=$_REQUEST['id'];
    
        if(!$obj->get_all()){
            echo '{"result":0,"message":"error getting courses"}';
        }else{
            $row=$obj->fetch();
            echo'{"result":1, "all":[';
            
              while($row){
                echo json_encode($row);
                $row = $obj->fetch();
                if($row){
                    echo",";
                }
//                $i++;
            }
            echo ']}';
        }
}

function update(){
    include("coursedb.php");
		$obj=new course();
		$id=$_REQUEST['id'];
    $name=$_REQUEST['name'];
    $desc=$_REQUEST['desc'];
    $hours=$_REQUEST['hours'];
    $sem=$_REQUEST['sem'];
    $yr=$_REQUEST['year'];
    if(!isset($_REQUEST['id'])){
            echo '{"result":0,"message":"Error"}';
        return;
        }
    else{
       $obj->update_course($id,$name, $desc, $hours, $sem, $yr);
        echo '{"result":1,"message":"Successful"}';
    }
}

function call(){
        include("coursedb.php");
		$obj=new course();
		$id=$_REQUEST['id'];
    if(!isset($_REQUEST['id'])){
            echo '{"result":0,"message":"Error"}';
        return;
        }
    else{
       $obj->get_by_id($id);
        $row=$obj->fetch();
        echo '{"result":1,"courses":';
        echo json_encode($row);
        echo '}';
    }
}


function add(){
    include("coursedb.php");
		$obj=new course();
    $name=$_REQUEST['name'];
    $desc=$_REQUEST['desc'];
    $hours=$_REQUEST['hours'];
    $sem=$_REQUEST['sem'];
    $yr=$_REQUEST['year'];
    if(!isset($_REQUEST['name'])){
            echo '{"result":0,"message":"Error"}';
        return;
        }
    else{
       $obj->add_course($name, $desc, $hours, $sem, $yr);
        echo '{"result":1,"message":"Successful"}';
        
    }
}

function search(){
    include("coursedb.php");
		$obj=new course();
    $name=$_REQUEST['search'];
    $row = $obj->search_course($name);
    if(!isset($_REQUEST['search'])){
            echo '{"result":0,"message":"Error"}';
        return;
        }
    else{
        
            $row=$obj->fetch();
            echo'{"result":1, "all":[';
            
              while($row){
                echo json_encode($row);
                $row = $obj->fetch();
                if($row){
                    echo",";
                }
//                $i++;
            }
            echo ']}';
        }
    
}

function delete(){
    include("coursedb.php");
		$obj=new course();
    $id=$_REQUEST['id'];
    if(!isset($_REQUEST['id'])){
            echo '{"result":0,"message":"Error"}';
        return;
        }
    else{
       $row = $obj->delete($id);
//        $row = $obj->fetch();
        echo json_encode($row);
        
    }
    
}