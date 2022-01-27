<?php

$conn = mysqli_connect("localhost", "root", "mysql", "job");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
   
   $user_check = $_SESSION['login_user'];
  
   $result = mysqli_query($conn, "select * from reg  where reg_id = '$user_check' ");


$result16 = mysqli_fetch_array($result);
 
$login_session = $result16['reg_id'];
$_SESSION['reg_id'] = $result16['reg_id'];
   
  

if(!isset($_SESSION['login_user'])){
      header("location:index.php");
   }
?>
