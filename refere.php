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
                   <li> <a href="profile.php">PROFILE</a></li> 
      <li > <a href="education.php">EDUCATION</a></li>
      <li><a href="history.php">JOB HISTORY</a></li>
      <li> <a href="job.php">APPLYING JOB</a></li>
      <li class="active"> <a href="refere.php">REFEREES</a></li>
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
        <h2>Provide all Three Referees Information from the First to the Last</h2>
        <br><br>
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
                                   <td>Action</td>
                                 

        
                                </tr>
                            </thead>
                            <tbody id="myTable">
 <?php
//CREATE TABLE refere (refere_id INT NOT NULL AUTO_INCREMENT, reg_id INT, ref_name VARCHAR(70), ref_number VARCHAR(45), 
//ref_email VARCHAR(100), ref_work VARCHAR(70), ref_address VARCHAR(300), ref_position VARCHAR(70), PRIMARY KEY (refere_id));


          $result1 = mysqli_query($conn, "SELECT * FROM refere WHERE reg_id = '" . $result16['reg_id'] . "' ");
  
 while ($result15 = mysqli_fetch_array($result1)) {  
           
            ?>
                                    <tr>
                                        <td><?php echo $result15['ref_name']; ?></td>
                                        <td><?php echo $result15['ref_number']; ?></td>
                                        <td><?php echo $result15['ref_work']; ?></td>
                                        <td><?php echo $result15['ref_position']; ?></td>
                                         <td><?php echo $result15['ref_email']; ?></td>
                                         <td><?php echo $result15['ref_address']; ?></td>
                                         <td><a href="delete2.php?refere_id=<?php echo $result15['refere_id']; ?>" >Delete</a></td>
                                         
  
                                    </tr>
 <?php
   }     
            ?>       
                                    </tbody>
                        </table>                                
        <div id="reg">
            <h3>Referees Information</h3><br>
            <form name="form" id="form" method="post" action="">     

                  <p> Referee Name: <input type="text" name="ref_name" id="ref_name" required class="loginbox" /></p>
                  
                   <p> Referee Number: <input type="text" name="ref_number" id="ref_number" required class="loginbox" /></p>                                
                   
                   <p> 
                     Referee Place of Work: <input type="text" name="ref_work" id="ref_work" required class="loginbox"  /></p>
                   
                  <p> Job Title: <input type="text" name="ref_position" id="ref_position" required class="loginbox"  /></p>
                   
                 
                    <p> Referee Email: <input type="text" name="ref_email" id="ref_email" required class="loginbox"  /></p>
                   
                    <p> Referee Address/Work Address: <textarea name="ref_address" id="ref_address" required ></textarea></p>
                   
                    <input type="hidden" name="reg_id" id="reg_id" value="<?php echo $result16['reg_id']; ?>" />
                    
                <p><input type="submit" name="submit" id="submit" value="Save" /></p>
            </form>
        </div>
        
        <?php
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//CREATE TABLE refere (refere_id INT NOT NULL AUTO_INCREMENT, reg_id INT, ref_name VARCHAR(70), ref_number VARCHAR(45), 
//ref_email VARCHAR(100), ref_work VARCHAR(70), ref_address VARCHAR(300), ref_position VARCHAR(70), PRIMARY KEY (refere_id));
    
$reg_id = test_input($_POST[ 'reg_id' ]);
$ref_name = test_input($_POST['ref_name']);
$ref_number = test_input($_POST['ref_number']);
$ref_email = test_input($_POST['ref_email']);
$ref_work = test_input($_POST['ref_work']);
$ref_address = test_input($_POST['ref_address']);
$ref_position = test_input($_POST['ref_position']);

   
 mysqli_query($conn, "INSERT INTO refere " . "(reg_id, ref_name, ref_number, ref_email, ref_work, ref_address, ref_position) " . "VALUES
                    ('$reg_id', '$ref_name', '$ref_number', '$ref_email', '$ref_work', '$ref_address', '$ref_position')");
  
  
    echo "<script language='javascript' type='text/javascript'> location.href='refere.php' </script>";


    mysql_close($conn);
} 
        
        ?>
       <p align="center" ><a href="job.php" class="btn"><img src="img/back.jpg" alt="" /></a>&emsp;&emsp;&emsp; <a href="preview.php" class="btn"><img src="img/next.jpg" alt="" /></a></p>
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
