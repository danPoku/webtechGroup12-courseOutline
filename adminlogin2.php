<?php
session_start();
ob_start();
?>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css/adminstyle.css">
    <script src="jquery-1.5.min.js"></script>
    <script type="text/javascript" src="jquery-2.1.3.js"></script>   
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">    
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script> 
</head>
<body>
    <div id="error" style="color:red; margin:2in; margin-left:4.5in"></div>
    <div class="container">
    <div>
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
        </div>
        <br><br /><br />



<!--         <form method="POST" action="adminlogin2.php" onsubmit="return validate()">
      
    <table id="logcontainer" cellpadding="2" cellspacing="5">
        <tr>
<td style="color:chocolate">Email</td>
            <td><input type="text" name="email" id="st" class="box" placeholder="Email" required="required"></td>
        </tr>
<tr>
<td style="color:chocolate">Username</td>
    <td><input type="text" name="uname" id="nd" class="box" placeholder="Username" required="required"></td>
</tr>
        <tr>
<td style="color:chocolate">Password</td>
            <td><input type="password" name="pwd" id="rd" class="box" placeholder="Password" required="required"></td>
            </tr>                            
            <tr>
                <td colspan="2" align="right">
                    <input type="submit" value="Login" class="btn">
                    <button class="btn">Login</button>
                </td>
            </tr>
        </table>
    </form> -->
<form method="POST" action="adminlogin2.php">
            <div class="row">
  <div class="col-xs-6 col-md-offset-2">
  
  <div class="input-group">
  <span class="input-group-addon" id="sizing-addon1"></span>
  <input type="text" class="form-control" placeholder="Email" aria-describedby="sizing-addon1">
</div><br />

<div class="input-group">
  <span class="input-group-addon" id="sizing-addon2"></span>
  <input type="password" class="form-control" placeholder="Password" aria-describedby="sizing-addon2">
</div>
<div align="center"><button type="button" class="btn btn-default navbar-btn">Sign in</button></div>
<br />

<!--             <p>
<font size="-3" color="gray" style="justification:full;">
        This is a restricted network. Use of this network, its equipment, and resources
        is monitored at all times and requires explicit permission from the network
        administrator and Ashesi University College. If you do not have this
        permission in writing, you are violating the regulations of this network
        and can and will be prosecuted to the full extent of the law. By continuing
        into this system, you are acknowledging that you are aware of and agree
        to these terms.
        </font>
        </p> -->
        <!-- <p align="center"> <small>Repository version 1.0 © 2015-2020</small></p> -->
</div>
</form>



    </div>

        <script>
//            $('#first').focus()
//            $('input').focus(function() { $(this).css('background', '#FBF4F4') } )
//            $('input').blur(function() { $(this).css('background', '#aaa') } )
        </script>
    <script>


    </script>


    </body>
    </html>
<?php
include ("administrator.php");


    if(isset($_POST['email'])){

        $obj=new administrator;
        $email=$_POST['email'];
        // $user=$_POST['uname'];
        $pass=$_POST['pwd'];
        $_SESSION["session"]=$user;
        if($email=="" || $pass=="")
            echo "Not all fields were entered";

        $obj->search_admin($email, $pass);
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


