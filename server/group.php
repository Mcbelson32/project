<?php
include 'connect.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $keys = array_keys($_POST); // Get the keys of the array
  
  foreach($keys as $key){
    if ($key == 'start' || $key == 'end') {
      if (!(empty(trim($_POST[$key])))) {
        $date = $_POST[$key];
        $datetime = DateTime::createFromFormat('Y-m-d', $date);
        $_POST[$key] =  $datetime->format('Y/m/d');
      }
    }
    if(empty(trim($_POST[$key]))){
      $_POST[$key] = "N/A";
    }elseif(is_null($_POST[$key])) {
      $_POST[$key] = "N/A";
    }
  }

  $u_id=trim($_POST['u_id']);
  $uname=trim($_POST['u_name']);
  $type=$_POST['type'] ?? 'N/A';
  $lvl=$_POST['educ_lvl'] ?? 'N/A';
  $b_date=$_POST['b_date'] ?? 'N/A';
  $status = $_POST['status'] ?? 'N/A';
  $duration = $_POST['start'].' - '.$_POST['end'];

  $conn->select_db("warriorsdb");
  $sql="SELECT * FROM warrior WHERE id='$u_id'";
  $res=mysqli_query($conn, $sql);
  $row=mysqli_fetch_assoc($res);
  
  $name=trim($row['u_name']).trim($row['f_name']);
  $conn->select_db("family");

  if(isset($_POST['id'])) {
    $id = trim($_POST['id']);
    updateTable($conn, $name, $id, $u_id, $uname, $type, $lvl, $b_date, $status, $duration);
  }else {
    createTable($conn, $name, $u_id, $uname, $type, $lvl, $b_date, $status, $duration);
  }
}

function createTable($conn, $name, $u_id, $uname, $type, $lvl, $b_date, $status, $duration) {
  $sql = "CREATE TABLE IF NOT EXISTS `$name` (
  id INT AUTO_INCREMENT PRIMARY KEY,
  u_id VARCHAR(255) NOT NULL DEFAULT 'N/A',
  uname VARCHAR(255) NOT NULL DEFAULT 'N/A',
  member VARCHAR(255) DEFAULT 'N/A',
  b_date VARCHAR(255) DEFAULT 'N/A',
  educ_lvl VARCHAR(255) DEFAULT 'N/A',
  status VARCHAR(255) DEFAULT 'N/A',
  duration VARCHAR(255) DEFAULT 'N/A - N/A'
  )";

  $result=mysqli_query($conn, $sql);

  if(!$result) {
    return die(mysqli_error($conn));
  }
  
 $sql="INSERT INTO `$name` (u_id, uname, member, b_date, educ_lvl, status, duration)
  VALUES ('$u_id', '$uname', '$type', '$b_date', '$lvl', '$status','$duration')";

  $result=mysqli_query($conn, $sql);

  if(!$result) {
    return die(mysqli_error($conn));
  }
  // echo "family created";
  return header('location: /family.php');
}


function updateTable($conn, $name, $id, $u_id, $uname, $type, $lvl, $b_date, $status, $duration) {

  $sql="UPDATE `$name` SET u_id='$u_id', uname = '$uname', member = '$type', b_date = '$b_date',
   educ_lvl = '$lvl', status = '$status', duration = '$duration' WHERE id='$id'";

  $result=mysqli_query($conn, $sql);

  if(!$result) {
    return die(mysqli_error($conn));
  }
  // echo "family created";
  return header('location: /family.php');
}

?>