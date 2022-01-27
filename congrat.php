<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       
   <link rel="stylesheet" href="css/style.css" type="text/css" />
        <title>JOB PORTAL</title>
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <div class="main">
                   <h1>Job Portal </h1>  
                   
                </div>
                <div class="tab">
                    
                </div>
            </div>
            
            <div id="content">
        <h1 align="center"> Congratulation!!!!!!!!!!!!!!!!!!! </h1><br>
        
        
        <div id="login">
            <h2 align="left">Login With your Credentials</h2><br>
            <form id="congrat" method="post" action="">
                <p>
                    Email:<br>
                    <input type="text" name="email" id="email" class="loginbox" />
                </p> 
                <p>
                   Password:<br>
                    <input type="password" name="password" id="password" class="loginbox" />
                </p>
                <p><input type="submit" name="submit" id="submit" value="Login" /></p>
            </form> 
        </div>
        
        
        
        <?php
        $conn = mysqli_connect("localhost", "root", "mysql", "job");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
       
if (isset( $_POST[ 'submit' ]))
{
    

    //id, username, password

$email = $_POST[ 'email' ];
$password = $_POST[ 'password' ];


$result = mysqli_query($conn, "select * from reg WHERE email like '$email' AND password ='$password'");
 $result16 = mysqli_fetch_array($result);
 
 if($result16 != 0) {

$_SESSION["login_user"]= $result16['reg_id'];
    
echo " <script language='javascript' type='text/javascript'> location.href='profile.php' </script>" ;

    //here session is used and val
}
else
{
echo "<script type='text/javascript'>alert('Invalid Credentials!!!!!')</script>" ;
}
}
        
        ?>
        </div>
        <div id="footer">
            <hr>
            <center>
            <div><strong>Job Portal</strong> &copy; <span id="copyright-year">2019</span> | <a href="privacy.php" target="_blank">Privacy Policy</a>
                       Templates designed by <a href="http://toamutiltech.com/" target="_blank" rel="nofollow">Toa Mutil Tech</a>
                    </div>
                </center>
        </div>
        </div>
    </body>
</html>
