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
$currentDate = date("Y-m-d H:i:s");
$sevenDaysAgo = date("Y-m-d H:i:s", strtotime("-7 days"));

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
    $data="SELECT * FROM `$table`";
    $ans=mysqli_query($conn, $data);
    if($ans->num_rows == 0){
      $fam--;
    }
  }
}

if(isset($_GET['id']) && isset($_GET['type'])) {
  if ($_GET['type'] == "war") {
    # code...
    $conn->select_db("warriorsdb");
    $id = $_GET['id'];
    $sql="SELECT * FROM warrior WHERE id='$id'";
    $result=mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    $u_id = $row['id'] ?? "N/A";
    $reg_id = $row['reg_id'] ?? "N/A";
    $u_name=$row['u_name'] ?? "N/A";
    $img=$row['img'] ?? "N/A";
    $f_name = $row['f_name'] ?? "N/A";
    $g_name = $row['g_name'] ?? "N/A";
    $m_name = $row['m_name'] ?? "N/A";
    $appellation = $row['appellation'] ?? "N/A";
    $b_date = $row['b_date'] ?? "N/A";
    $b_place = $row['b_place'] ?? "N/A";
    $nationality = $row['nationality'] ?? "N/A";
    $nation = $row['nation'] ?? "N/A";
    $bloodtype = $row['bloodtype'] ?? "N/A";
    $region = $row['region'] ?? "N/A";
    $warada = $row['warada'] ?? "N/A";
    $kebele = $row['kebele'] ?? "N/A";
    $h_number = $row['h_number'] ?? "N/A";
    $phone = $row['phone'] ?? "N/A";
    $po_box = $row['po_box']?? "N/A";
    $language = $row['lang'] ?? "N/A";
    $educ_lvl = $row['educ_lvl'] ?? "N/A";
    $educ_type = $row['educ_type'] ?? "N/A";
    $class = $row['class'] ?? "N/A";
    $c_year = $row['c_year'] ?? "N/A";
    $work = $row['work'] ?? "N/A";
    $exps = explode(',', $row['experience']) ?? "none";
    $exp_years = explode(',', $row['exp_year']) ?? "none";
    $exp_amount = intval($row['exp_amount']) ?? 0;
    $round = explode(',', $row['round']);
    $iswounded = $row['iswounded'] ?? "N/A";
    $warrior_s = $row['warrior_s'] ?? "N/A";
    $awards = explode(',', $row['award']) ?? "none";
    $presenters = explode(',', $row['presenter']) ?? "none";
    $a_years = explode(',', $row['a_year']) ?? "none";
    $award_amount = intval($row['award_amount']) ?? 0;
    
  }elseif ($_GET['type'] == "rel") {
    # code...
    $conn->select_db("warriorsdb");
    $id = $_GET['id'];
    $name = $_GET['name'];
    $sql="SELECT * FROM warrior WHERE id='$id'";
    $result=mysqli_query($conn, $sql);
    
    $row = mysqli_fetch_array($result);
    $table = $row['u_name'].$row['f_name'];

    $conn->select_db("family");
    $sql = "SELECT * FROM `$table` WHERE uname='$name'";
    $res=mysqli_query($conn, $sql);
    
    $row = mysqli_fetch_array($res);

    $u_id = $row['id'];
    $uname = $row['uname'];
    $mem= $row['member'];
    $lvl = $row['educ_lvl'];
    $b_date = $row['b_date'];
    $status = $row['status'];
    $dur = $row['duration'];
  }
}
?>