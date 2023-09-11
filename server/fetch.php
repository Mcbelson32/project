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
  $conn->select_db("warriorsdb");
  $id = $_GET['id'];
  $sql="SELECT * FROM warrior WHERE id='$id'";
  $result=mysqli_query($conn, $sql);
  if($result){
    while($row=mysqli_fetch_assoc($result)){
      $u_id = $row['id'];
      $u_name=$row['u_name'];
      $f_name = $row['f_name'];
      $g_name = $row['g_name'];
      $m_name = $row['m_name'];
      $appellation = $row['appellation'];
      $b_date = $row['b_date'];
      $b_place = $row['b_place'];
      $nationality = $row['nationality'];
      $nation = $row['nation'];
      $bloodtype = $row['bloodtype'];
      $region = $row['region'];
      $warada = $row['warada'];
      $kebele = $row['kebele'];
      $h_number = $row['h_number'];
      $phone = $row['phone'];
      $po_box = $row['po_box'];
      $language = $row['language'];
      $educ_lvl = $row['educ_lvl'];
      $educ_type = $row['educ_type'];
      $class = $row['class'];
      $work = $row['work'];
      $iswounded = $row['iswounded'];
      $warrior_s = $row['warrior_s'];
      $experience = $row['experience'];
    }
  }
}
?>
