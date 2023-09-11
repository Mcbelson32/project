<?php

include 'connect.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $id=$_POST['u_id'];
  $uname=$_POST['u_name'];
  $type=$_POST['type'];
  $lvl=$_POST['educ_lvl'];
  $b_date=$_POST['b_date'];
  $status = $_POST['status'];
  $duration = $_POST[start].'-'.$_POST['end'];

  $conn->select_db("warriorsdb");
  $sql="SELECT * FROM warrior WHERE id='$id'";
  $res=mysqli_query($conn, $sql);
  $row=mysqli_fetch_assoc($res);
  
  $name=$row['u_name'].$row['f_name'];
  $conn->select_db("family");
  createTable($conn, $name, $id, $uname, $type, $lvl, $b_date, $status, $duration);
}

function createTable($conn, $name, $id, $uname, $type, $lvl, $b_date, $status, $duration) {
  $sql = "CREATE TABLE IF NOT EXISTS $name (
  id VARCHAR(255) NOT NULL DEFAULT 'N/A',
  uname VARCHAR(255) NOT NULL DEFAULT 'N/A',
  member VARCHAR(255) DEFAULT 'N/A',
  b_date VARCHAR(255) DEFAULT 'N/A',
  educ_lvl VARCHAR(255) DEFAULT 'N/A',
  status VARCHAR(255) DEFAULT 'N/A',
  duration VARCHAR(255) DEFAULT 'N/A'
  )";

  $result=mysqli_query($conn, $sql);

  if(!$result) {
    return die(mysqli_error($conn));
  }
  
 $sql="INSERT INTO $name (id, uname, member, b_date, educ_lvl, status, duration)
  VALUES ('$id', '$uname', '$type', '$b_date', '$lvl', '$status','$duration')";

  $result=mysqli_query($conn, $sql);

  if(!$result) {
    return die(mysqli_error($conn));
  }
  // echo "family created";
  return header('location: /family.php');
}

$conn->select_db("family");
$sql="show tables";

$res=mysqli_query($conn, $sql);
?>