<?php
  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//CREATE TABLE refere (refere_id INT NOT NULL AUTO_INCREMENT, reg_id INT, ref_name VARCHAR(70), ref_number VARCHAR(45), 
//ref_email VARCHAR(100), ref_work VARCHAR(70), ref_address VARCHAR(300), ref_position VARCHAR(70), PRIMARY KEY (refere_id));
 $conn = mysqli_connect("localhost", "root", "mysql", "job");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}     
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