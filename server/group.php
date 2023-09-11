<?php

include 'connect.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $id=$_POST['u_id'];
  $uname=$_POST['u_name'];
  $type=$_POST['type'];
  $lvl=$_POST['educ_lvl'];
  $b_date=$_POST['b_date'];

  $conn->select_db("warriorsdb");
  $sql="SELECT * FROM warrior WHERE id='$id'";
  $res=mysqli_query($conn, $sql);
  $row=mysqli_fetch_assoc($res);
  
  $name=$row['u_name'].$row['f_name'];
  $conn->select_db("family");
  createTable($conn, $name, $id, $uname, $type, $lvl, $b_date);
}

function createTable($conn, $name, $id, $uname, $type, $lvl, $b_date) {
  $sql = "CREATE TABLE IF NOT EXISTS $name (
  id VARCHAR(255) NOT NULL,
  uname VARCHAR(255) NOT NULL,
  type VARCHAR(255) NOT NULL,
  b_date DATE NOT NULL,
  educ_lvl VARCHAR(255) NOT NULL
  )";

  $result=mysqli_query($conn, $sql);

  if(!$result) {
    return die(mysqli_error($conn));
  }
  
 $sql="INSERT INTO $name (id, uname, type, b_date, educ_lvl)
  VALUES ('$id', '$uname', '$type', '$b_date', '$lvl')";

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
