<?php
include './server/session.php';
include './server/connect.php';

if(isset($_POST)) {
    if($_GET['type'] == "war"){
        $conn->select_db("warriorsdb");
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        $reg_id = mysqli_real_escape_string($conn, $_POST['reg_id']);
        
        // Prepare the SQL statement
        $sql = "SELECT * FROM warrior WHERE id = ? OR reg_id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        
        // Bind parameters to the statement
        mysqli_stmt_bind_param($stmt, "ss", $id, $reg_id);
        
        // Execute the statement
        mysqli_stmt_execute($stmt);
        
        // Get the result
        $res = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($res) == 0){
            echo "success";
        }else{
            echo "error";
        }
    }
    if($_GET['type'] == "rel"){
        $id = $_POST['id'];
        $conn->select_db("warriorsdb");
        $sql = "SELECT * FROM warrior WHERE id = $id";
        $res = mysqli_query($conn, $sql);
        if(mysqli_num_rows($res) > 0){
            echo "success";
        }else{
            echo "error";
        }
    }
}
?>