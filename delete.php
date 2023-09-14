<?php
include './server/connect.php';

if(isset($_GET['id']) && isset($_GET['type'])){
  if($_GET['type'] == 'war') {
   
    $conn->select_db('warriorsdb');
    $id = $_GET['id'];
    $sql = "SELECT * FROM warrior WHERE id=$id";
    $res=mysqli_query($conn, $sql);
    if($res){
      $row=mysqli_fetch_assoc($res);
      $name=$row['u_name'].$row['f_name'];
      $conn->select_db('family');
      $data="SHOW TABLES LIKE '$name'";
      $result=mysqli_query($conn, $data);
      if ($result) {
        // Loop through the result set
        if ($result->num_rows > 0) {
          $sql="DROP TABLE $name";
          $res=mysqli_query($conn, $sql);
        }
      }
      
      $conn->select_db('warriorsdb');
      $sql = "DELETE FROM warrior WHERE id=$id";
      $res=mysqli_query($conn, $sql);
      if(!$res){
      die(mysqli_error($conn)); 
      }else{
        header("location: warriors.php");
        
      }
    }
  }

}elseif (isset($_GET['type']) && isset($_GET['uname']) && isset($_GET['table'])) {
  if($_GET['type'] == 'rel') {
    $conn->select_db('family');
    $uname = $_GET['uname'];
    $table = $_GET['table'];
    $sql="DELETE FROM `$table` WHERE uname='$uname'";
    $ans=mysqli_query($conn, $sql);
    if(!$ans){
      die(mysqli_error($conn));
    }else{
      header("location: family.php");
      
    }
  }
}


?>