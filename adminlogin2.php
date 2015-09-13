<?php
session_start();
ob_start();
?>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/adminstyle.css">
    <script src="jquery-1.5.min.js"></script>
</head>
<body>
    <div id="error" style="color:red; margin:2in; margin-left:4.5in"></div>
    <div class="container">
        <table width="900">
            <tr>
                <td>
                    <div>
                        <img src = "css/title-img.jpg" alt="Title Image" id="titleImage">
                        <span id="pageheader"> Course Repository</span>
                    </div>
                </td>                    
            </tr>
        </table>



        <form method="POST" action="adminlogin2.php" onsubmit="return validate()">
      
            <table id="logcontainer" cellpadding="2" cellspacing="5">
                <tr>
<!--                    <td style="color:chocolate">Email</td>-->
                    <td><input type="text" name="email" id="st" class="box" placeholder="Email" required="required"></td>
                </tr>
                <tr>
<!--                    <td style="color:chocolate">Username</td>-->
                    <td><input type="text" name="uname" id="nd" class="box" placeholder="Username" required="required"></td>
                </tr>
                <tr>
<!--                    <td style="color:chocolate">Password</td>-->
                    <td><input type="password" name="pwd" id="rd" class="box" placeholder="Password" required="required"></td>
                    </tr>                            
                    <tr>
                        <td colspan="2" align="right">
                            <input type="submit" value="Login" class="btn">
                            <!-- <button class="btn">Login</button> -->
                        </td>
                    </tr>
                </table>
            </form>

            <p>
            <font size="-3" color="gray" style="justification:full;">
        This is a restricted network. Use of this network, its equipment, and resources
        is monitored at all times and requires explicit permission from the network
        administrator and Ashesi University College. If you do not have this
        permission in writing, you are violating the regulations of this network
        and can and will be prosecuted to the full extent of the law. By continuing
        into this system, you are acknowledging that you are aware of and agree
        to these terms.
        </font>
        </p>
        <p align="center"> <small>Repository version 1.0 © 2015-2020</small></p>
    </div>

        <script>
//            $('#first').focus()
//            $('input').focus(function() { $(this).css('background', '#FBF4F4') } )
//            $('input').blur(function() { $(this).css('background', '#aaa') } )
        </script>
    <script>
	function validate(){
//		var obj = document.getElementById("st")
//		var str= obj.value;
////		if(str.length<=0){
//////			obj.style.backgroundColor="red";
////            obj.style.boxShadow= "0 0 10px red";
////			return false;
////		}
//        if(document.getElementById("nd").value.length<=0){
////			obj.style.backgroundColor="red";
//            document.getElementById("nd").style.boxShadow= "0 0 10px red";
//			return false;
//		}
//        
//        if(document.getElementById("rd").value.length<=0){
////			obj.style.backgroundColor="red";
//            document.getElementById("rd").style.boxShadow= "0 0 10px red";
//			return false;
//		}
//        
//        else{
//			obj.style.backgroundColor="white";
//            document.getElementById("nd").style.backgroundColor="white";
//            document.getElementById("rd").style.backgroundColor="white";
//			return true;
//		}
//        
//		return false;                		
	}


    </script>


    </body>
    </html>
<?php
include ("administrator.php");


    if(isset($_POST['email'])){

        $obj=new administrator;
        $email=$_POST['email'];
        $user=$_POST['uname'];
        $pass=$_POST['pwd'];
        $_SESSION["session"]=$user;
        if($user=="" || $pass=="")
            echo "Not all fields were entered";

        $obj->search_admin($user, $pass);
        $result=$obj->get_num_rows();

        if($result==0){
            echo 
                <<<_END
            <script>
                document.getElementById("error").innerHTML='Incorrect username or password or email';
            </script>
_END;
        }else{
            echo "Succesful";
            header( 'Location: homepage.php' ) ;
            // fopen("", "r");

        }
    }

?>


