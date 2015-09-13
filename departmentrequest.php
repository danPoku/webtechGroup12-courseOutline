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
    include("department.php");
		$obj=new departments();
    
        if(!$obj->get_all_department()){
            echo '{"result":0,"message":"error getting department"}';
        }else{
            $row = $obj->get_all_department();
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
    include("department.php");
		$obj=new departments();
		$id=$_REQUEST['id'];
    $name=$_REQUEST['name'];
    $head=$_REQUEST['head'];
    $desc=$_REQUEST['desc'];

    if(!isset($_REQUEST['id'])){
            echo '{"result":0,"message":"Error"}';
        return;
        }
    else{
       $obj->update_department($id,$name, $head, $desc);
        echo '{"result":1,"message":"Successful"}';
    }
}

function call(){
        include("department.php");
		$obj=new departments();
		$id=$_REQUEST['id'];
    if(!isset($_REQUEST['id'])){
            echo '{"result":0,"message":"Error"}';
        return;
        }
    else{
       $obj->get_department($id);
        $row=$obj->fetch();
        echo '{"result":1,"department":';
        echo json_encode($row);
        echo '}';
    }
}


function add(){
    include("department.php");
		$obj=new departments();
    $name=$_REQUEST['name'];
    $head=$_REQUEST['head'];
    $desc=$_REQUEST['desc'];
    if(!isset($_REQUEST['name'])){
            echo '{"result":0,"message":"Error"}';
        return;
        }
    else{
       $obj->add_department($name, $head, $desc);
        echo '{"result":1,"message":"Successful"}';
        
    }
}

function search(){
    include("department.php");
		$obj=new departments();
    $name=$_REQUEST['search'];
    $row = $obj->search_department($name);
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
    include("department.php");
		$obj=new departments();
    $id=$_REQUEST['id'];
    if(!isset($_REQUEST['id'])){
            echo '{"result":0,"message":"Error"}';
        return;
        }
    else{
       $row = $obj->delete_department($id);
        echo json_encode($row);
        
    }
    
}