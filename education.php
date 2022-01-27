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
   <script src='js/jquery-1.7.2.min.js'></script>
           <script type="text/javascript" src="js/pagination.js"></script>       
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
      <li class="active"> <a href="education.php">EDUCATION</a></li>
      <li><a href="history.php">JOB HISTORY</a></li>
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
        <h2>Provide all Your Educational Information from the First to the Last</h2>
        <br><br>
        <h3>Your Educational Background</h3>
        <table cellpadding="1" cellspacing="1" class="tablesorter-blue" id="tabla">
                            <thead>
                                <tr>
                                    <td>Type of Education</td>
                                    <td>Name of Institution</td>                                   
                                    <td>Starting Month</td>
                                     <td> Starting Year</td>
                                    <td>Ending Month</td>
                                    <td> Ending Year</td>
                                    <td>Institution Address</td>
                                   <td>Action</td>
                                 
                           
                                </tr>
                            </thead>
                            <tbody id="myTable">
 <?php

          $result1 = mysqli_query($conn, "SELECT * FROM school WHERE reg_id = '" . $result16['reg_id'] . "' ");
  
 while ($result15 = mysqli_fetch_array($result1)) {  
           
            ?>
                                    <tr>
               
                                        <td><?php echo $result15['type']; ?></td>
                                        <td><?php echo $result15['name_of_school']; ?></td>
                                        <td><?php echo $result15['smonth']; ?></td>
                                        <td><?php echo $result15['syear']; ?></td>
                                        <td><?php echo $result15['emonth']; ?></td>
                                         <td><?php echo $result15['eyear']; ?></td>
                                         <td><?php echo $result15['address']; ?></td>
                                         <td><a href="delete.php?school_id=<?php echo $result15['school_id']; ?>" >Delete</a></td>
                                         
  
                                    </tr>
 <?php
   }     
            ?>       
                                    </tbody>
                        </table>                                
        <div id="reg">
            <h3>Educational Background</h3><br>
            <form name="reg" method="post" action="">     
                <p>Type of Education<br>
                <select id="type" name="type" required>
                    <option>Primary School</option>
                    <option>High School/Secondary School</option>
                     <option>College School/University</option>
                      <option>Vocational School</option>
                       <option>Professional School</option>
                </select></p>               
              
                  <p> Name of Institution: <input type="text" name="name_of_school" id="name_of_school" required class="loginbox" /></p>
                   
                  <p> Institution Address: <textarea name="address" required id="address" ></textarea></p>
                   
                   <p> Starting Month: <input type="text" name="smonth" required id="smonth" class="loginbox"  />&emsp;&emsp;&emsp;
                     Starting Year: <input type="text" name="syear" id="syear" required class="loginbox"  /></p>
                   
                   <p> Ending Month: <input type="text" name="emonth" id="emonth" required class="loginbox"  />&emsp;&emsp;&emsp;
                     Ending Year: <input type="text" name="eyear" id="eyear" required class="loginbox"  /></p>
                   
                    <input type="hidden" name="reg_id" id="reg_id" value="<?php echo $result16['reg_id']; ?>"  />
                    
                <p><input type="submit" name="submit" id="submit" value="Save" /></p>
            </form>
        </div>
        
        <?php
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$reg_id = test_input($_POST[ 'reg_id' ]);
$name_of_school = test_input($_POST['name_of_school']);
$address = test_input($_POST['address']);
$syear = test_input($_POST['syear']);
$eyear = test_input($_POST['eyear']);
$smonth = test_input($_POST['smonth']);
$emonth = test_input($_POST['emonth']);
$type = test_input($_POST['type']); 
   
 mysqli_query($conn, "INSERT INTO school " . "(reg_id, name_of_school, address, syear, eyear, smonth, emonth, type) " . "VALUES
                    ('$reg_id', '$name_of_school', '$address', '$syear', '$eyear', '$smonth', '$emonth', '$type')");
  
  
    echo "<script language='javascript' type='text/javascript'> location.href='education.php' </script>";


    mysql_close($conn);
} 
        
        ?>
       <p align="center" ><a href="profile.php" class="btn"><img src="img/back.jpg" alt="" /></a>&emsp;&emsp;&emsp; <a href="history.php" class="btn"><img src="img/next.jpg" alt="" /></a></p>
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
