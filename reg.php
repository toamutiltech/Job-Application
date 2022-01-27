
<?php
include 'test_input.php';

   $conn = mysqli_connect("localhost", "root", "mysql", "job");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>


<?php

                            $email = test_input($_POST["email"]);
         $result1 = mysqli_query($conn, "select * from reg  where email = '$email' ");             
    $result15 = mysqli_fetch_array($result1);
    if ($result15['email'] == $email)
{       
echo " <script language='javascript' type='text/javascript'> location.href='wrong.php' </script>" ;
 die('Could not get data: ' . mysql_error());
  }
else
  {
$email = test_input($_POST["email"]);
  
}

?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$password = test_input($_POST[ 'password' ]);
$pnumber = test_input($_POST['pnumber']);
$sname = test_input($_POST['sname']);
$fname = test_input($_POST['fname']);
 
    
   
 mysqli_query($conn, "INSERT INTO reg " . "(fname, sname, password, pnumber, email) " . "VALUES
                    ('$fname', '$sname', '$password', '$pnumber', '$email')");
  
  
    echo "<script language='javascript' type='text/javascript'> location.href='congrat.php' </script>";


    mysql_close($conn);
} 
?>
