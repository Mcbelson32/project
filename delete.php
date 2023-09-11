<?php
include './server/connect.php';

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $sql = "SELECT * FROM warrior WHERE id=$id";
  $res=mysqli_query($conn, $sql);
  if($res){
    $row=mysqli_fetch_assoc($res);
    $uname=$row['u_name'];
    $fname=$row['f_name'];
    $gname=$row['g_name'];
  }
  $n=0;
  $conn->select_db('family');
  $sql="show tables";
  $res=mysqli_query($conn, $sql);
  if($res){
    while($row=mysqli_fetch_array($res)){
      $table=$row[$n];
    // if($table == $uname.$fname){
    //   $sql="DROP TABLE $table";
    //   $res=mysqli_query($conn, $sql);
    // }else{
    // }
      $data="DELETE FROM $table WHERE uname='$uname' AND fname='$fname'";
      $ans=mysqli_query($conn, $sql);
      if(!$ans){
        die(mysqli_error($conn));
      }
      $n++;
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
?>
