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
    include("faculty.php");
		$obj=new faculty();
    
        if(!$obj->get_all()){
            echo '{"result":0,"message":"error getting faculty"}';
        }else{
            $row=$obj->fetch();
            echo'{"result":1, "all":[';
            
              while($row){
                echo json_encode($row);
                $row = $obj->fetch();
                if($row){
                    echo",";
                }
            }
            echo ']}';
        }
}

function update(){
    include("faculty.php");
		$obj=new faculty();
		$id=$_REQUEST['id'];
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $phone=$_REQUEST['phone'];

    if(!isset($_REQUEST['id'])){
            echo '{"result":0,"message":"Error"}';
        return;
        }
    else{
       $obj->update_faculty($id,$name, $email, $phone);
        echo '{"result":1,"message":"Successful"}';
    }
}

function call(){
        include("faculty.php");
		$obj=new faculty();
		$id=$_REQUEST['id'];
    if(!isset($_REQUEST['id'])){
            echo '{"result":0,"message":"Error"}';
        return;
        }
    else{
       $obj->get_faculty($id);
        $row=$obj->fetch();
        echo '{"result":1,"faculty":';
        echo json_encode($row);
        echo '}';
    }
}


function add(){
    include("faculty.php");
		$obj=new faculty();
    $name=$_REQUEST['name'];
    $email=$_REQUEST['email'];
    $phone=$_REQUEST['phone'];
    if(!isset($_REQUEST['name'])){
            echo '{"result":0,"message":"Error"}';
        return;
        }
    else{
       $obj->add_faculty($name, $email, $phone);
        echo '{"result":1,"message":"Successful"}';
        
    }
}

function search(){
    include("faculty.php");
		$obj=new faculty();
    $name=$_REQUEST['search'];
    $row = $obj->search_faculty($name);
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
            }
            echo ']}';
        }
    
}

function delete(){
    include("faculty.php");
		$obj=new faculty();
    $id=$_REQUEST['id'];
    if(!isset($_REQUEST['id'])){
            echo '{"result":0,"message":"Error"}';
        return;
        }
    else{
       $row = $obj->delete_faculty($id);
        echo json_encode($row);
        
    }
    
}