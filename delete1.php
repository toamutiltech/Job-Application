
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
      if(!empty($_GET["job_id"])) {
       $conn = mysqli_connect("localhost", "root", "mysql", "job");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}   

mysqli_query($conn, "DELETE FROM job WHERE job_id = '" . $_GET["job_id"] . "'");
	
	echo "<script language='javascript' type='text/javascript'> location.href='history.php' </script>";
mysql_close($conn);
		
	
}
        ?>
    </body>
</html>
