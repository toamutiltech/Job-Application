<?php
session_start();
$conn = mysqli_connect("localhost", "root", "mysql", "job");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
   
   $user_check = $_SESSION['login_user1'];
  
   $result = mysqli_query($conn, "select * from admin  where admin_id = '$user_check' ");


$result16 = mysqli_fetch_array($result);
 
$login_session = $result16['admin_id'];
$_SESSION['admin_id'] = $result16['admin_id'];
   
  

if(!isset($_SESSION['login_user1'])){
      header("location:login.php");
   }
?>
