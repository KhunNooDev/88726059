<meta charset="UTF-8">
<?php
    error_reporting(E_ALL);
    // connect database 
    $db_host = "localhost";
    $db_user = "s61160108";
    $db_password = "212224236";
    $db_name = "s61160108";

    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
    $mysqli->set_charset("utf8");

    
    $empno = $_GET['empno'];
    $sql = "SELECT *
            FROM emp
            WHERE empno = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $empno);
    $stmt->execute();
    $result = $stmt->get_result();

    $row = $result->fetch_object();
?>
    <h3>Edit Emp</h3>
 <form action="save_edit.php" method="post">
        Emp No : <?php echo $row->empno ?>
        <input type="hidden" name="empno" value="<?php echo $row->empno ?>">
        <br />
        Name : <input type="text" name="name" value="<?php echo $row->name ?>">
        <br />
        Email : <input type="email" name="email" value="<?php echo $row->email ?>">
        <br />
        <p>
            <input type="submit" value="Update">
        </p>
    </form>
</body>
</html>