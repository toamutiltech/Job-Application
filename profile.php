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
   <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <title>JOB PORTAL</title>
        <script type="text/javascript">
function showPreview(objFileInput) {
    if (objFileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (e) {
            $("#targetLayer").html('<img src="'+e.target.result+'" width="100px" height="100px" class="upload-preview" />');
			$("#targetLayer").css('opacity','0.7');
			$(".icon-choose-image").css('opacity','0.5');
        }
		fileReader.readAsDataURL(objFileInput.files[0]);
    }
}


</script>
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <div class="main">
                   <h1>Job Portal </h1>  
                   
                </div>
                <div class="tab">
                    <ul>
                   <li class="active"> <a href="profile.php">PROFILE</a></li> 
      <li > <a href="education.php">EDUCATION</a></li>
      <li><a href="history.php">JOB HISTORY</a></li>
      <li> <a href="job.php">APPLYING JOB</a></li>
       <li> <a href="refere.php">REFEREES</a></li>
      <li><a href="preview.php" >PREVIEW</a></li> 
      </ul>
                   
                </div>
            </div>
            
            <div id="content">
        <h1 align="center">Job Portal </h1><br>
        <p> TOA MUTIL TECH was built with passion, to create something out of noting, to build a great industry here in our world.
         We offer Support, Computer and Network Engineering, Servers and Website Development and much more still coming.
         TOA MUTIL TECH started as a dream and now come to reality, The Great Dream of ours is to meet the needs of our customer and through us the the world become a better place to stay.
        </p>
        
        <div id="reg">
            <h2>Your Profile</h2><br>
            <form name="form" id="form" method="post" action="" enctype="multipart/form-data"> 
                <div id="pass">
                    Passport<br>
                    <img src="passport/<?php echo $result16['passport']; ?>" ait="" width="100px"  height="100px"  /><br>
                  <div id="targetOuter">
	<div id="targetLayer"></div>
<div><input type="file" name="myfile" class="inputFile" onChange="showPreview(this);" required /> </div>
</div>
                </div>
                <p> Surname: <?php echo $result16['sname']; ?> <br><br>First Name: <?php echo $result16['fname']; ?> 
                    <br><br>Middle name: <input type="text" name="mname" id="mname" class="loginbox" value="<?php echo $result16['mname']; ?>" required /> </p>            
                <p> Phone Number: <?php echo $result16['pnumber']; ?> &emsp;&emsp;&emsp;Other Number: <input type="text" name="onumber" id="onumber" class="loginbox" value="<?php echo $result16['onumber']; ?>" /></p>
                <p>Email: <?php echo $result16['email']; ?></p><br>
                <p> Date of Birth: <input type="text" name="birth_date" id="birth_date" class="loginbox" required value="<?php echo $result16['birth_date']; ?>" />&emsp;&emsp;&emsp;
                  Sex: <input type="text" name="sex" id="sex" class="loginbox" required value="<?php echo $result16['sex']; ?>" /></p>
                  <p> Marital Status: <input type="text" name="mstatus" id="mstatus" required class="loginbox" value="<?php echo $result16['mstatus']; ?>" /></p>
                  <p> Contact Address: <textarea name="address" required id="address" ><?php echo $result16['address']; ?></textarea></p>
                    <p> State/Province/City: <input type="text" name="state" id="state" required class="loginbox" value="<?php echo $result16['state']; ?>" /></p>
                     <p> Permanent Address: <textarea name="paddress" required id="paddress" ><?php echo $result16['paddress']; ?></textarea></p>
                     <p>State/Province/City : <input type="text" name="town" id="town" required class="loginbox" value="<?php echo $result16['town']; ?>" /></p>
                     <p> Country: <input type="text" name="country" id="country" required class="loginbox" value="<?php echo $result16['country']; ?>" /></p>
                    
                <p><input type="submit" name="submit" id="submit" value="Save" /></p>
            </form>
        </div>
        
        
        <?php
       //CREATE TABLE reg (reg_id INT NOT NULL AUTO_INCREMENT, fname VARCHAR(70), mname VARCHAR(70), sname VARCHAR(70), pnumber VARCHAR(70), onumber VARCHAR(70), email VARCHAR(100), password VARCHAR(50), birth_date VARCHAR(45), country VARCHAR(50), address VARCHAR(300), `state` VARCHAR(50), town VARCHAR(70), paddress VARCHAR(300), sex VARCHAR(45), mstatus VARCHAR(70), job VARCHAR(100), PRIMARY KEY (reg_id));

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $targetDir = "passport/";
if(is_array($_FILES)) {
if(is_uploaded_file($_FILES['myfile']['tmp_name'])) {
if(move_uploaded_file($_FILES['myfile']['tmp_name'],"$targetDir/".$_FILES['myfile']['name'])) {
$passport = $_FILES['myfile']['name'];
}
}  
}

        $mname  = test_input($_POST[ 'mname' ]);     
        $onumber  = test_input($_POST[ 'onumber' ]);
        $birth_date  = test_input($_POST[ 'birth_date' ]);
        $country  = test_input($_POST[ 'country' ]);
        $address  = test_input($_POST[ 'address' ]);
        $state = test_input($_POST[ 'state' ]);
        $town  = test_input($_POST[ 'town' ]);
        $paddress  = test_input($_POST[ 'paddress' ]);
        $sex  = test_input($_POST[ 'sex' ]);
        $mstatus  = test_input($_POST[ 'mstatus' ]);
            
            
 
    
   
 mysqli_query($conn, "UPDATE reg SET mname = '$mname', onumber = '$onumber', birth_date = '$birth_date', country = '$country', address = '$address',
                                        state = '$state', town = '$town', paddress = '$paddress', passport = '{$passport}', sex = '$sex' , mstatus = '$mstatus' 
                                            WHERE reg_id= '" . $result16["reg_id"] . "'");
  
  
    echo "<script language='javascript' type='text/javascript'> location.href='profile.php' </script>";


    mysqli_close($conn);
} 
        ?>
        <p align="center" ><a href="education.php" class="btn"><img src="img/next.jpg" alt="" /></a></p>
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
