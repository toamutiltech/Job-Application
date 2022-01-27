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
             <?php
  
if ($_SESSION['reg_id']) {

$status = 'finish'; 
   
  mysqli_query($conn, "UPDATE reg SET status = '$status' WHERE reg_id= '" . $result16['reg_id'] . "' ");
  
} 
        
        ?>    
                
            </div>
            
            <div id="content">
        <h1 align="center"> Job Portal </h1><br>
        
         <h2>Profile</h2>
        <div id="pass"><img src="passport/<?php echo $result16['passport']; ?>" ait="" width="100px"  height="100px"  /></div>
          <p> Surname: <?php echo $result16['sname']; ?> &emsp;&emsp;&emsp;First Name: <?php echo $result16['fname']; ?> &emsp;&emsp;&emsp;
                 Middle name: <?php echo $result16['mname']; ?> </p>            
               
                <p>Phone Number: <?php echo $result16['pnumber']; ?> &emsp;&emsp;&emsp; Other Number: <?php echo $result16['onumber']; ?></p>
                <p>Email: <?php echo $result16['email']; ?></p>
                <p> Date of Birth: <?php echo $result16['birth_date']; ?>&emsp;&emsp;&emsp;
                  Sex: <?php echo $result16['sex']; ?></p>
                  <p> Marital Status: <?php echo $result16['mstatus']; ?></p>
                  <p> Contact Address: <?php echo $result16['address']; ?></p>
                    <p> State/Province/City: <?php echo $result16['state']; ?></p>
                     <p> Permanent Address: <?php echo $result16['paddress']; ?></p>
                     <p>State/Province/City :<?php echo $result16['town']; ?></p>
                     <p> Country: <?php echo $result16['country']; ?></p>
                      <br> <br>
      <h3>Educational Background</h3>                 
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
                                  
                                 
                           
                                </tr>
                            </thead>
                            <tbody id="myTable">
 <?php

          $result1 = mysqli_query($conn, "SELECT * FROM school WHERE reg_id = '" . $result16['reg_id'] . "' ");
  
 while ($result15 = mysqli_fetch_array($result1, MYSQL_ASSOC)) {  
           
            ?>
                                    <tr>
               
                                        <td><?php echo $result15['type']; ?></td>
                                        <td><?php echo $result15['name_of_school']; ?></td>
                                        <td><?php echo $result15['smonth']; ?></td>
                                        <td><?php echo $result15['syear']; ?></td>
                                        <td><?php echo $result15['emonth']; ?></td>
                                         <td><?php echo $result15['eyear']; ?></td>
                                         <td><?php echo $result15['address']; ?></td>
                                        
                                         
  
                                    </tr>
 <?php
   }     
            ?>       
                                    </tbody>
                        </table>
    <br> <br>     
 <h3>Job Histories</h3>
        <table cellpadding="1" cellspacing="1" class="tablesorter-blue" id="tabla">
                            <thead>
                                <tr>
                                    <td>Organization Name</td>
                                    <td>Job Title</td>                                                                   
                                     <td>Starting Year</td>     
                                    <td> Ending Year</td>
                                    <td>Address</td>
                                  
                                 

        
                                </tr>
                            </thead>
                            <tbody id="myTable">
 <?php
//job_id, reg_id, jname, `position, syear, eyear, jaddress,

          $result2 = mysqli_query($conn, "SELECT * FROM job WHERE reg_id = '" . $result16['reg_id'] . "' ");
  
 while ($result14 = mysqli_fetch_array($result2, MYSQL_ASSOC)) {  
           
            ?>
                                    <tr>
               
                                        <td><?php echo $result14['jname']; ?></td>
                                        <td><?php echo $result14['position']; ?></td>
                                        <td><?php echo $result14['syear']; ?></td>
                                         <td><?php echo $result14['eyear']; ?></td>
                                         <td><?php echo $result14['jaddress']; ?></td>
                                        
                                         
  
                                    </tr>
 <?php
   }     
            ?>       
                                    </tbody>
                        </table>    
  <br> <br>
 <h3>Applying Job</h3>
                         
             <p> <b>Applied Job: </b> <?php echo $result16['job']; ?></p>
                 
    <br> <br>                
 <h3>Your Referees</h3>
        <table cellpadding="1" cellspacing="1" class="tablesorter-blue" id="tabla">
                            <thead>
                                <tr>
                                    <td>Referee Name</td>                                                             
                                     <td>Referee Number</td>     
                                    <td>Referee Place of Work</td>
                                    <td>Job Title</td>    
                                    <td>Referee Email</td>
                                    <td>Referee Address</td>
                                 
                                 

        
                                </tr>
                            </thead>
                            <tbody id="myTable">
 <?php



          $result3 = mysqli_query($conn, "SELECT * FROM refere WHERE reg_id = '" . $result16['reg_id'] . "' ");
  
 while ($result13 = mysqli_fetch_array($result3, MYSQL_ASSOC)) {  
           
            ?>
                                    <tr>
                                        <td><?php echo $result13['ref_name']; ?></td>
                                        <td><?php echo $result13['ref_number']; ?></td>
                                        <td><?php echo $result13['ref_work']; ?></td>
                                        <td><?php echo $result13['ref_position']; ?></td>
                                         <td><?php echo $result13['ref_email']; ?></td>
                                         <td><?php echo $result13['ref_address']; ?></td>
                                        
                                         
  
                                    </tr>
 <?php
   }     
            ?>       
                                    </tbody>
                        </table>                    
        <?php
       
        
        ?>
 <br> <br>
       <form>
<input type="button" value="Print" onclick="window.print()" />
</form>
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
