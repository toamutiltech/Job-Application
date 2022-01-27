<?php
session_start(); 
?>
 <?php
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
        <h1 align="center"> Welcome Admin to Job Portal </h1><br>
        <p> TOA MUTIL TECH was built with passion, to create something out of noting, to build a great industry here in our world.
         We offer Support, Computer and Network Engineering, Servers and Website Development and much more still coming.
         TOA MUTIL TECH started as a dream and now come to reality, The Great Dream of ours is to meet the needs of our customer and through us the the world become a better place to stay.
        </p>
        
        <div id="login">
            <h2>Login Admin</h2><br>
            <form method="post" action="">
                <p>
                    Email:<br>
                    <input type="text" name="username" id="username" class="loginbox" />
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

$username = $_POST[ 'username' ];
$password = $_POST[ 'password' ];


$result = mysqli_query($conn, "select * from admin WHERE username like '$username' AND password ='$password'");
 $result16 = mysqli_fetch_array($result);
 
 if($result16 != 0) {

$_SESSION["login_user1"]= $result16['admin_id'];
    
echo " <script language='javascript' type='text/javascript'> location.href='admin.php' </script>" ;

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
