<?php
include 'connect.php';

$sql="SELECT * FROM warrior";

$result=mysqli_query($conn, $sql);
$all=$result;
if($result){
  $total=mysqli_num_rows($result);
}
$no="Alive";
$data=mysqli_query($conn, "SELECT * FROM warrior WHERE warrior_s = '$no'");

if($data){
  $exp=mysqli_num_rows($data);
}
$currentDate = date("Y-m-d");
$sevenDaysAgo = date("Y-m-d", strtotime("-7 days"));

$sql = "SELECT * FROM warrior WHERE in_date BETWEEN '$sevenDaysAgo' AND '$currentDate'";
$result = $conn->query($sql);
if($result){
  $weekly=mysqli_num_rows($result);
}
$conn->select_db("family");
$sql="show tables";
$res=mysqli_query($conn, $sql);
if($res) {
  $fam=mysqli_num_rows($res);

  $x=0;
  while($tables=mysqli_fetch_array($res)){
    $table=$tables[$x];
    $data="SELECT * FROM $table";
    $ans=mysqli_query($conn, $data);
    if($ans->num_rows == 0){
      $fam--;
    }
  }
}

if(isset($_GET['id'])) {
  if ($_GET['type'] == "war") {
    # code...
    $conn->select_db("warriorsdb");
    $id = $_GET['id'];
    $sql="SELECT * FROM warrior WHERE id='$id'";
    $result=mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 0){
     echo "success";
    }else {
      echo "error";
    }
  }elseif ($_GET['type'] == "rel") {
    # code...
    $conn->select_db("warriorsdb");
    $id = $_GET['id'];
    $sql="SELECT * FROM warrior WHERE id='$id'";
    $result=mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) != 0){
     echo "success";
    }else {
      echo "error";
    }
  }
}
?>