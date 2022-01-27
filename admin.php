<?php
session_start(); 
?>
<?php
include 'admin_session.php';

?>
<?php
 $conn = mysqli_connect("localhost", "root", "mysql", "job");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}               
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
                
            </div>
            
            <div id="content">
        <h1 align="center"> Job Portal Applications</h1><br>
        
        
      <h3>Applications</h3>                 
       <table cellpadding="1" cellspacing="1" class="tablesorter-blue" id="tabla">
                            <thead>
                                <tr>
                                    <td>Surname</td>
                                    <td>First Name</td>                                   
                                    <td>Middle name</td>
                                     <td>Phone Number</td>
                                      <td> Date of Birth</td>
                                    <td>Sex</td>   
                                    <td>Email</td>                                                                   
                                    <td> Status</td>
                                    <td>Action</td>
                                  
                                 
                           
                                </tr>
                            </thead>
                            <tbody id="myTable">
 <?php

              $result = mysqli_query($conn, "select * from reg ");
  
 while ($result15 = mysqli_fetch_array($result)) {  
           
            ?>
                                    <tr>
               
                                        <td><?php echo $result15['sname']; ?></td>
                                        <td><?php echo $result15['fname']; ?></td>
                                        <td><?php echo $result15['mname']; ?></td>
                                        <td><?php echo $result15['pnumber']; ?></td>
                                        <td><?php echo $result15['birth_date']; ?></td>
                                         <td><?php echo $result15['sex']; ?></td>
                                         <td><?php echo $result15['email']; ?></td>
                                        <td><?php echo $result15['status']; ?></td>
                                         <td><a href="admin_veiw.php?reg_id=<?php echo $result15['reg_id']; ?>" >Preview</a></td>
                                         
  
                                    </tr>
 <?php
   }     
            ?>       
                                    </tbody>
                        </table>
        
               
        <?php
       
        
        ?>

            
        <p align="right"> <a href="logout2.php" class="btn">Logout</a></p>
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
