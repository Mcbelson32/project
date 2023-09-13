<?php
include './server/connect.php';

if(isset($_POST)) {
    if($_GET['type'] == "war"){
        $id = $_POST['id'];
        $conn->select_db("warriorsdb");
        $sql = "SELECT * FROM warrior WHERE id = $id";
        $res = mysqli_query($conn, $sql);
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