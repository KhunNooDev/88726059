<?php
    // connect database 
    $db_host = "localhost";
    $db_user = "s61160108";
    $db_password = "212224236";
    $db_name = "s61160108";
    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
    $mysqli->set_charset("utf8");


  //echo "<pre>";
  //print_r($_POST);
  //echo "</pre>";


$empno=$_POST['empno'];
$name=$_POST['name'];
$email=$_POST['email'];

$sql = "UPDATE 
            emp
        SET
            name = ?,
            email = ?
        WHERE empno = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sss", $empno, $name,$email);
    $stmt->execute();

header("location:emplist.php");