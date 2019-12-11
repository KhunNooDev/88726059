<?php
    // connect database 
    $db_host = "localhost";
    $db_user = "s61160229";
    $db_password = "noo0912213923";
    $db_name = "s61160229";

    
    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
    $mysqli->set_charset("utf8");

   // echo "<pre>";
    //print_r($_POST);
    //echo"</pre>";
    $empno = $_POST['empno'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "INSERT 
    INTO emp (empno, name, email, password) 
    VALUES (?, ?, ?, ?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ssss", $empno, $name, $email, MD5($password));
$stmt->execute();

header("location: emplist.php");