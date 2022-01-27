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

                
        <link rel='stylesheet' href="css/theme.blue.css"  type="text/css"/>
      
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
                   <li > <a href="profile.php">PROFILE</a></li> 
      <li > <a href="education.php">EDUCATION</a></li>
      <li class="active"><a href="history.php">JOB HISTORY</a></li>
      <li> <a href="job.php">APPLYING JOB</a></li>
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
        <h2>Provide all Your Job Histories Information from the First to the Last</h2>
        <br><br>
        <h3>Your Job Histories</h3>
        <table cellpadding="1" cellspacing="1" class="tablesorter-blue" id="tabla">
                            <thead>
                                <tr>
                                    <td>Organization Name</td>
                                    <td>Job Title</td>                                                                   
                                     <td>Starting Year</td>     
                                    <td> Ending Year</td>
                                    <td>Address</td>
                                   <td>Action</td>
                                 

        
                                </tr>
                            </thead>
                            <tbody id="myTable">
 <?php
//job_id, reg_id, jname, `position, syear, eyear, jaddress,

          $result1 = mysqli_query($conn, "SELECT * FROM job WHERE reg_id = '" . $result16['reg_id'] . "' ");
  
 while ($result15 = mysqli_fetch_array($result1)) {  
           
            ?>
                                    <tr>
               
                                        <td><?php echo $result15['jname']; ?></td>
                                        <td><?php echo $result15['position']; ?></td>
                                        <td><?php echo $result15['syear']; ?></td>
                                         <td><?php echo $result15['eyear']; ?></td>
                                         <td><?php echo $result15['jaddress']; ?></td>
                                         <td><a href="delete1.php?job_id=<?php echo $result15['job_id']; ?>" >Delete</a></td>
                                         
  
                                    </tr>
 <?php
   }     
            ?>       
                                    </tbody>
                        </table>                                
        <div id="reg">
            <h3>Job History</h3><br>
            <form name="form" id="form" method="post" action="">     

                  <p> Organization Name: <input type="text" name="jname" id="jname" required class="loginbox" /></p>
                  
                   <p> Job Title: <input type="text" name="position" id="position" required class="loginbox" /></p>                                
                   
                   <p> 
                     Starting Year: <input type="text" name="syear" id="syear" required class="loginbox"  />&emsp;&emsp;&emsp;
                   
                 
                     Ending Year: <input type="text" name="eyear" id="eyear" required class="loginbox"  /></p>
                   
                    <p> Organization Address: <textarea name="jaddress" id="jaddress" required ></textarea></p>
                   
                    <input type="hidden" name="reg_id" id="reg_id" value="<?php echo $result16['reg_id']; ?>" />
                    
                <p><input type="submit" name="submit" id="submit" value="Save" /></p>
            </form>
        </div>
        
        <?php
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//job_id, reg_id, jname, `position, syear, eyear, jaddress,
    
$reg_id = test_input($_POST[ 'reg_id' ]);
$jname = test_input($_POST['jname']);
$jaddress = test_input($_POST['jaddress']);
$syear = test_input($_POST['syear']);
$eyear = test_input($_POST['eyear']);
$position = test_input($_POST['position']);

   
 mysqli_query($conn, "INSERT INTO job " . "(reg_id, jname, position, syear, eyear, jaddress) " . "VALUES ('$reg_id', '$jname', '$position', '$syear', '$eyear', '$jaddress')");
  
  
    echo "<script language='javascript' type='text/javascript'> location.href='history.php' </script>";


    mysql_close($conn);
} 
        
        ?>
       <p align="center" ><a href="education.php" class="btn"><img src="img/back.jpg" alt="" /></a>&emsp;&emsp;&emsp; <a href="job.php" class="btn"><img src="img/next.jpg" alt="" /></a></p>
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
