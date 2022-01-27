<?php
session_start(); 
?>
<?php
include 'session.php';
include 'test_input.php';
?>
<?php
 $conn = mysqli_connect("localhost", "root", "mysql", "job");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}               
        ?>
<?php
      $reg_id = $_SESSION['reg_id'];
        $result = mysqli_query($conn, "select * from reg WHERE  reg_id = ' $reg_id' ");
 $result16 = mysqli_fetch_array($result);
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
                    <ul>
                   <li> <a href="profile.php">PROFILE</a></li> 
      <li > <a href="education.php">EDUCATION</a></li>
      <li><a href="history.php">JOB HISTORY</a></li>
      <li class="active"> <a href="job.php">APPLYING JOB</a></li>
       <li> <a href="refere.php">REFEREES</a></li>
      <li><a href="preview.php" >PREVIEW</a></li> 
      </ul>
                </div>
            </div>
            
            <div id="content">
        <h1 align="center"> Job Portal </h1><br>
        <p> TOA MUTIL TECH was built with passion, to create something out of noting, to build a great industry here in our world.
         We offer Support, Computer and Network Engineering, Servers and Website Development and much more still coming.
         TOA MUTIL TECH started as a dream and now come to reality, The Great Dream of ours is to meet the needs of our customer and through us the the world become a better place to stay.
        </p>
        
        <div id="reg">
            <h3>Your Applying Job</h3><br>
            <form name="reg" method="post" action="">     
                <p>Job Available<br>
                <select id="job" name="job" required>
                    <option>Graphic Designer</option>
                    <option>Programmer</option>
                     <option>Web Designer</option>
                      <option>Web Developer</option>
                       <option>Computer Engineer</option>
                </select></p>               
             <p> <b>Applied Job: </b> <input type="text" name="" id="" value="<?php echo $result16['job']; ?>"  /></p>
                 
                   
                    <input type="hidden" name="reg_id" id="reg_id" value="<?php echo $result16['reg_id']; ?>"  />
                    
                <p><input type="submit" name="submit" id="submit" value="Save" /></p>
            </form>
        </div>
        
        <?php
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$reg_id = test_input($_POST[ 'reg_id' ]);
$job = test_input($_POST['job']); 
   
  mysqli_query($conn, "UPDATE reg SET job = '$job' WHERE reg_id= '" . $result16["reg_id"] . "'");
  
  
    echo "<script language='javascript' type='text/javascript'> location.href='job.php' </script>";


    mysql_close($conn);
} 
        
        ?>
       <p align="center" ><a href="history.php" class="btn"><img src="img/back.jpg" alt="" /></a>&emsp;&emsp;&emsp; <a href="refere.php" class="btn"><img src="img/next.jpg" alt="" /></a></p>
        <p align="right"> <a href="logout.php" class="btn">Logout</a></p>
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