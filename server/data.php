<?php
include 'connect.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $id = $_POST["u_id"];
  $u_name = $_POST['u_name'];
  $f_name = $_POST['f_name'];
  $g_name = $_POST['g_name'];
  $m_name = $_POST['m_name'];
  $appellation = $_POST['appellation'];
  $b_date = $_POST['b_date'];
  $b_place = $_POST['b_place'];
  $nationality = $_POST['nationality'];
  $nation = $_POST['nation'];
  $bloodtype = $_POST['bloodtype'];
  $region = $_POST['region'];
  $warada = $_POST['warada'];
  $kebele = $_POST['kebele'];
  $h_number = $_POST['h_number'];
  $phone = $_POST['phone'];
  $po_box = $_POST['po_box'];
  $language = $_POST['language'];
  $educ_lvl = $_POST['educ_lvl'];
  $educ_type = $_POST['educ_type'];
  $class = $_POST['class'];
  $work = $_POST['work'];
  $iswounded = $_POST['iswounded'];
  $warrior_s = $_POST['warrior_s'];
  $experience = trim($_POST['experience']);
  $currentDate = date("Y-m-d");
  if($_POST['id']){
    $id=$_POST['id'];
    $u_id = $_POST['u_id'];
    $data="UPDATE warrior SET id = '$u_id',u_name = '$u_name',f_name = '$f_name',g_name = '$g_name',
    m_name = '$m_name',appellation = '$appellation',b_date = '$b_date',b_place = '$b_place',
    nationality = '$nationality',nation = '$nation',bloodtype = '$bloodtype',region = '$region',
    warada = '$warada',kebele = '$kebele',h_number = '$h_number',phone = '$phone',
    po_box = '$po_box',language = '$language',educ_lvl = '$educ_lvl',educ_type = '$educ_type',
    class = '$class',work = '$work',iswounded = '$iswounded',warrior_s = '$warrior_s',
    experience = '$experience', in_date = '$currentDate' WHERE id = '$id'";

  }else{
    $data="INSERT INTO warrior (id,u_name,f_name,g_name,m_name,appellation,b_date,b_place,nationality,nation,bloodtype,region,warada,kebele,h_number,phone,po_box,language,educ_lvl,educ_type,class,work,iswounded,warrior_s,experience,in_date)
  VALUES ('$id','$u_name','$f_name','$g_name','$m_name','$appellation','$b_date',
'$b_place','$nationality','$nation','$bloodtype','$region','$warada',
'$kebele','$h_number','$phone','$po_box','$language','$educ_lvl',
  '$educ_type','$class','$work','$iswounded','$warrior_s','$experience','$currentDate')";
  }
  $result=mysqli_query($conn, $data);

  if($result){
    // echo "Data inserted successfully\n";
    header('location: /index.php');
  }else{
    die(mysqli_error($conn));
  }
}
?>
